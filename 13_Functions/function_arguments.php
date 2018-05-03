<html>

    <head>
        <title>Passing Argument by Reference</title>
    </head>

    <body>

        <?php
            function addFive($num) {
                $num += 5;
            }

            function addSix(&$num) {
                $num += 6;
            }

            $orignum = 10;
            addFive( $orignum );

            echo "Original Value is $orignum<br />";

            addSix( $orignum );
            echo "Original Value is $orignum<br />";

            echo '-----------------------------------<br/>';

            class Chelovek{
                public $wait = 10;
            }

            function addFiveClass($num) {
                $num->wait += 5;
            }

            function addSixClass(&$num) {
                $num->wait += 6;
            }

            $chelovek = new Chelovek();
            addFiveClass($chelovek);

            var_dump($chelovek);

            addSixClass( $orignum );
            var_dump($chelovek);
        ?>

    </body>
</html>