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