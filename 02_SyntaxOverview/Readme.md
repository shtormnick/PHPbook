# Syntax Overview
[code](index.php)
## 1!
самый распространенный стиль PHP-тегов
```
<?php...?>
```
Если вы используете этот стиль, вы можете быть уверены, что ваши теги всегда будут правильно интерпретироваться.

## 2!
Короткие или коротко открытые теги
```
<?...?>
```
нужно подключить распознавание короткиъ тегов --enable-short-tags, когда вы строите PHP.
Установите параметр short_open_tag в файле php.ini для включения.
Этот параметр должен быть отключен для синтаксического анализа XML с помощью PHP,
поскольку для тегов XML используется тот же синтаксис.

## 3!
Active Server Pages для определения кодовых блоков. Теги в стиле ASP выглядят так:
```
<%...%>
```
Чтобы использовать теги в стиле ASP, вам необходимо установить параметр конфигурации в файле php.ini.

## 4!
HTML теги
```
<script language = "PHP">...</script>
```


## 5!
### 5.1
Теги для коментов
```
<?
   # This is a comment, and
   # This is the second line of the comment

   // This is a comment too. Each style comments only
   print "An example with single line comments";
?>
```
### 5.2
Многострочная печать. Вот примеры для печати нескольких строк в одном заявлении печати -
```
<?
   # First Example
   print <<<END
   This uses the "here document" syntax to output
   multiple lines with $variable interpolation. Note
   that the here document terminator must appear on a
   line with just a semicolon no extra whitespace!
   END;

   # Second Example
   print "This spans
   multiple lines. The newlines will be
   output as well";
?>
```
### 5.3
Многострочные комментарии.
Обычно они используются для обеспечения псевдокодовых алгоритмов и более подробных объяснений, когда это необходимо.
```
<?
   /* This is a comment with multiline
      Author : Mohammad Mohtashim
      Purpose: Multiline Comments Demo
      Subject: PHP
   */

   print "An example with multi line comments";
?>
```
