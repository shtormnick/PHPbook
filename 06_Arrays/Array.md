
## Строки

Числовой массив - массив с числовым индексом. Значения хранятся и доступны линейным образом.

Ассоциативный массив - массив со строками в качестве индекса. Это сохраняет значения элементов в сочетании с ключевыми значениями,
а не строгим линейным порядком индекса.

Многомерный массив. Доступ к массиву, содержащему один или несколько массивов и значений, осуществляется с использованием нескольких индексов
____________________
### Числовой Массив

Эти массивы могут хранить числа, строки и любой объект, но их индекс будет представлен числами. По умолчанию индекс массива начинается с нуля.
```
<html>
   <body>

      <?php
         /* First method to create array. */
         $numbers = array( 1, 2, 3, 4, 5);

         foreach( $numbers as $value ) {
            echo "Value is $value <br />";
         }

         /* Second method to create array. */
         $numbers[0] = "one";
         $numbers[1] = "two";
         $numbers[2] = "three";
         $numbers[3] = "four";
         $numbers[4] = "five";

         foreach( $numbers as $value ) {
            echo "Value is $value <br />";
         }
      ?>

   </body>
</html>
```
Программа выведет
Value is 1
Value is 2
Value is 3
Value is 4
Value is 5
Value is one
Value is two
Value is three
Value is four
Value is five
_____________________
### Ассоциативный массив
Ассоциативные массивы очень похожи на числовые массивы с точки зрения функциональности,
но они различаются по индексу. Ассоциативный массив будет иметь свой индекс как строку,
чтобы вы могли установить сильную связь между ключом и значениями.

Чтобы хранить зарплаты сотрудников в массиве, числовой индексный массив не был бы лучшим выбором.
Вместо этого мы могли бы использовать имена сотрудников в качестве ключей в нашем ассоциативном массиве,
и значение было бы их соответствующей зарплатой.
```
<html>
   <body>

      <?php
         /* First method to associate create array. */
         $salaries = array("mohammad" => 2000, "qadir" => 1000, "zara" => 500);

         echo "Salary of mohammad is ". $salaries['mohammad'] . "<br />";
         echo "Salary of qadir is ".  $salaries['qadir']. "<br />";
         echo "Salary of zara is ".  $salaries['zara']. "<br />";

         /* Second method to create array. */
         $salaries['mohammad'] = "high";
         $salaries['qadir'] = "medium";
         $salaries['zara'] = "low";

         echo "Salary of mohammad is ". $salaries['mohammad'] . "<br />";
         echo "Salary of qadir is ".  $salaries['qadir']. "<br />";
         echo "Salary of zara is ".  $salaries['zara']. "<br />";
      ?>

   </body>
</html>
```
Прога выдаст
Salary of mohammad is 2000
Salary of qadir is 1000
Salary of zara is 500
Salary of mohammad is high
Salary of qadir is medium
Salary of zara is low
__________________

### Многомерный массив

Многомерный массив каждый элемент в основном массиве также может быть массивом.
И каждый элемент в sub-массиве может быть массивом и так далее.
Значения в многомерном массиве доступны с использованием нескольких индексов.
```
<html>
   <body>

      <?php
         $marks = array(
            "mohammad" => array (
               "physics" => 35,
               "maths" => 30,
               "chemistry" => 39
            ),

            "qadir" => array (
               "physics" => 30,
               "maths" => 32,
               "chemistry" => 29
            ),

            "zara" => array (
               "physics" => 31,
               "maths" => 22,
               "chemistry" => 39
            )
         );

         /* Accessing multi-dimensional array values */
         echo "Marks for mohammad in physics : " ;
         echo $marks['mohammad']['physics'] . "<br />";

         echo "Marks for qadir in maths : ";
         echo $marks['qadir']['maths'] . "<br />";

         echo "Marks for zara in chemistry : " ;
         echo $marks['zara']['chemistry'] . "<br />";
      ?>

   </body>
</html>
```
программа выведет
Marks for mohammad in physics : 35
Marks for qadir in maths : 32
Marks for zara in chemistry : 39