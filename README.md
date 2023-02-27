

## Laravel Shorten Url Challenge

- PHP 8.2
- Laravel 10

### How to run

```bash
docker run --rm -it -v ${PWD}:/app -w /app -p 8000:8000 \
-e "TINYURL=https://tinyurl.com/api-create.php" webdevops/php:8.2-alpine /bin/sh run.sh
```
Automatically,  this command run test and execute php built-in server.


### Test service
You can test the service with command in bash console:
```bash
curl --location --request POST 'http://127.0.0.1:8000/api/v1/short-urls' \
--header 'Authorization: Bearer {}' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "url": "http://www.localhost.com"
}'
```
