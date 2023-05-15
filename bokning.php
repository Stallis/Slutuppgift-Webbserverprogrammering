<!DOCTYPE html PUBLIC>
<html lang="sv">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     
        <link href="CSS-file.css" rel="stylesheet">
        <title> Edebycamping Hölö </title>
    </head>   
<body>
       <header>  

           <nav class="navbar">
               <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <a href="index.html" class="nav-branding"> <?php  echo ( "Edebycamping Hölö");?>  </a> 
                      
              <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"<?php  echo ( ">Hem");?>  </a> 
                </li> 
                <li>
                    <a class="nav-link" href="boende.html"><?php  echo ( "Boende");?>  </a> 
                </li>
                <li>
                    <a class="nav-link" href="ata.html"><?php  echo ( "Äta");?>  </a> 
                </li>
                <li>
                    <a class="nav-link" href="gora.html"><?php  echo ( "Göra");?>  </a> 
                </li> 
                <li>
                    <a class="nav-link" href="besok.html"><?php  echo ( "Besök oss");?>  </a> 
                </li>               
                <li>
                    <a class="nav-link" href="boka2.html"><?php  echo ( "Nyhetsbrev");?>  </a> 
                </li>
              </ul>
            
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span> 
                
            </div> 
            </nav>
        </header>

  <title>Bookings</title>

<?php 
$host = "stallgard.se.mysql:3306";
//$host = "185.27.134.10";
$database = "stallgard_se";
$username = "stallgard_se";
$password = "alvinCamping321";
$port = "3306";
// Anslut till databasen
$conn = mysqli_connect($host, $username, $password, $database);
//$conn = mysqli_connect($host);


// Kontrollera om anslutningen har upprättats korrekt
if (!$conn) {
    die("Anslutningen till databasen misslyckades: " . mysqli_connect_error());
}

// Hämta användarens namn, e-postadress och telefonnummer från formuläret
$name = $_POST['name'];
$email = $_POST['epost'];
$tel = $_POST['tel'];
$epost = $_POST['epost'];
$epost2 = $_POST['epost2'];
$password = $_POST['password'];

// Kontrollera att epost är korrekt
// Kontrollera uppgifter med exempelvis patterns och swich med NULL

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

switch ($epost) {
  case (!preg_match($regex, $epost)):
    echo                                                  //ställer in echo-meddelande efter utf8 
       (                                    
        '<br>' .                                                        //visar med'' att det är html-taggar som där vidare byter rad
        '<br>' .                                                        // -||-
         '<div class="ata_t1">' .                                       //formaterar efter div klassen som används i ata_t1 (dvs ett annat html-doc som har styling via css)
         '<p>' .                                                        //visar med'' att det är html-taggar, formaterar paragraf genom html
         'Du har angivit en felaktig epostadress i det första fältet' .
         '<br>' .
         'Vänligen försök igen!'                                        //text som skriv med css styling
         ); 
         
    echo (
        '<meta HTTP-EQUIV="refresh" content="3;URL=boka2.html"> '   //3 sekunder
        );
    break;
  case (!($epost == $epost2)):
    echo                                                                //ställer in echo-meddelande efter utf8 
       (                                    
        '<br>' .                                                        //visar med'' att det är html-taggar som där vidare byter rad
        '<br>' .                                                        // -||-
         '<div class="ata_t1">' .                                       //formaterar efter div klassen som används i ata_t1 (dvs ett annat html-doc som har styling via css)
         '<p>' .                                                        //visar med'' att det är html-taggar, formaterar paragraf genom html
         'Epostadresserna stämmer inte överens' .
         '<br>' .
         'Vänligen försök igen!'                                        //text som skriv med css styling
         ); 
         
     echo (
        '<meta HTTP-EQUIV="refresh" content="3;URL=boka2.html"> '
        );
    break;
  case (($epost == $epost2) && (preg_match($regex, $epost))):
   // Lägg till bokningsuppgifterna i databasen
        $sql = "INSERT INTO bookings (name, email, tel, password) VALUES ('$name', '$email', '$tel', '$password')";

        $result = mysqli_query($conn, $sql); // Skickar SQL-frågan som lägger till bokningsuppgifter i databasen och resultatet tilldelas sedan till variabeln $result.

        if (!$result)
        {
             die("Misslyckades att lägga till bokningsuppgifter i databasen: " . mysqli_error($conn));
        } 
        else 
        {
            echo (
        '<meta HTTP-EQUIV="refresh" content="5;URL=tack.php"> '
        );}
//exit();
    break;
  default:
    echo "Felaktig input!";
}        







//echo "Bokningsuppgifter har lagts till i databasen!";
//    include 'emailsend.php';




?>





<!-- <html>
<body>

<p>Din bokning är genomförd! <?php echo $_POST["name"]; ?></p><br>
<p>Din email address är: <?php echo $_POST["email"]; ?></p>
<p>Ditt telefonummer: <?php echo $_POST["tel"]; ?></p>
-->
</body>
</html>