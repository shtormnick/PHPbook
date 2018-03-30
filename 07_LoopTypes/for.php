<html>
   <body>

      <?php
         $a = 0;
         $b = 0;

         for( $i = 0; $i<5; $i++ ) {
            $a += 10;
            $b += 5;
            echo "i-".$i."</br>";
            echo "a-".$a."</br>";
            echo "b-".$b."</br>";
            echo '-----------------------------</br>';
         }

         echo ("At the end of the loop a = $a and b = $b" )
      ?>

   </body>
</html>
