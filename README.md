# Vikki_Pizza_backend

#  Вступление
Версия проекта full v1.1. Интернет магазин пиццы. 

Скачайте файлы проекта.

# Установка
Убедитесь, что у вас установлен docker.

1. Перейдите в корень проекта.
1.1 Важно! Команда docker-compose up -d выполняет и миграции и сидеры. Если возникли ошибки, то возможно проблема в том, что не установлен composer. Зайдите в контейнер yii2
~~~
docker exec -it yii2 bash
~~~
и выполните команду:
~~~
composer install.
~~~
1.2 Важно! Можно использовать скрипт, который выполнит миграции, сидеры, удаление таблиц.
~~~
cd scripts
./start.sh
~~~
2. Выполните команду:
~~~
docker-compose up -d
~~~
3. Запустите все контейнеры.
4. Открыть [phpmyadmin](http://localhost:7760/) (http://localhost:7760)
 
login - root
password - root

5. Зайти в контейнер с портом 8000:80 и выполнить команду: 
~~~
php yii migrate
~~~
6. Здесь же, выполнить команду для поднятия сидеров:
~~~
php yii seeder/execute-seeders-up
~~~
7.  ВАЖНО!

     В таблице `users` добавить запись, где все значения = `admin`
# API запросы:

## GET:

Выводит все товары
~~~
http://localhost:8000/api/applications/index

http://localhost:8000/admin/admins/index
~~~

## POST:
CRUD операции для таблиц `stocks`,`product`,`popular`(чтобы удалить запись, вместо `POST` в Postman выбрать `DELETE`) :
~~~
http://localhost:8000/admin/admins/insert-popular

http://localhost:8000/admin/admins/delete-popular

http://localhost:8000/admin/admins/update-popular

================================================

http://localhost:8000/admin/admins/insert-product

http://localhost:8000/admin/admins/delete-product

http://localhost:8000/admin/admins/update-product

================================================

http://localhost:8000/admin/admins/insert-stock

http://localhost:8000/admin/admins/delete-stock

http://localhost:8000/admin/admins/update-stock
~~~
Для отправки писем:
~~~
http://localhost:8000/api/application/handler-order
~~~
Для того, чтобы отправить данные на свою почту, найдите файл `SendMailUseCase` и замените константу `SEND_EMAIL` на значение нужной вам почты. 

ВАЖНО! - Почта должна соответствовать той, которая регистрируется ниже, на сервисе. На неё будут приходить письма. 

Зарегистрируйтесь, например [здесь](https://mailtrap.io/). 

1. Перейдите в Postman.
2. Выберите тип запроса `Post`.
3. Выберите вкладку `body`, затем `raw`.
4. Вставьте эту запись, где

`setFrom` - имя отправителя

`setSubject` - тема письма

`setTextBody` - тело письма (содержимое) :

~~~
{
    "setFrom":"mypost@post.com",
    "setSubject":"theme",
    "setTextBody":"hello, pizza!"
}
~~~
