# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Renew

## Summary:

Renews a domain

## Description:

- This command renews a domain for a specified number of years
- The required parameters are:
    - `domain_name` - the domain to renew
    - `period` - number of years to renew the domain
    - `current_expiration_year` - in which year the domain is currently going to expire (used to prevent unwanted
      multiple renewals)
- Optional parameter:
    - `fee_amount` - used when renewing premium domains because they have special pricing
- Runs asynchronously on the server
- Reseller will receive a `Domain\Renew\Success` or `Domain\Renew\Fail` event depending on the result of the command

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$current_expiration_year = 2022;
$period = 1;

$command = new Command\Domain\Renew( $domain_name, $current_expiration_year, $period );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // domain was renewed successfully
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_current_expiration_year()](#method_get_current_expiration_year)
* public [get_current_expiration_year_array_key()](#method_get_current_expiration_year_array_key)
* public [get_domain()](#method_get_domain)
* public [get_domain_name_array_key()](#method_get_domain_name_array_key)
* public [get_fee_amount()](#method_get_fee_amount)
* public [get_fee_amount_array_key()](#method_get_fee_amount_array_key)
* public [get_name()](#method_get_name)
* public [get_period()](#method_get_period)
* public [get_period_array_key()](#method_get_period_array_key)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/domain/renew.php](../../lib/command/domain/renew.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Array_Key_Current_Expiration_Year_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Current-Expiration-Year-Trait.md)
  * [\Automattic\Domain_Services\Command\Array_Key_Domain_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Domain-Trait.md)
  * [\Automattic\Domain_Services\Command\Array_Key_Fee_Amount_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Fee-Amount-Trait.md)
  * [\Automattic\Domain_Services\Command\Array_Key_Period_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Period-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Renew](../classes/Automattic-Domain-Services-Response-Domain-Renew.md)
  * [\Automattic\Domain_Services\Event\Domain\Renew\Success](../classes/Automattic-Domain-Services-Event-Domain-Renew-Success.md)
  * [\Automattic\Domain_Services\Event\Domain\Renew\Fail](../classes/Automattic-Domain-Services-Event-Domain-Renew-Fail.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain, int  current_expiration_year, int  period = 1, float|null  fee_amount = null) : mixed
```

##### SummaryConstructs a Domain\Renew command
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |
| **$current_expiration_year** | int |  |
| **$period** | int | 1 |
| **$fee_amount** | float|null | null |

##### Returns:

```
mixed
```

---

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
final public get_client_txn_id() : string
```

##### SummaryGets the client transaction ID set for this command.
##### Returns:

```
string
```

---

<a id="method_get_current_expiration_year"></a>
### get_current_expiration_year

```
public get_current_expiration_year() : int
```

##### SummaryReturns the domain&#039;s current expiration year
##### Returns:

```
int
```

---

<a id="method_get_current_expiration_year_array_key"></a>
### get_current_expiration_year_array_key

```
final static public get_current_expiration_year_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services\Entity\Domain_Name
```

##### SummaryReturns the domain name that will be renewed
##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Name
```

---

<a id="method_get_domain_name_array_key"></a>
### get_domain_name_array_key

```
final static public get_domain_name_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_fee_amount"></a>
### get_fee_amount

```
public get_fee_amount() : float|null
```

##### SummaryReturns the renewal fee amount (used for premium domains)
##### Returns:

```
float|null
```

---

<a id="method_get_fee_amount_array_key"></a>
### get_fee_amount_array_key

```
final static public get_fee_amount_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_name"></a>
### get_name

```
static public get_name() : string
```

##### SummaryReturns the command name that can be used to build command data
##### Returns:

```
string
```

---

<a id="method_get_period"></a>
### get_period

```
public get_period() : int
```

##### SummaryReturns the number of years the domain will be renewed for
##### Returns:

```
int
```

---

<a id="method_get_period_array_key"></a>
### get_period_array_key

```
final static public get_period_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_resource_path"></a>
### get_resource_path

```
final public get_resource_path() : string
```

##### SummaryGets the path part for this command on the API endpoint.
##### Returns:

```
string
```

---

<a id="method_jsonSerialize"></a>
### jsonSerialize

```
final public jsonSerialize() : array
```

##### SummaryImplements the JsonSerializable interface
##### Returns:

```
array
```

---

<a id="method_set_client_txn_id"></a>
### set_client_txn_id

```
final public set_client_txn_id(string  client_txn_id) : void
```

##### SummarySets the client transaction ID for this command. This optional value may be set by the reseller. It will be
reflected in the corresponding Response class and may be useful for logging and debugging.
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$client_txn_id** | string |  |

##### Returns:

```
void
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### SummaryReturns the command parameters as an array for use when in the jsonSerialize() method
##### Returns:

```
array
```
