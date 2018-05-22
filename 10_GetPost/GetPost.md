## GET,POST Методы

Клиенты браузера могут отправлять информацию на веб-сервер.

* Метод GET

* Метод POST

Прежде чем браузер отправит информацию, он кодирует ее, используя схему, называемую кодировкой URL. 
В этой схеме пары имя/значение объединяются с равными знаками, а разные пары разделяются амперсандом.

```name1=value1&name2=value2&name3=value3```

Пробелы удаляются и заменяются символом ```+```, а любые другие не буквенно-цифровые символы заменяются шестнадцатеричными значениями.
После того, как информация закодирована, она отправляется на сервер.

### GET Метод

Метод GET отправляет закодированную пользовательскую информацию, добавленную к запросу страницы. 
Страница и закодированная информация разделяются символом ```?```
```http://www.test.com/index.htm?name1=value1&name2=value2```

* Метод GET создает длинную строку, которая появляется в ваших журналах сервера, в поле «Местоположение» браузера.
* Метод GET предназначен для отправки только до 1024 символов.
* Никогда не используйте метод GET, если у вас есть пароль или другая конфиденциальная информация для отправки на сервер.
* GET не может использоваться для отправки на сервер двоичных данных, таких как изображения или текстовые документы.
* Доступ к данным, отправленным методом GET, можно получить с помощью переменной окружения QUERY_STRING.
* PHP предоставляет ассоциативный массив $_GET для доступа ко всей отправляемой информации с использованием метода GET.
```
<?php
   if( $_GET["name"] || $_GET["age"] ) {
      echo "Welcome ". $_GET['name']. "<br />";
      echo "You are ". $_GET['age']. " years old.";
      
      exit();
   }
?>
<html>
   <body>
   
      <form action = "<?php $_PHP_SELF ?>" method = "GET">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" />
      </form>
      
   </body>
</html>
```
Это произведет к: ![alt text](https://www.tutorialspoint.com/php/images/forms.jpg)

### POST Метод

Метод POST передает информацию через HTTP-заголовки. 
Информация кодируется, как описано в случае метода GET, и помещается в заголовок QUERY_STRING.
* Метод POST не имеет ограничений на размер данных, которые необходимо отправить.
* Метод POST может использоваться для отправки ASCII, а также двоичных данных.
* Данные, отправленные методом POST, проходят через HTTP-заголовок, поэтому безопасность зависит от протокола HTTP. 
Используя Secure HTTP, вы можете убедиться, что ваша информация защищена.
* PHP предоставляет ассоциативный массив $ _POST для доступа ко всей отправляемой информации с использованием метода POST.

```
<?php
   if( $_POST["name"] || $_POST["age"] ) {
      if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
         die ("invalid name and name should be alpha");
      }
      echo "Welcome ". $_POST['name']. "<br />";
      echo "You are ". $_POST['age']. " years old.";
      
      exit();
   }
?>
<html>
   <body>
   
      <form action = "<?php $_PHP_SELF ?>" method = "POST">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" />
      </form>
   
   </body>
</html>
```
Это произведет к: ![alt text](https://www.tutorialspoint.com/php/images/forms.jpg)

### Переменная $ _REQUEST

Переменная PHP $ _REQUEST содержит содержимое как $ _GET, $ _POST, так и $ _COOKIE. 
Мы обсудим переменную $ _COOKIE, когда мы расскажем о файлах cookie.

Переменная PHP $ _REQUEST может использоваться для получения результата из данных формы, отправленных с использованием методов GET и POST.
```
<?php
   if( $_REQUEST["name"] || $_REQUEST["age"] ) {
      echo "Welcome ". $_REQUEST['name']. "<br />";
      echo "You are ". $_REQUEST['age']. " years old.";
      exit();
   }
?>
<html>
   <body>
      
      <form action = "<?php $_PHP_SELF ?>" method = "POST">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" />
      </form>
      
   </body>
</html>
```
Здесь переменная $ _PHP_SELF содержит имя собственного скрипта, в котором он вызывается.

Это произведет к: ![alt text](https://www.tutorialspoint.com/php/images/forms.jpg)