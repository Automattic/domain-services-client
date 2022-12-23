#!/usr/bin/env bash

cwd=$(pwd)"/"
base_dir="domain-services-client/"

# Everything is relative to the base directory. We always switch to that dir first.
docs_dir="docs"
phpdoc_dir=".phpdoc"
# To test locally, an alias pointing to whichever phpcs you want to run an be helpful
phpcs="phpcs"

# This makes sure we are always using the same version and only explicitly update it when we want to.
phpdoc_version="3.3.1"
phpdoc_exec="./dev-tools/phpDocumentor.phar"

function main {
  if [[ ($* == "--help") || $* == "-h" ]]; then
    display_usage
  fi

  switch_to_dsapi_dir
  prepare_dev_tools

  case $1 in
    lint)
      do_lint_changed
    ;;
    lint-all)
      do_lint_all
    ;;
    clean-docs)
      do_clean_docs
    ;;
    build-docs)
      do_build_docs
    ;;
    build-only)
      do_build_only
    ;;
    *)
      display_usage
    ;;
  esac
}

function do_lint {
  # Allowing PHPCS to exit with non-zero code. This is useful if we want to abort before creating the docs if there were any errors founds
  $phpcs -ns --runtime-set ignore_errors_on_exit 0 --standard=./phpcs.xml $1
}

function do_lint_all {
  do_lint ./
}

function do_lint_changed {
  # Get a list of all modified files by comparing HEAD to trunk
  changed_files=$(git diff --diff-filter=d --name-only trunk)

  echo -e "\n\033[1mFound the following changed files (compared to 'trunk'):\033[0m"
  echo ""
  echo "${changed_files}"


  # converting output into an array
  IFS=$'\n' read -r -d '' -a files_list <<<"${changed_files}"

  for i in "${!files_list[@]}"; do
    if [[ ${files_list[i]} != *".php" ]]; then
      unset 'files_list[i]'
      continue
    fi

    # Strips the base directory from the beginning of the path
    files_list[i]=${files_list[i]/#"${base_dir}"/}

    if [[ ! -f "${files_list[i]}" ]]; then
      # If file still doesn't exist, then it was a file outside the base directory and we don't need to check it here either
      unset 'files_list[i]'
    fi
  done

  #re-index the array, just in case
  files_list=("${files_list[@]}")

  if [ ${#files_list[@]} -eq 0 ]; then
    echo "Skipping lint because no changes were detected in any PHP files!"
    return 0
  fi

  echo ""
  echo -e "Linting \033[1m${#files_list[@]}\033[0m files...\n"

  do_lint "${files_list[@]}"
}

function do_clean_docs {
  echo -e "\n\033[1mDeleting all previously generated documentation from '${docs_dir}'...\033[0m"
  rm -rf "./${docs_dir}/"* || { echo "Couldn't delete old docs from '${docs_dir}'."; exit 1; }

  if [ -d "${phpdoc_dir}" ]; then
    echo "Deleting phpDocumentor cache folder '${phpdoc_dir}'..."
    rm -rf "${phpdoc_dir}" || { echo "Couldn't delete phpdoc cache dir '${phpdoc_dir}'."; exit 1; }
  fi
}

function do_build_docs {
  do_lint_changed && do_clean_docs && do_build_only
}

function do_build_only {
  php "${phpdoc_exec}"
}

function prepare_dev_tools {
  echo -e "\n\033[1mSetting up DEV tools...\033[0m"
  # All dev tools should go here
  prepare_phpdoc
}

function prepare_phpdoc {
  echo -e "\n\033[1mphpDocumentor:\033[0m"
  phpdoc_found_version=$(php "${phpdoc_exec}" --version)

  if [[ $phpdoc_found_version == *"${phpdoc_version}" ]]; then
    echo "  Found the required version. Nothing to do."
    return 0
  fi

  if [[ -f "${phpdoc_exec}" ]]; then
    echo "  Found a different version. Downloading v${phpdoc_version}..."
    rm "${phpdoc_exec}" || { echo "Failed removing older version of phpDocumentor located at '${phpdoc_exec}'"; exit 1; }
  fi

  echo "  Downloading to '${phpdoc_exec}'..."
  wget -q -O "${phpdoc_exec}" "https://github.com/phpDocumentor/phpDocumentor/releases/download/v${phpdoc_version}/phpDocumentor.phar"

  if [[ ! -f "${phpdoc_exec}" ]]; then
    echo "  Failed to download phpDocumentor!"
    exit 1
  fi
}

function display_usage {
  echo -e "\n\033[1mThis script handles different build tasks.\033[0m"
  echo ""
  echo -e "\033[1mUsage: $0 [action]\033[0m"
  echo ""
  echo -e "\033[1mAvailable actions:\033[0m"
  echo "    lint:         will run phpcs on all changed files in base directory compared to 'trunk'."
  echo "    lint-all:     will run phpcs on ALL the directory, including validations that all doc blocks are there."
  echo "    clean-docs:   will remove all currently generated docs under ./${docs_dir} as well as phpDocumentor cache."
  echo "    build-docs:   will run 'lint' and 'clean-docs' actions, if both showed no errors, it will run phpDocumentor to automatically generate the code documentation under ./${docs_dir}"
  echo "    build-only:   Same as 'build-docs' but will skip cleaning the cache before running."

  exit 0
}

function switch_to_dsapi_dir {
  if [[ $cwd != *"${base_dir}" ]]; then
    if [ -d "${cwd}${base_dir}" ]; then
      cd "${cwd}${base_dir}" || { echo "Couldn't switch to base dir (${cwd}${base_dir})."; exit 1; }
    else
      echo "This script can only run from the base directory."
      exit 1
    fi
  fi
}

main "$@"
