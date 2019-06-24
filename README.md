# Country-code-by-phone
Get the country code and number by phone number
## Using
```php
$CountryCode = new CountryCode();
$result = $CountryCode->getCountryCode('+79876543210');

Result:
array(2){
  ["country_code"]=>
  string(1) "7"
  ["number"]=>
  string(10) "9876543210"
}
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->getNumber('+79876543210', 7);

Result: 9876543210
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->getCountryCodeByName('San Marino');

Result: 378
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->getCountryNameByCode(378);

Result: San Marino
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->countryCodes();

Result:
array(196){
  ["Afganistan"]=>
  string(2) "93"
  ["Afrika Selatan"]=>
  string(2) "27"
  ["Afrika Tengah"]=>
  string(3) "236"
  ["Albania"]=>
  string(3) "355"
  ["Algeria"]=>
  string(3) "213"
  ["Amerika Serikat"]=>
  string(1) "1"
  ["Andorra"]=>
  string(3) "376"
  ["Angola"]=>
  string(3) "244"
  ...
  ["Yaman"]=>
  string(3) "967"
  ["Yunani"]=>
  string(2) "30"
  ["Zambia"]=>
  string(3) "260"
  ["Zimbabwe"]=>
  string(3) "263"
```
