To build:
```sh
$ composer install
$ docker-compose build
```

To run application:
```sh
$ docker-compose up
```

To insert data in database:
```sh
$ docker exec -it mysql sh
# Open mysql
$ mysql -u root -p
```
```mysql
mysql> CREATE DATABASE blueline;
mysql> use blueline
mysql> \. mysql/DataDump.sql
```
