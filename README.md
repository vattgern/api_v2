<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Требования
Проект запускать только с конфигурацией (модули) OpenServer:

HTTP: Apache_2.4-PHP_8.0-8.1+Nginx_1.21; <br>
PHP: 8.1; <br>
MySQL / MariaDB: MySQL-8.0-Win10.

### Примечание <br>
#### Не забыть настроить `.env` для бд, создать пустую базу данных. Postman-коллекция в корне проекта. В заголовках всех запросов убираем `Accept: /*/` и ставим `Accept: application/json`. В роутах которые требуют аутентификацию используем токен сгенерированный при авторизации пользователя и в разделе `Auth` в Postman ставим `Bearer` и вставляем этот самый сгенерированный токен.

## Лицензия [MIT license](https://opensource.org/licenses/MIT).
