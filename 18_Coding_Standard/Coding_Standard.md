# Стандарты кодинга
Каждая компания придерживается разных стандартов кодирования, основанного на их лучших практиках. 
Стандарт кодирования требуется, потому что может быть много разработчиков, работающих над различными модулями, 
поэтому, если они начнут изобретать свои собственные стандарты, тогда источник станет очень неуправляемым, 
и в будущем будет трудно поддерживать этот исходный код.
Вот несколько причин, по которым использовать спецификации кодирования -

* Ваши сокомандники-программисты должны понимать код, который вы производите. 
Стандарт кодирования выступает в качестве плана для всей команды, чтобы расшифровать код.

* Простота и ясность, обеспечиваемые последовательным кодированием, избавляют вас от распространенных ошибок.

* Если вы пересмотрите свой код через некоторое время, тогда становится понятным этот код.

* Его отраслевой стандарт соответствует определенному стандарту, чтобы быть более качественным в программном обеспечении.

Существует несколько рекомендаций, которые можно использовать при кодинге в PHP.

* **Отступы и длина строки**. Используйте отступ в 4 пробела и не используйте какую-либо вкладку, 
потому что разные компьютеры используют разные настройки для вкладки. 
Рекомендуется поддерживать линии длиной приблизительно 75-85 символов для лучшей читаемости кода.

* **Структуры управления**. К ним относятся, если, для, while, switch и т. Д. 
Операторы управления должны иметь одно пространство между ключевым словом управления и открывающей скобкой, 
чтобы отличать их от вызовов функций. Вам настоятельно рекомендуется всегда использовать фигурные скобки даже в тех случаях, 
когда они являются технически необязательными.

```
if ((condition1) || (condition2)) {
      action1;
   }elseif ((condition3) && (condition4)) {
      action2;
   }else {
      default action;
   } 
```

Вы можете писать операторы switch следующим образом:
```
switch (condition) {
   case 1:
      action1;
      break;
   
   case 2:
      action2;
      break;
         
   default:
      defaultaction;
      break;
}
```

* **Вызовы функций**. Функции должны вызываться без пробелов между именем функции, открывающей скобкой и первым параметром; 
пробелы между запятыми и каждым параметром, а также пробел между последним параметром, 
закрывающей скобкой и точкой с запятой. Вот пример -
```
$var = foo($bar, $baz, $quux);
```

* **Определения функций** - объявления функций следуют «BSD / Allman style» -
```
function fooFunction($arg1, $arg2 = '') {
   if (condition) {
      statement;
   }
   return $val;
}
```

* **Комментарии** - комментарии стиля C (/ * * /) и стандартные комментарии C ++ (//) оба хороши. 
Использование комментариев в стиле Perl / shell (#) не рекомендуется.

* **Теги PHP-кода** - Всегда используйте <? Php?>, Чтобы разграничить PHP-код, а не <? ?> стенография. 
Это необходимо для соответствия PHP, а также самый переносимый способ включить PHP-код в разные операционные системы и настройки.

* **Переменные**-

  * Используйте все строчные буквы
  
  * Используйте «_» в качестве разделителя слов.
  
  * Глобальные переменные должны быть добавлены с помощью «g».
  
  * Глобальные константы должны быть все шапки с разделителями '_'.
  
  * Статические переменные могут быть добавлены с помощью 's'.
  
* **Сделать функции реентерабельными** - функции не должны содержать статические переменные, 
которые не позволяют функции быть реентерабельными.  

* **Выравнивание блоков объявлений** - Блок объявлений должен быть выровнен.

* **Один оператор в строке**. Должен быть только один оператор на строку, если утверждения не очень тесно связаны.

* **Краткие методы или функции**. Методы должны ограничиваться одной страницей кода.

При написании вашей PHP-программы может быть много других вопросов. 
Все намерения должны быть согласованы во всем программировании кода, и это будет возможно только тогда, 
когда вы будете следовать любому стандарту кодирования. 
Вы можете настроить свой собственный стандарт, если вам нравится что-то другое.