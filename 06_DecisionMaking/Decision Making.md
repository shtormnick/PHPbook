## Decision Making
if ... else - использовать этот оператор, если вы хотите выполнить набор кода, когда условие истинно, а другое, если условие не верно

elseif statement - используется с оператором if ... else для выполнения набора кода, если выполняется одно из нескольких условий

оператор switch - используется, если вы хотите выбрать один из многих блоков кода, который должен быть выполнен, используйте оператор Switch.
Оператор switch используется для избежания длинных блоков if..elseif..else.
______________________
### If ... Else

if (condition)
   code to be executed if condition is true;
else
   code to be executed if condition is false;
```
   <html>
      <body>

         <?php
            $d = date("D");

            if ($d == "Fri")
               echo "Have a nice weekend!";

            else
               echo "Have a nice day!";
         ?>

      </body>
   </html>
```
   Эта программа выведет Have a nice weekend!
____________________
### ElseIf

if (condition)
   code to be executed if condition is true;
elseif (condition)
   code to be executed if condition is true;
else
   code to be executed if condition is false;
```
   html>
      <body>

         <?php
            $d = date("D");

            if ($d == "Fri")
            {
               echo "Have a nice weekend!";
               }

            elseif ($d == "Sun")
               echo "Have a nice Sunday!";

            else
               echo "Have a nice day!";
         ?>

      </body>
   </html>
```
   Эта программа выведет Have a nice weekend!
__________________
### Switch
```
switch (expression){
   case label1:
      code to be executed if expression = label1;
      break;

   case label2:
      code to be executed if expression = label2;
      break;
      default:

   code to be executed
   if expression is different
   from both label1 and label2;
}
```
__________________
```
<html>
   <body>

      <?php
         $d = date("D");

         switch ($d){
            case "Mon":
               echo "Today is Monday";
               break;

            case "Tue":
               echo "Today is Tuesday";
               break;

            case "Wed":
               echo "Today is Wednesday";
               break;

            case "Thu":
               echo "Today is Thursday";
               break;

            case "Fri":
               echo "Today is Friday";
               break;

            case "Sat":
               echo "Today is Saturday";
               break;

            case "Sun":
               echo "Today is Sunday";
               break;

            default:
               echo "Wonder which day is this ?";
         }
      ?>

   </body>
</html>
```
Программа выведет Today is Monday
