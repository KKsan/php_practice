<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="php practice"/>
        <meta name="author" content="Xizhao Deng"/>
        <meta name="keywords" content="html, php, css, JavaScript"/>
        <title>PHP Practice</title>
    </head>
    <body>
        <?php

            // variable names are case sensitive
            $characterName = "John"; //variable
            $characterAge = 35;
            $gpa = 3.23;
            $isMale = false;
            $longStr = "bling bling power raider\r\n";

            $newVar = &$$isMale; //assign by reference

            define("_pi", 3.1415926); //constant, always global scope

            echo _pi;

            echo("Hello world");
            echo "<h1>This can be html code</h1>";
            echo("character name: $characterName character age: $characterAge");
            echo "<hr>";

            echo $longStr;
            echo strtoupper($longStr);
            echo strlen($longStr);
            echo $longStr[2];

            echo abs(-100);

            $car = "abc" . "def"; //. operator is for concatenation
            $car .= "xyz";

            echo "car:  $car";

            echo '$car'; //will output $car on console, anything in single quotes are not evaluated and taken literally

            echo "\"escaped\"";
            echo '"escaped"';



        ?>
        <!-- ------------------------get------------------------ -->

        <form action="site.php" method="get">
            Name: <input type="text" name="name">
            <input type="submit">
        </form>
        <?php echo $_GET["name"]; ?>

        <!-- ----------------------more get-------------------------- -->
        <form action="site.php" method="get">
            Color: <input type="text" name="color"> <br>
            Noun: <input type="text" name="noun"> <br>
            <input type="submit">
        </form>


        <?php
            $color = $_GET["color"];
            $noun = $_GET["noun"];
            echo "Roses are $color <br>";
            echo "$noun are blue";
        ?>

        <!-- -------------------get vs post----------------------------- -->
        <form action="site.php" method="get">
            Name: <input type="text" name="name">
            <input type="submit">
        </form>

        <?php 
            echo $_GET["name"]; 
            echo $_GET["age"]; //get the age from URL parameter by appending &age=xxxx to the URL 
        ?>

        <form action="site.php" method="post">
            Password: <input type="password" name="password">
            <input type="submit">
        </form>
        <?php echo $_POST["password"]; ?>

        <!-- ----------------------array-------------------------- -->

        <?php
            $friends = array("Kevin", "Karen", "Kerry", 400, 10.02);
            echo $friends;
            echo "<br>";
            echo $friends[1];
            $friends[1] = "Andy";
            echo "<br>";
            echo $friends[1];
            $friends[5] = 200;
            echo count($friends);
        ?>

        <!-- -----------------------checkbox------------------------- -->

        <form action="site.php" method="post">
            Apples: <input type="checkbox" name="fruits[]" value="apples"><br>
            Oranges: <input type="checkbox" name="fruits[]" value="oranges"><br>
            Pears: <input type="checkbox" name="fruits[]" value="pears"><br>
            <input type="submit">

        </form>

        <?php
            $fruits = $_POST["fruits"];
            echo $fruits[0];
        ?>

        <!-- ---------------------associative array (aka map)--------------------------- -->

        <?php
            $grades = array("Jim" => "A+", "Pam" => "B-");
            echo $grades["Jim"];
            $grades["Jim"] = "F-";
            echo $grades["Jim"];
        ?>

        <!-- ---------------------functions--------------------------- -->


        <?php

            // function names are not case sensitive

            $HowMuch = 10;

            function sayHi($content) {
                echo "fuck you bitch $content";

                $localVar = "abc"; //local variable
                static $stVar = "xyz"; //static variable, maintain its value when the function is completed, so if this function is called again, the value remains as it was
            }

            sayHi($HowMuch);


            function cube($num) {
                return $num * $num * $num;
            }

            $value = cube($HowMuch);
            echo $value;

            function getMax($num1, $num2) {
                return $num1 >= $num2 ? $num1 : $num2;
            }

            echo getMax(33, 44);

        ?>


        <!-- ---------------------if else--------------------------- -->
        <?php
            $isMale = 1;

            if($isMale == 2) {
                echo "You are male";
            }
            else if($isMale > 2) {
                echo "You are not male";
            }
            else {
                echo "again fuck you";
            }


        ?>


        <!-- ---------------------switch--------------------------- -->

        <?php
            $grade1 = "A";
            $grade2 = "F";

            function comment($grade) {
                switch($grade) {
                    case "A":
                        echo "A-ed<br>";
                        break;
                    case "B":
                        echo "B-ed<br>";
                    default:
                        echo "invalid grade<br>";
                }
            }   

            comment($grade1);
            comment($grade2);

        ?>

        <!-- ---------------------loops--------------------------- -->
        <?php
            $index = 1;
            while($index <= 5) {
                echo "$index <br>";
                $index ++;

            }

            do {
                echo "$index <br>";
                $index ++;

            } while($index <= 5);


            for($i = 1; $i < 10; ++$i) {
                echo "loop at $i <br>";
            }


            /*
                block comments
            */

            //comments
            //comments

        ?>


        <!-- ---------------------include HTML in PHP file--------------------------- -->
        <?php include "header.html" ?>
        <p>Hellow World</p> 
        <?php include "footer.html" ?>

        <!-- ---------------------include PHP in PHP file--------------------------- -->

        <?php 
            $title = "My First Post";
            $author = "Mike";
            $wordCount = 400;
            include "article-header.php";

            echo $feetInMile;

            sayHola();
        ?>

        <!-- ---------------------class & objects--------------------------- -->

        <?php

            class Book {
                public $title;
                public $author;
                public $pages;
                private $ISBN;
                var $price;  //var is equivalent to public, but generally not used

                function __construct($ti, $au, $pa, $is) {
                    $this->title = $ti;
                    $this->author = $au;
                    $this->pages = $pa;
                    $this->setISBN($is); //use setter for private attributes
                    echo "new book created";
                }


                function overPages($limit) {
                    return $this->pages >= $limit;
                }

                function getISBN() {
                    return $this->ISBN;
                }

                function setISBN($newIs) {
                    $this->ISBN = $newIs;
                }
            }


            class Textbook extends Book {
                function burnTheBook() {
                    echo "burning!!!";
                }

                function getISBN() {
                    echo "overwritten the getISBN function! $haa";
                }
            }


            $book1 = new Book("Harry Potter", "JK Rowling", 400, "12345-54321");

            echo $book1->title;
            $book1->title = "Hunger Games";
            echo $book1->title;

            echo $book1->getISBN();

            $book1->setISBN("abcd");
            echo $book1->getISBN();            

            if($book1->overPages(300)) {
                echo "<br>book over 300 pages! <br>";
            }


            $textbook1 = new Textbook("Three Body Problem", "Cixin Liu", 1000, "456-654");
            $textbook1->burnTheBook();
            echo $textbook1->getISBN();  

        ?>



    </body>


</html>