<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../css/main.css">
   <title>speisekarte</title>
</head>

<body>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="./css/main.css">
      <style>
         .speisekarte {
            min-height: 100vh;
            background-image: url(../img/karte_bg.jpg);
            background-size: cover;
         }

         .speisekarte>h1 {
            font-size: 5rem;
            color: #fff;
            text-align: center;
            padding: 4rem;
         }

         .tabs {
            width: 30rem;
            height: 3rem;
            margin: 0 auto;
            text-align: center;
            display: flex;
         }

         .pizza-tab,
         .food-tab,
         .wine-tab {
            width: 33%;
            line-height: 3rem;
            font-size: 1.3rem;
            background-color: #fff;
            border-bottom: 1px solid #fff;
            border-top: 1px solid #fff;
            cursor: pointer;
         }

         .tab-active {
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #ffffff;
         }

         .wine-tab {
            border-radius: 0 10px 10px 0;
         }

         .pizza-tab {
            border-radius: 10px 0 0 10px;
         }
         .speisekarte-menu{
            width: 70%;
            margin: 0 auto;
         }
         .speisekarte-menu h1 {
            font-size: 10rem;
            color: #fff;
            text-align: center;
            margin-top: 10rem;
         }

         .pizza{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 5rem 0;
            
         }
         .pizza form {
            border-radius: 10px;
            overflow: hidden;
            margin: 2rem;
            width: 25%;
            min-width: 20rem;
            background-color: #fff;
            color: #333333;
            will-change: auto;
            transition: all 0.5s ease-in-out;
         }

         .pizza form:hover {
            color: #fff;
            background-color: #333333;
         }
         .pizza-card {
            padding: 2rem;
         }
         
         .d-none {
            display: none;
         }

         .pizza-card h2 {
            font-size: 2rem;
            text-align: center;
            padding: 1rem 0;
         }
         .pizza-card > p {
            font-size: 1.2rem;
            text-align: center;
            line-height: 130%;
            width: 100%;
            min-height: 4.5rem;
            

         }
         .config__btn,
         .submit-btn {
            display: block;
            text-align: center;
            padding: 0.7rem 2rem;
            background-color: red;
            border: none;
            border-radius: 10px;
            font-size: 1.3rem;
            line-height: 1.3rem;
            margin: 0 auto;
            margin-top: 3rem;
            color: #fff;
            cursor: pointer;
            width: 10rem;
         }
         .config__btn{
            background-color: rgba(47,150, 71, 1);
         }
         .radio-box {
            padding: 3rem;
            position: fixed;
            color: #fff;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 35rem;
            height: 35rem;
            background-color: rgba(0, 0 ,0, 0.8);
         }
         .radio-box p {
            text-align: left;
            font-size: 1.3rem;   
         }
         
         .radio-box input {
           margin-right: 5px;
         
         }
         .close {
            position: absolute;
            cursor: pointer;
            right: 2rem;
            top: 2rem;
            font-size: 5rem;
            color: #fff;
            font-family: Montez, sans-serif;
         }
         .radio:nth-of-type(3) {
           margin-bottom: 2rem;

         }
      </style>
      <title>pizza</title>
   </head>


   <body>
      <header class="header" id="scroll-top">
         <nav class="header-nav d-flex">
            <div class="header-logo">
               <img src="../img/logo.png" alt="logo">
            </div>
            <menu class="header-menu">
               <a href="../index.html">Startseite</a>
               <a href="../index.html">Restaurant</a>
               <a href="../index.html">Über uns</a>
               <a href="#">Speisekarte</a>
            </menu>
         </nav>
         <div class="header-info d-flex">
            <button class="header__btn">Reservieren</button>
            <div class="header-tel">
               <img src="../img/svg/el-phone-alt.svg" alt="tel">
               <a href="tel:+49123456789">+491324567898</a>
            </div>
            <div class="header-login">
               <img src="../img/svg/anmelden-icon.svg" alt="anmelden">
               <a href="#">Anmelden</a>
            </div>
         </div>
         <img class="header__slogan" src="../img/svg/slogan.svg" alt="slogan">
         <img src="../img/svg/hamb.svg" alt="menu" id="hamb-menu">
      </header>
      <main class="speisekarte">
         <h1>Speisekarte</h1>
         <div class="tabs">
            <div class="pizza-tab tab-active">Pizza</div>
            <div class="food-tab">Essen</div>
            <div class="wine-tab">Wein</div>
         </div>
         <section class="speisekarte-menu pizza">
            <?php
   include_once("./db_funktionen.php");

   $sql = "SELECT * FROM pizza";

   $result = db_query($sql);
   

   while ($row  = mysqli_fetch_object($result)){
      $id_pizza = $row -> id_pizza;
      $pizzasorte = $row -> sorte;
      $grundpreis = $row -> grundpreis;
      $zutaten = $row -> zutaten;
      
      echo "<form method='get' action='bestellung.php'>";
      echo "<img src='../img/pizza.jpg' alt='pizza' style='width: 100%;'>";
      echo "<div class='pizza-card'>";
      echo "<h2>" . $id_pizza . ". " . $pizzasorte . "</h2>";
      echo "<p>" . $zutaten . "</p>";
      echo "<button class='config__btn'>Check</button>";
     // echo "<p>". "Preis - " . $grundpreis . " Euro" . "</p>";
      echo "<input type='hidden' name='pizzasorte' value='$pizzasorte'";
      

      // GROESSE UND GROESSEPREIS---------------------------------

      $sql2 = "SELECT g.groesse, g.groessenpreis
         FROM groesse g, pizza_groesse pg, pizza p
         WHERE g.id_groesse = pg.id_groesse
         AND p.id_pizza = pg.id_pizza
         AND p.id_pizza  LIKE '$id_pizza'";

      $result2 = db_query($sql2);
      echo "<div class='belag-content'>";
      echo  "<div class='radio-box d-none'>";
      echo "<span class='close'>X</span>";

      while ($row2 = mysqli_fetch_object($result2)){

      $size = $row2 -> groesse;
   $size_price= $row2 -> groessenpreis;
   $price = ($size_price + $grundpreis);
   $price2 = ($size_price + $grundpreis);
   $price = number_format($price, 2, ", ", ".");
   
   echo "<p class='radio'><label><input type='radio' name='size' id='size' value='$size'>" . $size . " _ _ _ _ _ _ _ _ _  " . $price . " Euro</label></p>";
   
   echo "<input type='hidden' name='price' value='$price2'>";

   } 


// BELAGAUSWAHL für jede pizza  ausgehen--------------------------------------------------

   $sql3 = "SELECT * FROM belag";

   $result3 = db_query($sql3);
   
   while($row3 = mysqli_fetch_object($result3)) {
   $id_belag = $row3 -> id_belag;
   $belagspreis = $row3 -> belagspreis;
   $belag = $row3 -> belag;
   
   echo "<p><label><input type='checkbox'name='$belag' value='$belagspreis'> " . $id_belag . ". " . $belag. " _ _ _ _ _ _ _ _ _ _ " . $belagspreis . "</label></p>";
   

   }
   
   echo '<input type="submit" class="submit-btn" value="Bestellen">';
   echo "</div>";
   echo "</div>";
   echo "</form>";

   }
   
   ?>
         </section>
         <section class="speisekarte-menu essen d-none">
            <h1>ESSEN</h1>
         </section>
         <section class="speisekarte-menu wine d-none">
            <h1>WINE</h1>
         </section>
      </main>
      <footer class="footer d-flex">
         </div>
         <section class="news d-flex">
            <img src="../img/logo.png" alt="logo" class="news__logo">
            <div class="news-text">
               <h4>Newsletter</h4>
               <p>Lorem quis pharetra sollicitudin posuere porttitor. </p>
            </div>
            <div class="news-abo">
               <input type="email" name="mail" placeholder="E-mail Adresse">
               <button class="news__btn">
                  <img src="../img/svg/letter_footer.svg" alt="brief">
               </button>
            </div>
         </section>
         <section class="open">
            <h4>Öffnungzeiten</h4>
            <div class="d-flex">
               <img class="open__clock" src="../img/svg/et-clock.svg" alt="clock">
               <p>Mo, Mi - Fr.</p>
               <p>11:00 - 14:00 Uhr</p>
            </div>
            <div class="d-flex">
               <p>Nachmittag:</p>
               <p>17:00 - 24:00 Uhr</p>
            </div>
            <div class="d-flex">
               <p>Dienstag:</p>
               <p>Ruhetag</p>
            </div>
            <div class="d-flex">
               <p>Sams, Sonn:</p>
               <p>10:30 - 23:00 Uhr</p>
            </div>
         </section>
         <section class="contact">
            <h4>Kontakt</h4>
            <div class="d-flex">
               <img src="../img/svg/location.svg" alt="location">
               <p>
                  Restaurant do Deni
                  musterstrasse 55
                  12345 Musterstadt
               </p>
            </div>
            <div class="d-flex">
               <img src="../img/svg/tel_kontakt.svg" alt="telephone">
               <p><a href="tel:+1545165665">+49123456789</a></p>
            </div>
            <div class="d-flex">
               <img src="../img/svg/brief_kontakt.svg" alt="mail">
               <p><a href="mail:">dodeni@info.com</a></p>
            </div>

         </section>
      </footer>


      <script>
         const tabSwitch = () => {
            const tab = document.querySelectorAll('.tabs > div'),
               tabContent = document.querySelectorAll('.speisekarte-menu');

            const tabToggle = (index) => {

               for (let i = 0; i < tabContent.length; i++) {
                  if (index === i) {
                     tab[i].classList.add('tab-active');
                     tabContent[i].classList.remove('d-none');

                  } else {
                     tab[i].classList.remove('tab-active');
                     tabContent[i].classList.add('d-none');
                  }

               }
            };

            tab.forEach((item, i) => {

               item.addEventListener('click', (e) => {
                  console.log('item: ', item);
                  item = i
                  if (item === i) {

                     tabToggle(i);
                  }
               });
            });
         };
         tabSwitch();
         const belagShow = ()=> {

            const belagBtn = document.querySelectorAll('.config__btn');
            const belagContent = document.querySelectorAll('.radio-box');
            const closeBtn = document.querySelectorAll('.close');

            const popUp = (index) => {

            for (let i = 0; i < belagContent.length; i++) {
               if (index === i) {
                  belagContent[i].classList.remove('d-none');
                  document.body.style.overflow = 'hidden';

               }
            }
            };
            popUp();

            console.log('belagContent: ', belagContent);
            belagBtn.forEach((item, i)=>{
               item.addEventListener('click', (event)=>{
               event.preventDefault();
               item = i;
               if(item === i){
                  popUp(i);
               }
            });
            });
            closeBtn.forEach((item)=>{
               item.addEventListener('click',()=>{
                  console.log('item: ', item);

                  for (let i = 0; i < belagContent.length; i++) {
                     belagContent[i].classList.add('d-none');
                     document.body.style.overflow = '';
                  }
                  
               })
            });
         };
         belagShow()
      </script>

   </body>

   </html>
</body>

</html>