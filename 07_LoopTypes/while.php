<html>
<body>

        <?php
            $i = 0;
            $num = 50;

            while( $i < 10) {
                $num--;
                $i++;
                echo 'i-'.$i.'</br>';
                echo 'num-'.$num.'</br>';

            }

            echo ("Loop stopped at i = $i and num = $num" );
        ?>

</body>
</html>