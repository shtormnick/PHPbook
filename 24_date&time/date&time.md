##Функция time()
###Функция time() возвращает текущую метку времени Unix
Возвращает количество секунд, прошедших с начала эпохи Unix 
(1 января 1970 00:00:00 GMT) до текущего времени.
```
<?php

// Текущее время, unix формат
echo time();
````

##Функция date()

###date — Форматирует вывод системной даты/времени

Описание:

###string date ( string $format [, int $timestamp = time() ] )

$format - шаблон стрки с датой
$timestamp - текущее локальное время. Не обязательный параметр, 
если он не указана, то по дефолту устанавливается time();

В $format разпознаются следующие символы:

* "d"--- День месяца, 2 цифры с ведущим нулём---от 01 до 31

* "D"--- Текстовое представление дня недели, 3 символа---от Mon до Sun

* "W"--- Порядковый номер недели года в соответствии
 со стандартом ISO-8601; недели начинаются с понедельника --- 42 (42-я неделя года)
 
 * "M" --- Сокращенное наименование месяца, 3 символа --- от Jan до Dec
 
 * "n"---  	Порядковый номер месяца без ведущего нуля --- от 1 до 12
 
 * "Y" --- Порядковый номер года, 4 цифры ---  	Примеры: 1999, 2003
 
 * "y" --- Номер года, 2 цифры --- Примеры: 99, 03
 
 * "a"--- Ante meridiem (лат. "до полудня")
  или Post meridiem (лат. "после полудня") в нижнем регистре --- am или pm
  
  * "G" --- Часы в 24-часовом формате без ведущего нуля ---  	от 0 до 23
  
  * "i" ---  Минуты с ведущим нулём --- от 00 до 59
  
  * "s" --- Секунды с ведущим нулём --- от 00 до 59
  
  * "P" --- Разница с временем по Гринвичу
   с двоеточием между часами и минутами (добавлено в PHP 5.1.3) --- Например: +02:00
   
   Более полный список всегда можно посмотреть
    [тут](http://php.net/manual/ru/function.date.php)
    
  ##Предопределенные константы
  
  В последних версиях PHP (PHP 5 >= 5.2.0, PHP 7), представлен класс  DateTime
  Он также включает набор констант времени и может заменять функции date() и time(). 
  Например: DATE_RSS заменяет шаблон 'D, d M Y H:i:s'. 
  
  Полный список [здесь](http://php.net/manual/ru/class.datetime.php#datetime.constants.types)
   
   
  
 
 