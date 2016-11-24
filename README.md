## Diccionario Real Academia Española API

### Header authentication

```
Authorization: Basic cDY4MkpnaFMzOmFHZlVkQ2lFNDM0
```

### Word of the day 

```
https://dle.rae.es/data/wotd?callback=json
```

### Key query

```
https://dle.rae.es/data/keys?q=hola&callback=jsonp123
```

### Search word

```
https://dle.rae.es/data/search?w=hola
```

This returns an id. This id is going to be used in the fetch endpoint.

### Fetch word

```
https://dle.rae.es/data/fetch?id=KYtLWBc
```
You will need to parse response, because the response contains html tags.

## Example

```php
<?php
$handler = curl_init("https://dle.rae.es/data/search?w=hola");
curl_setopt($handler, CURLOPT_HTTPHEADER, array("Authorization: Basic cDY4MkpnaFMzOmFHZlVkQ2lFNDM0"));
curl_setopt($handler, CURLOPT_VERBOSE, false);
curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($handler, CURLOPT_SSL_VERIFYHOST, false);
$response = curl_exec ($handler);
curl_close($handler);
echo $response
```

