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
                        <a href="index.html" class="nav-branding"> <?php  echo utf8_encode( "Edebycamping Hölö");?>  </a> 
                      
              <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"<?php  echo utf8_encode( ">Hem");?>  </a> 
                </li> 
                <li>
                    <a class="nav-link" href="boende.html"><?php  echo utf8_encode( "Boende");?>  </a> 
                </li>
                <li>
                    <a class="nav-link" href="ata.html"><?php  echo utf8_encode( "Äta");?>  </a> 
                </li>
                <li>
                    <a class="nav-link" href="gora.html"><?php  echo utf8_encode( "Göra");?>  </a> 
                </li> 
                <li>
                    <a class="nav-link" href="besok.html"><?php  echo utf8_encode( "Besök oss");?>  </a> 
                </li>               
                <li>
                    <a class="nav-link" href="boka2.html"><?php  echo utf8_encode( "Nyhetsbrev");?>  </a> 
                </li>
              </ul>
            
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span> 
                
            </div> 
            </nav>
        </header>

  <title>Login!</title>


<?php
//PHP Start-tagg
//Connect till MYSQL
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

// Hämta användarnamn och lösenord från POST-data
$username = $_POST['email'];
$password = $_POST['password'];



// Utför en SELECT-fråga för att hämta användarinformation baserat på användarnamnet
$sql = "SELECT password FROM bookings WHERE email='$username'";
$result = $conn->query($sql);
// Utför en SELECT-fråga för att hämta användarinformation baserat på användarnamnet
$sql2 = "SELECT flag FROM bookings WHERE email='$username'";
$result2 = $conn->query($sql2);

// Utför en SELECT-fråga för att hämta användarinformation baserat på användarnamnet
$sql3 = "SELECT id FROM bookings WHERE email='$username'";
$result3 = $conn->query($sql3);

// Kolla om användaren finns i databasen
if ($result->num_rows == 1) {
    

  // Hämta lösenordet från databasen
  $row = $result->fetch_assoc();
  $hashed_password = $row["password"];
   // Hämta lösenordet från databasen
  $row2 = $result2->fetch_assoc();
    // Hämta flagga från databasen
 $flag = $row2["flag"];
    // Hämta id från databasen
  $row3 = $result3->fetch_assoc();
    // Hämta flagga från databasen
 $id = $row3["id"];



  // Jämför lösenordet med det angivna lösenordet
  if (($password == $hashed_password) && ($flag == TRUE) )
  {
    // Lösenord matchar, logga in användaren

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    // Skicka användaren till order-sidan
 
    ?>
        <meta HTTP-EQUIV="refresh" content="1;URL=order.php?id=<?php echo $id?>"> 
    <?php
    

  } 
  
  else if (($password == $hashed_password) && ($flag == FALSE))
  {
      // Ej verifierad via mail-länk
    $error = "not verified";
   
        echo utf8_encode                                                                                                                    //ställer in echo-meddelande efter utf8 
       (    
        '<div class="ata_t1">' .    
        '<br>' .                                                                                                                    //visar med'' att det är html-taggar som där vidare byter rad
        '<br>' .                                                                                                                     // -||-
          'Vänligen aktivera kontot. '  .                                      //text som skriv med css styling
         '<br>'    .                                                   
         '</div>'
         ); 
  }
  
  else 
  {
    // Fel lösenord
    $error = "Felaktigt lösenord.";
        echo utf8_encode                                                 //ställer in echo-meddelande efter utf8 
       (    
        '<div class="ata_t1">' .    
        '<br>' .                                                        //visar med'' att det är html-taggar som där vidare byter rad
        '<br>' .                                                        // -||-
          'Felaktigt lösenord '  .                                      //text som skriv med css styling
         '<br>'    .                                                   
         '</div>'
         ); 
  }
} else {
  // Användaren finns inte i databasen
  $error = "Användaren finns inte i databasen.";
}

// Stäng databasanslutningen
$conn->close();
?>


<div class = ata_t1>
    
      <form method="post" action="login.php">
          <br>
    <?php  echo utf8_encode ("E-post:");?> <input type="text" name="email"><br>
    <?php  echo utf8_encode ("Lösenord:");?>  <input type="password" name="password"><br>
    <input type="submit" value="Logga in">
  </form>
    

</div>






















<?php
//Läs den sista posten som lagts till DB
$sql = "SELECT * FROM bookings ORDER BY ID DESC LIMIT 1";               //Hämtar hem senaste inskickade svar 
$result = $conn->query($sql);                                           //Utför en förfrågan om denna sql-kod som sammanställs i $result        


$conn->close(); 
?>   

<div class="Endnavbar">
   <p>  <?php  echo utf8_encode( "Edebycamping & Kajakuthyrning");?>    </p>
   <p>  <?php  echo utf8_encode( "Edeby, Hölö");?>  </p>
   <p>  <?php  echo utf8_encode( "Tel: 073 987 46 86");?>   </p>             
</div> 
<!-- Denna sida skickar tillbaka användaren till start efer 5 sek 
<meta HTTP-EQUIV="refresh" content="5;URL=index.html"> -->
</body>
</html>

