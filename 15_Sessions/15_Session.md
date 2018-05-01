## Сессии

Альтернативный способ сделать доступными данные на разных страницах всего веб-сайта - использовать сеанс PHP.

Сеанс создает файл во временном каталоге на сервере, где хранятся зарегистрированные переменные сеанса и их значения.
Эти данные будут доступны для всех страниц сайта во время этого визита.

Расположение временного файла определяется настройкой в файле php.ini с именем session.save_path.
Перед использованием любой переменной сеанса убедитесь, что вы установили этот путь.

Когда начинается сеанс, что происходит,

* Сначала PHP создает уникальный идентификатор для этого конкретного сеанса,
который представляет собой случайную строку из 32 шестнадцатеричных чисел, таких как 3c7foj34c3jj973hjkop2fc937e3443.

* Куки-файл PHPSESSID автоматически отправляется на компьютер пользователя для хранения уникальной строки идентификации сеанса.

*Файл создается автоматически на сервере в указанном временном каталоге и содержит имя уникального идентификатора,
префиксного sess_ ie sess_3c7foj34c3jj973hjkop2fc937e3443.

Когда PHP-скрипт хочет получить значение из переменной сеанса,
PHP автоматически получает уникальную строку идентификатора сеанса из файла cookie PHPSESSID,
а затем ищет во временном каталоге файл с этим именем, и проверка может быть выполнена путем сравнения обоих значений.

Сессия заканчивается, когда пользователь закрывает браузер или покидает сайт,
сервер завершает сеанс по истечении заданного периода времени, обычно 30 минут.

### Начало Сессии

Сессия PHP легко запускается путем вызова функции session_start (). 
Эта функция сначала проверяет, запущен ли сеанс, и если ни один не запущен, он запускает его. 
Рекомендуется поместить вызов session_start () в начале страницы.

Переменные сеанса хранятся в ассоциативном массиве с именем $ _SESSION []. 
Доступ к этим переменным можно получить во время жизни сеанса.

В следующем примере начинается сеанс, затем регистрируется переменная с именем counter, которая увеличивается каждый раз, 
когда страница посещается во время сеанса.

Используйте функцию isset (), чтобы проверить, установлена ли уже переменная сеанса или нет.

Поместите этот код в файл test.php и загрузите этот файл много раз, чтобы увидеть результат -
```
<?php
   session_start();
   
   if( isset( $_SESSION['counter'] ) ) {
      $_SESSION['counter'] += 1;
   }else {
      $_SESSION['counter'] = 1;
   }
	
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";
?>

<html>
   
   <head>
      <title>Setting up a PHP session</title>
   </head>
   
   <body>
      <?php  echo ( $msg ); ?>
   </body>
   
</html>
```
Это выдаст :```You have visited this page 1in this session```

### Конец Сессии

Сеанс PHP может быть уничтожен функцией ```session_destroy ()```. 
Эта функция не нуждается в каком-либо аргументе, и один вызов может уничтожить все переменные сеанса. 
Если вы хотите уничтожить одну переменную сеанса, вы можете использовать функцию unset (), чтобы отключить переменную сеанса.

Вот пример, чтобы отменить одну переменную -
```
<?php
   unset($_SESSION['counter']);
?>
```
Вызовет уничтожение всех переменные сеанса
```
<?php
   session_destroy();
?>
```
### Авто включение Сесии

Вам не нужно вызывать функцию ```start_session ()```, чтобы начать сеанс, когда пользователь посещает ваш сайт, 
если вы можете установить переменную ```session.auto_start``` в 1 в файле php.ini.

### Сессия без Cookies файлов 

Может быть случай, когда пользователь не разрешает хранить файлы cookie на своем компьютере. 
Таким образом, существует другой способ отправки идентификатора сеанса в браузер.

В качестве альтернативы вы можете использовать постоянный SID, который определяется, если сеанс запущен. 
Если клиент не отправил соответствующий cookie сеанса, он имеет форму session_name = session_id. 
В противном случае он расширяется до пустой строки. Таким образом, вы можете безошибочно вставлять его в URL-адреса.

Следующий пример демонстрирует, как регистрировать переменную и как правильно ссылаться на другую страницу с использованием SID.
```
<?php
   session_start();
   
   if (isset($_SESSION['counter'])) {
      $_SESSION['counter'] = 1;
   }else {
      $_SESSION['counter']++;
   }
   
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";
   
   echo ( $msg );
?>

<p>
   To continue  click following link <br />
   
   <a  href = "nextpage.php?<?php echo htmlspecialchars(SID); ?>">
</p>
```
Это выдаст :```You have visited this page 1in this session.
               To continue click following link ```