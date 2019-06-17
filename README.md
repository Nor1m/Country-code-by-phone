# Country-code-by-phone
Get the country code and number by phone number

```php
$CountryCode = new CountryCode();
$result = $CountryCode->getCountryCode('+79618937262');
```

```php
Result:
array(2){
  ["country_code"]=>
  string(1) "7"
  ["number"]=>
  string(10) "9618937262"
}
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->getNumber('+79618937262', 7);
```

```php
Result: 9618937262
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->getCountryCodeByName('San Marino');
```

```php
Result: 378
```


```php
$CountryCode = new CountryCode();
$result = $CountryCode->getCountryNameByCode(378);
```

```php
Result: San Marino
```


```php
$result = $CountryCode->countryCodes();
```

```php
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
