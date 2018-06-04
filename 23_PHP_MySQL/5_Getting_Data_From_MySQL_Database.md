# Получение данных из базы данных MySQL

Данные можно извлекать из таблиц MySQL, выполняя инструкцию SQL SELECT через функцию PHP mysql_query. У вас есть несколько вариантов для получения данных из MySQL.

Наиболее часто используемой опцией является использование функции mysql_fetch_array (). Эта функция возвращает строку как ассоциативный массив, числовой массив или и то, и другое. Эта функция возвращает FALSE, если больше строк нет.

Ниже приведен простой пример для извлечения записей из таблицы employee.

Попробуйте следующий пример, чтобы отобразить все записи из таблицы employee.

```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT emp_id, emp_name, emp_salary FROM employee';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "EMP ID :{$row['emp_id']}  <br> ".
         "EMP NAME : {$row['emp_name']} <br> ".
         "EMP SALARY : {$row['emp_salary']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>
```

Содержимое строк присваивается переменной $ row и затем печатаются значения в строке.

**ПРИМЕЧАНИЕ**. - Всегда помните, чтобы положить фигурные скобки, когда вы хотите вставить значение массива непосредственно в строку.

В приведенном выше примере константа MYSQL_ASSOC используется в качестве второго аргумента для mysql_fetch_array (), так что она возвращает строку как ассоциативный массив. С помощью ассоциативного массива вы можете получить доступ к полю, используя свое имя вместо использования индекса.

PHP предоставляет другую функцию, называемую mysql_fetch_assoc (), которая также возвращает строку как ассоциативный массив.

Попробуйте следующий пример, чтобы отобразить все записи из таблицы employee, используя функцию mysql_fetch_assoc ().

```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT emp_id, emp_name, emp_salary FROM employee';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_assoc($retval)) {
      echo "EMP ID :{$row['emp_id']}  <br> ".
         "EMP NAME : {$row['emp_name']} <br> ".
         "EMP SALARY : {$row['emp_salary']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>
```

Вы также можете использовать константу **MYSQL_NUM**, как второй аргумент для mysql_fetch_array (). Это заставит функцию возвращать массив с числовым индексом.

Попробуйте следующий пример, чтобы отобразить все записи из таблицы employee, используя аргумент MYSQL_NUM.

```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT emp_id, emp_name, emp_salary FROM employee';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_NUM)) {
      echo "EMP ID :{$row[0]}  <br> ".
         "EMP NAME : {$row[1]} <br> ".
         "EMP SALARY : {$row[2]} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>
```
Все три примера приведут к такому же результату.

## Освобождение памяти

Хорошей практикой является освобождение памяти курсора в конце каждого оператора SELECT. Это можно сделать с помощью функции PHP **mysql_free_result ()**. Ниже приведен пример, чтобы показать, как он должен использоваться.

Попробуйте следующий пример

```
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT emp_id, emp_name, emp_salary FROM employee';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_NUM)) {
      echo "EMP ID :{$row[0]}  <br> ".
         "EMP NAME : {$row[1]} <br> ".
         "EMP SALARY : {$row[2]} <br> ".
         "--------------------------------<br>";
   }
   
   mysql_free_result($retval);
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>
```
При извлечении данных вы можете написать как сложный SQL, как вам нравится. Процедура останется такой же, как указано выше.