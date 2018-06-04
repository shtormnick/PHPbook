# Создание базы данных MySQL с помощью PHP

## Создание базы данных

Чтобы создать и удалить базу данных, вы должны обладать правами администратора. Его очень легко создать новую базу данных MySQL. PHP использует функцию mysql_query для создания базы данных MySQL. Эта функция принимает два параметра и возвращает TRUE при успешном завершении или FALSE при сбое.

```bool mysql_query( sql, connection );```

1. **sql**
Обязательный - SQL-запрос для создания базы данных
2. **connection**
Необязательно - если не указано, будет использоваться последнее соединение с использованием mysql_connect.

Попробуйте следующий пример для создания базы данных -
```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully';
   
   $sql = 'CREATE Database test_db';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   }
   
   echo "Database test_db created successfully\n";
   mysql_close($conn);
?>
```
## Выбор базы данных

После установления соединения с сервером базы данных необходимо выбрать конкретную базу данных, в которой связаны все ваши таблицы.

Это необходимо, поскольку на одном сервере может быть несколько баз данных, и вы можете работать с одной базой данных одновременно.

PHP предоставляет функцию mysql_select_db для выбора базы данных. Он возвращает TRUE при успешном завершении или FALSE при сбое.

## Создание таблиц базы данных
Чтобы создавать таблицы в новой базе данных, вам нужно сделать то же самое, что создавать базу данных. Сначала создайте SQL-запрос для создания таблиц, затем выполните запрос с помощью функции mysql_query ().

Попробуйте следующий пример для создания таблицы -

```
<?php
   
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully';
   
   $sql = 'CREATE TABLE employee( '.
      'emp_id INT NOT NULL AUTO_INCREMENT, '.
      'emp_name VARCHAR(20) NOT NULL, '.
      'emp_address  VARCHAR(20) NOT NULL, '.
      'emp_salary   INT NOT NULL, '.
      'join_date    timestamp(14) NOT NULL, '.
      'primary key ( emp_id ))';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create table: ' . mysql_error());
   }
   
   echo "Table employee created successfully\n";
   
   mysql_close($conn);
?>
```
Если вам нужно создать много таблиц, лучше сначала создать текстовый файл и поместить все эти SQL-команды в этот текстовый файл, а затем загрузить этот файл в переменную $ sql и исправить эти команды.

Рассмотрим следующий контент в файле sql_query.txt

```
CREATE TABLE employee(
   emp_id INT NOT NULL AUTO_INCREMENT,
   emp_name VARCHAR(20) NOT NULL,
   emp_address  VARCHAR(20) NOT NULL,
   emp_salary   INT NOT NULL,
   join_date    timestamp(14) NOT NULL,
   primary key ( emp_id ));

```

```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $query_file = 'sql_query.txt';
   
   $fp = fopen($query_file, 'r');
   $sql = fread($fp, filesize($query_file));
   fclose($fp); 
   
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create table: ' . mysql_error());
   }
   
   echo "Table employee created successfully\n";
   mysql_close($conn);
?>
```