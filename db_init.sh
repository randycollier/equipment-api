#!/bin/sh
/usr/bin/mysqld_safe --skip-grant-tables &
sleep 5
mysql -u root -e "CREATE DATABASE blueline"
mysql -u root -e "USE blueline"
mysql -u root mydb < mysql/DataDump.sql

