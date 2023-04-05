# Vikki_Pizza_backend

#  Вступление
Версия проекта full v1.0. Интернет магазин пиццы. 

Скачайте файлы проекта.

# Установка
Убедитесь, что у вас установлен docker.

1. Перейдите в корень проекта.
2. Выполните команду:
~~~
docker-compose up -d
~~~
3. Запустите все контейнеры.
4. Открыть [phpmyadmin](http://localhost:7760/) (http://localhost:7760)
 
login - root
password - root

Создать вручную базу данных с именем PizzaV
5. Зайти в контейнер с портом 8000:80 и выполнить команду: 
~~~
php yii migrate
~~~
6. Здесь же, выполнить команду для поднятия сидеров:
~~~
php yii seeder/execute-seeders-up
~~~
# API запросы:

## get:

Выводит все товары
~~~
http://localhost:8000/api/applications/index

http://localhost:8000/admin/admins/index
~~~

## post:
CRUD операции для таблиц `stocks`,`product`,`popular`:
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