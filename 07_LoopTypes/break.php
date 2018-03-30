<html>
<body>

    <?php
        $i = 0;

        while( $i < 10) {
            $i++;
            if( $i == 3 )break;
            echo "i-".$i."</ br>";
        }
        echo ("Loop stopped at i = $i" );
    ?>

</body>
</html>