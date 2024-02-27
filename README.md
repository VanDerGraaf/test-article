1. git clone
2. docker-compose up -d --build
3. docker-compose exec app php init
4. В файле common/config/main-local.php изменить строки подключения к базе
```php
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=mysql;dbname=yii2advanced',
            'username' => 'yii2advanced',
            'password' => 'secret',
            'charset' => 'utf8',
        ],
```
5. docker-compose exec app composer install
6. Базу данных можно создать через админер(localhost:8801, указать сервер mysql) или поменять в yii2advanced кодировку на utf8_general_ci
7. docker-compose exec app php yii migrate
8. В файле common/config/params-local.php
```php
    'sites'  => [
    'api'     => 'localhost:20080',
    ]
```

роуты:
```text
"articles/search" фильтрация по author, category, title
"articles/search/<id:\d+>"
"author/search/<id:\d+>"
"category/search/<id:\d+>"
```