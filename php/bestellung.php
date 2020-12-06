<!DOCTYPE html>
<html lang="de">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>bestellung</title>
   <style>
       @font-face {
         font-family: Florentia-light;
         src: url(../font/Florentia/Florentia-Light-Italic-trial.ttf);
      }
      @font-face {
         font-family: Florentia-regular;
         src: url(../font/Florentia/Florentia-Regular-trial.ttf);
      }
      @font-face {
         font-family: Montserrat;
         src: url(../font/Montserrat/Montserrat-Regular.ttf);
      }
      @font-face {
         font-family: Montez;
         src: url(../font/Montez/Montez-Regular.ttf);
      }
      * {
         margin: 0;
         padding: 0;
      }
     main {
        z-index: 0;
        position: relative;
        width: 100%;
        height: 100vh;
        background-image: url(../img/karte_bg.jpg);
        background-size: cover;
        text-align: center;
        color: #ffffff;
     }
     main::after {
      z-index: -1;
      position: absolute;
      content: "";
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
     }
     main h1 {
        display: inline-block;
        font-size: 5rem;
        padding-top: 10vh;
        padding-bottom: 5vh;
        font-family: Montez;
        background:  linear-gradient(to right, rgba(15,245,42,1) 2%, rgba(59,247,81,1) 10%, rgba(255,255,255,1) 40%, rgba(245,245,245,1) 48%, rgba(236,32,14,1) 75%, rgba(236,32,14,1) 89%);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
      
        
     }
     main h2 {
        font-size: 2.4rem;
        margin-bottom: 1rem;
        font-family: Florentia-light;
     }
     main p {
        font-size: 1.5rem;
        font-family: Montserrat;
     }
     .preis {
        margin-bottom: 2rem;
        color:red;
        display: inline-block;
        background-color: #fff;
        padding: 0 1rem;
     }
     .belag {
     }
     .belag:last-of-type {
        margin-bottom: 2rem;
     }

   </style>
</head>

<body>
   <main>
   <div class="container">
      <h1>Ihre Bestellung</h1>
      <?php
         $pizzasorte = $_GET['pizzasorte'];
         $pizzagroesse = $_GET['size'];
         $price = $_GET['price'];

         /*if(!isset($pizzagroesse || $pizzagroesse == '')) {
            header ('Location: pizza.php');

            } */
         echo "<h2>" .$pizzasorte . "</h2>";

         include_once("./db_funktionen.php");
         $sql = "SELECT * FROM pizza
         WHERE sorte LIKE '$pizzasorte'";

         $result = db_query($sql);
         $row = mysqli_fetch_object($result);
         $zutaten = $row -> zutaten;
         echo "<p class='zutaten'>" . $zutaten . "</p>";
         echo "<p class='size'>Größe: " . $pizzagroesse . "</p>";
         echo "<p class='preis'>Grundpreis: " . $price . " Euro" . "</p>";
         echo "<p>Belag:</p>";

         $belagspreis = 0;
         foreach($_GET as $key => $value) {
            
            if($value && $key != 'price' && $key != 'pizzasorte' && $key != 'size') {
               echo "<p class='belag'>".$key."</p>";
               $belagspreis += floatval($value);
            }
         }
         $price = floatval($price);

         $gesamtpreis = $belagspreis + $price;

         $belagspreis = number_format($belagspreis, 2, ", ", ".");
         echo "<h2>Belag: ". $belagspreis .".-</h2>";

         $gesamtspreis = number_format($gesamtpreis, 2, ", ", ".");
         echo "<h2>Gesamtpreis:  ". $gesamtpreis ." .-</h2>";
       ?>
      </div>
   </main>

</body>

</html>