# Удаление базы данных MySQL с помощью PHP

## Удаление базы данных
  Если база данных больше не требуется, ее можно удалить навсегда. Вы можете использовать команду SQL для mysql_query для удаления базы данных.
  
  Попробуйте следующий пример, чтобы удалить базу данных.

```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'DROP DATABASE test_db';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not delete database db_test: ' . mysql_error());
   }
   
   echo "Database deleted successfully\n";
   
   mysql_close($conn);
?>
```
**ПРЕДУПРЕЖДЕНИЕ** - очень опасно удалить базу данных и любую таблицу. Поэтому перед удалением любой таблицы или базы данных вы должны убедиться, что вы делаете все намеренно.

## Удаление таблицы
Это снова вопрос выдачи одной команды SQL через функцию mysql_query для удаления любой таблицы базы данных. Но будьте очень осторожны при использовании этой команды, потому что при этом вы можете удалить важную информацию, имеющуюся в вашей таблице.

Попробуйте следующий пример, чтобы удалить таблицу -
```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'DROP TABLE employee';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not delete table employee: ' . mysql_error());
   }
   
   echo "Table deleted successfully\n";
   
   mysql_close($conn);
?>
```
