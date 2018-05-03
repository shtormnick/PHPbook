## Веб-концепции

### Идентификация браузера и платформы

PHP создает некоторые полезные переменные среды, которые можно увидеть на странице phpinfo.php,
которая использовалась для настройки среды PHP.

Одна из переменных среды, заданных PHP, - HTTP_USER_AGENT, 
которая идентифицирует браузер пользователя и операционную систему.

PHP предоставляет функцию getenv () для доступа к значению всех переменных среды. 

Информация, содержащаяся в переменной среды HTTP_USER_AGENT,
может использоваться для создания динамического содержимого, соответствующего браузеру.

В следующем примере показано, как вы можете определить клиентский браузер и операционную систему.
```
<html>
   <body>
   
      <?php
         function getBrowser() { 
            $u_agent = $_SERVER['HTTP_USER_AGENT']; 
            $bname = 'Unknown';
            $platform = 'Unknown';
            $version = "";
            
            //First get the platform?
            if (preg_match('/linux/i', $u_agent)) {
               $platform = 'linux';
            }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
               $platform = 'mac';
            }elseif (preg_match('/windows|win32/i', $u_agent)) {
               $platform = 'windows';
            }
            
            // Next get the name of the useragent yes seperately and for good reason
            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
               $bname = 'Internet Explorer';
               $ub = "MSIE";
            } elseif(preg_match('/Firefox/i',$u_agent)) {
               $bname = 'Mozilla Firefox';
               $ub = "Firefox";
            } elseif(preg_match('/Chrome/i',$u_agent)) {
               $bname = 'Google Chrome';
               $ub = "Chrome";
            }elseif(preg_match('/Safari/i',$u_agent)) {
               $bname = 'Apple Safari';
               $ub = "Safari";
            }elseif(preg_match('/Opera/i',$u_agent)) {
               $bname = 'Opera';
               $ub = "Opera";
            }elseif(preg_match('/Netscape/i',$u_agent)) {
               $bname = 'Netscape';
               $ub = "Netscape";
            }
            
            // finally get the correct version number
            $known = array('Version', $ub, 'other');
            $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
            
            if (!preg_match_all($pattern, $u_agent, $matches)) {
               // we have no matching number just continue
            }
            
            // see how many we have
            $i = count($matches['browser']);
            
            if ($i != 1) {
               //we will have two since we are not using 'other' argument yet
               
               //see if version is before or after the name
               if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                  $version= $matches['version'][0];
               }else {
                  $version= $matches['version'][1];
               }
            }else {
               $version= $matches['version'][0];
            }
            
            // check if we have a number
            if ($version == null || $version == "") {$version = "?";}
            return array(
               'userAgent' => $u_agent,
               'name'      => $bname,
               'version'   => $version,
               'platform'  => $platform,
               'pattern'   => $pattern
            );
         }
         
         // now try it
         $ua = getBrowser();
         $yourbrowser = "Your browser: " . $ua['name'] . " " . $ua['version'] .
            " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
         
         print_r($yourbrowser);
      ?>
   
   </body>
</html>
```

Это приводит к следующему результату на моей машине. 
Этот результат может отличаться для вашего компьютера в зависимости от того, что вы используете.

Это приведет к следующему результату -``` Your browser: Google Chrome 65.0.3325.181 on linux reports: 
                                          Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36```

### Отображать изображения в случайном порядке 

Функция PHP rand () используется для генерации случайного числа. 

Эта функция может генерировать числа с-в заданном диапазоне. 

Генератор случайных чисел должен быть высеян, чтобы предотвратить формирование регулярного шаблона чисел. 

Это достигается с помощью функции srand (), которая определяет номер семени в качестве аргумента.

Следующий пример демонстрирует, как вы можете отображать разные изображения каждый раз из четырех изображений -  
```
<html>
   <body>
   
      <?php
         srand( microtime() * 1000000 );
         $num = rand( 1, 4 );
         
         switch( $num ) {
            case 1: $image_file = "307600.jpg";
               break;
            
            case 2: $image_file = "24325386.jpg";
               break;
            
            case 3: $image_file = "download.jpeg";
               break;
            
            case 4: $image_file = "download(1).jpeg";
               break;
         }
         echo "Random Image : <img src=$image_file />";
      ?>
      
   </body>
</html>
```
Это приведет к следующему результату - ![alt text](download(1).jpeg)

### Использование форм HTML

Самое важное, что следует учитывать при работе с HTML-формами и PHP, - это то,
что любой элемент формы на странице HTML будет автоматически доступен для ваших PHP-скриптов.
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
![alt text](https://www.tutorialspoint.com/php/images/forms.jpg)

* Переменная PHP по умолчанию $ _PHP_SELF используется для имени скрипта PHP, и когда вы нажимаете кнопку «отправить»,
 тот же PHP-скрипт будет вызываться и будет вызывать следующий результат:
 
* Метод = "POST" используется для отправки пользовательских данных на серверный скрипт. Существует два метода отправки данных на серверный скрипт,
 которые обсуждаются в главе PHP GET & POST.

### Перенаправление браузера

Функция PHP header () поставляет сырые заголовки HTTP в браузер и может использоваться для перенаправления на другое место.
Сценарий перенаправления должен находиться на самой верхней части страницы, чтобы предотвратить загрузку любой другой части страницы.

Цель указана в заголовке Location: как аргумент функции header (). 
После вызова этой функции функция exit () может использоваться для остановки разбора остальной части кода.

В следующем примере показано, как можно перенаправить запрос браузера на другую веб-страницу.
```
<?php
   if( $_POST["location"] ) {
      $location = $_POST["location"];
      header( "Location:$location" );
      
      exit();
   }
?>
<html>
   <body>
   
      <p>Choose a site to visit :</p>
      
      <form action = "<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
         <select name = "location">.
         
            <option value = "http://www.tutorialspoint.com">
               Tutorialspoint.com
            </option>
         
            <option value = "http://www.google.com">
               Google Search Page
            </option>
         
         </select>
         <input type = "submit" />
      </form>
      
   </body>
</html>
```
Это приведет к следующему результату - ![alt text](https://www.tutorialspoint.com/php/images/browser_redirection.jpg)