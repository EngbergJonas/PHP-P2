<?php
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>PHP Project 2</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
      <link href="style.css" rel="stylesheet" />
   </head>
   <body>
      <!-- Navigation -->
      <?php include 'navbar.php'?>
      <div class="container-fluid padding">
         <div class="row welcome text-center">
            <div class="col-12">
               <h1 class="display-4">Engberg Camping</h1>
            </div>
            <hr>
         </div>
      </div>
      <hr class="my-4">
      <!--- Two Column Section -->
      <div class="container-fluid" style="padding-left: 2rem; padding-right: 2rem;">
         <div class="row">
            <div class="col-lg-6">
               <a name="aboutUs" class="a-dark">
                  <h2>Webrapporten</h2>
               </a>
               <p>Som projekt 2 valde jag att göra en webtjänst som erbjuder camping möjligheter för användarna.
               </p>
               <p>Idéen är att "Engberg Camping" är et service företag, som erbjuder en business möjlighet för
                  färdledare, sammt bygger ett sammhälle mellan färdledare och nybörjare inom skogsfärder. EC tar förståss
                  sin egen andel av vinnsterna, tänk er än Uber för utflyktar.
               </p>
               <p>EC kommer också i framtiden att ha ett forum där användarna dela med sig sina ägna minnen och åsikter.
                  Tyvärr hade jag inte tid att göra bloggar mm. därför att jag tog "a bite of more than I could chew".
               </p>
               <p>Framsidan har jag designat att se mycket simpel, men modern ut. Jag använde mig av Bootstrap för designen.
                  Resten av sidorna är långt ifrån lika fina, jag ville ha "WOW" factorn vid början, men fokuserade sedan mera
                  mig på användbarheten för sidan.
               </p>
               <p>Det ända man kan göra när man inte är registrerad är att se framsidan, sammt logga in, registrera sig
                  och se personalen för EC (jag tog som skämmt ett par klasskamrater så att sidan inte skulle vara så tom).
                  Övriga länkar som man försöker trycka på kastar användaren rakt till "login.php" sidan, vilken också föreslår
                  att användaren antingen måste logga in, eller registrera sig.
               </p>
            </div>
            <div class="col-lg-6" style="padding-top: 3rem;">
               <img src="img/plane.jpg" class="img-fluid">
            </div>
         </div>
      </div>
      <div class="container-fluid" style="padding-left: 2rem; padding-right: 2rem;" >
         <div class="row">
            <div class="col-lg-12">
               <p>När användaren har registrerat sig så har hen
                  genast möjligheten att logga in med sina lösen. Efter inloggning blir användaren kastad till sin hemsida.
                  Användarsidan i sig självt ser likadan ut för alla. En meny för att se sina ägna posts och en meny för att
                  kontakta personalen. Under dessa menyer finns en blankett som man kan fylla i om man vill göra en utflykt.
                  Sidan välkomnar också användaren med dess ägna namn. När man har gjort en request som användare kan man också
                  navigera till sina ägna requests och radera dem om man så vill.
               </p>
               <p>Efter inloggning byter nav-baren sitt utseénde, beroende på om användaren är en admin eller user.
                  Inloggning sammt registrering försvinner helt och hållet, och nu kan man naviger sig antingen till sin
                  egen sida eller logga ut. Om man är admin så kommer det också att upstå en Administration meny.
                  Via administration menyn kan man radera alla användares posts, sammt radera eller updatera användaren
                  till administratörer.
               </p>
               <p>På back-end sidan av hela processen så sparas all information av användaren i en 'users' databas vid
                  registrering och vid inloggningen skapas 5 sessioner:
               </p>
               <ul>
                  <li>'loggedin': blir 'true', används som bas vid vissa tillfällen.</li>
                  <li>'role': används för att ställa in användaren, antingen som 'user' eller 'admin'.</li>
                  <li>'email': hämtar användarens email från databasen för användning.</li>
                  <li>'admin_loggedin':blir 'true', ifall användarens roll i databasen är 'admin'.</li>
                  <li>'user_loggedin': blir 'true', ifall användarens roll i databasen är 'user'.</li>
                  <li>'username': användarens namn, används vid många tillfällen.</li>
               </ul>
               <p>När man gör en request för en utflykt så bes användaren att fylla i 5 fäldt</p>
               <ul>
                  <li>'Location': vart användaren vill på utflykt.</li>
                  <li>'Persons': hur många användare som åker.</li>
                  <li>'Diet': det är alltid bra att veta om allergier.</li>
                  <li>'Duration': hur länge användare vill vara på utflykt.</li>
                  <li>'Date': när användaren vill åka på resa.</li>
                  <li>Till tabellen 'shop' sparas också 'poster', 'email' och 'created_date', för
                     att administratörer lätt skall kunna komma åt tabellen via sin sida, och för att
                     kunna flitrera postar änbart för användaren.
                  </li>
               </ul>
               <p>Vid 'Staff' menyn kan man kontakta personalen. Tyvärr fungerade inte min mail() form.
                  Jag hade inte möjlighet att testa om den fungerade förrän jag gjorde ett konto till skolans
                  phpmyadmin, men idéen var att den hämtar användarens email via en sessionsvariabel, och personalens
                  email via databsen. Sedan används fältet som användaren skriver för att göra själva mailet.
               </p>
               <p>Jag skulle kanske ha kunnat lägga mer tid på användargränssnittet än vad jag använde för framsidan,
                  men annars är jag ganska nöjd med mitt arbete.
               </p>
               <p>Jag har gjort en admin användare åt dig:
               </p>
               <ul>
                  <li>username: Dennis</li>
                  <li>password: dennispwd</li>
               </ul>
            </div>
         </div>
      </div>
      <hr class="my-4">

      <?php include "footer.php"?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>