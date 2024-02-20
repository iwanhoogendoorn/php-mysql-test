# Simple PHP website and MySQL Database 

This is a sample PHP website/script that allows you to do a simple test to see if the connection from your webserver to your MySQL database is working.

## Creating the MySQL database 

Connect to the MySQL Database Engine using MySQL Shell: 

```
[opc@ih-webserver-01 ~]$ mysqlsh admin@10.0.2.247
Please provide the password for 'admin@10.0.2.247': ****************
Save password for 'admin@10.0.2.247'? [Y]es/[N]o/Ne[v]er (default No): Y
MySQL Shell 8.0.35

Copyright (c) 2016, 2023, Oracle and/or its affiliates.
Oracle is a registered trademark of Oracle Corporation and/or its affiliates.
Other names may be trademarks of their respective owners.

Type '\help' or '\?' for help; '\quit' to exit.
Creating a session to 'admin@10.0.2.247'
Fetching schema names for auto-completion... Press ^C to stop.
Your MySQL connection id is 50 (X protocol)
Server version: 8.0.36-u1-cloud MySQL Enterprise - Cloud
No default schema selected; type \use <schema> to set one.
 MySQL  10.0.2.247:33060+ ssl  JS >
```

Show the existing databases: 

```
MySQL  10.0.2.247:33060+ ssl  SQL > SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| mysql_audit        |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.0015 sec)
 MySQL  10.0.2.247:33060+ ssl  SQL >
```

Create a new database:

```
MySQL  10.0.2.247:33060+ ssl  SQL > CREATE DATABASE F1;
Query OK, 1 row affected (0.0066 sec)
```

Verify if the database is created:

```
 MySQL  10.0.2.247:33060+ ssl  SQL > SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| F1                 |
| information_schema |
| mysql              |
| mysql_audit        |
| performance_schema |
| sys                |
+--------------------+
6 rows in set (0.0010 sec)
 MySQL  10.0.2.247:33060+ ssl  SQL >
```

Select the database to perform actions on this database:

```
MySQL  10.0.2.247:33060+ ssl  SQL > USE F1
Default schema set to `F1`.
Fetching global names, object names from `F1` for auto-completion... Press ^C to stop.
 MySQL  10.0.2.247:33060+ ssl  F1  SQL >
```

Show the existing tables of the database:

```
MySQL  10.0.2.247:33060+ ssl  F1  SQL > SHOW TABLES;
Empty set (0.0013 sec)
 MySQL  10.0.2.247:33060+ ssl  F1  SQL >
```

Create a new table in the database:

```
MySQL  10.0.2.247:33060+ ssl  F1  SQL > CREATE TABLE drivers(First_Name VARCHAR(50) NOT NULL,Last_Name VARCHAR(50) NOT NULL,PRIMARY KEY(Last_Name));
Query OK, 0 rows affected (0.0207 sec)
 MySQL  10.0.2.247:33060+ ssl  F1  SQL >
```

Verify if the table is created:

```
MySQL  10.0.2.247:33060+ ssl  F1  SQL > DESCRIBE drivers;
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| First_Name | varchar(50) | NO   |     | NULL    |       |
| Last_Name  | varchar(50) | NO   | PRI | NULL    |       |
+------------+-------------+------+-----+---------+-------+
2 rows in set (0.0022 sec)
 MySQL  10.0.2.247:33060+ ssl  F1  SQL >
```

Insert Data into the database:

```
MySQL  10.0.2.247:33060+ ssl  F1  SQL > INSERT INTO drivers VALUE ("Max", "Verstappen");
Query OK, 1 row affected (0.0048 sec)
 MySQL  10.0.2.247:33060+ ssl  F1  SQL > INSERT INTO drivers VALUE ("Sergio", "Pérez");
Query OK, 1 row affected (0.0024 sec)
 MySQL  10.0.2.247:33060+ ssl  F1  SQL >
```

Verify if the data is in the database:

```
MySQL  10.0.2.247:33060+ ssl  F1  SQL > SELECT * FROM drivers;
+------------+------------+
| First_Name | Last_Name  |
+------------+------------+
| Sergio     | Pérez      |
| Max        | Verstappen |
+------------+------------+
2 rows in set (0.0006 sec)
 MySQL  10.0.2.247:33060+ ssl  F1  SQL >

```

Create a new database user and grant access to the database:

```
MySQL  10.0.2.247:33060+ ssl  SQL > CREATE USER 'iwan'@'%' IDENTIFIED WITH mysql_native_password BY 'XXX';
Query OK, 0 rows affected (0.0035 sec)
 MySQL  10.0.2.247:33060+ ssl  SQL > GRANT ALL ON F1.* TO 'iwan'@'%';
Query OK, 0 rows affected (0.0037 sec)
 MySQL  10.0.2.247:33060+ ssl  SQL >
```

Verify if the new user is created and if the user has the correct privileges for the database: 

```
MySQL  10.0.2.247:33060+ ssl  SQL > SHOW GRANTS FOR 'iwan';
+----------------------------------------------+
| Grants for iwan@%                            |
+----------------------------------------------+
| GRANT USAGE ON *.* TO `iwan`@`%`             |
| GRANT ALL PRIVILEGES ON `F1`.* TO `iwan`@`%` |
+----------------------------------------------+
2 rows in set (0.0006 sec)
 MySQL  10.0.2.247:33060+ ssl  SQL >

```

Quit the MySQL Shell:

```
MySQL  10.0.2.247:33060+ ssl  F1  SQL > \q
Bye!
[opc@ih-webserver-01 ~]$
```

## A Screenshot of the actual website

![PHP test MySQL](/the-website.png "The website connecting to the MySQL database")
