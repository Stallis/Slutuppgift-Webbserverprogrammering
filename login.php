<!DOCTYPE html PUBLIC>
<html lang="sv">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     
        <link href="CSS-file.css" rel="stylesheet">
        <title> Edebycamping H�l� </title>
    </head>   
<body>
       <header>  

           <nav class="navbar">
               <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <a href="index.html" class="nav-branding"> <?php  echo utf8_encode( "Edebycamping H�l�");?>  </a> 
                      
              <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"<?php  echo utf8_encode( ">Hem");?>  </a> 
                </li> 
                <li>
                    <a class="nav-link" href="boende.html"><?php  echo utf8_encode( "Boende");?>  </a> 
                </li>
                <li>
                    <a class="nav-link" href="ata.html"><?php  echo utf8_encode( "�ta");?>  </a> 
                </li>
                <li>
                    <a class="nav-link" href="gora.html"><?php  echo utf8_encode( "G�ra");?>  </a> 
                </li> 
                <li>
                    <a class="nav-link" href="besok.html"><?php  echo utf8_encode( "Bes�k oss");?>  </a> 
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


// Kontrollera om anslutningen har uppr�ttats korrekt
if (!$conn) {
    die("Anslutningen till databasen misslyckades: " . mysqli_connect_error());
}

// H�mta anv�ndarnamn och l�senord fr�n POST-data
$username = $_POST['email'];
$password = $_POST['password'];



// Utf�r en SELECT-fr�ga f�r att h�mta anv�ndarinformation baserat p� anv�ndarnamnet
$sql = "SELECT password FROM bookings WHERE email='$username'";
$result = $conn->query($sql);
// Utf�r en SELECT-fr�ga f�r att h�mta anv�ndarinformation baserat p� anv�ndarnamnet
$sql2 = "SELECT flag FROM bookings WHERE email='$username'";
$result2 = $conn->query($sql2);

// Utf�r en SELECT-fr�ga f�r att h�mta anv�ndarinformation baserat p� anv�ndarnamnet
$sql3 = "SELECT id FROM bookings WHERE email='$username'";
$result3 = $conn->query($sql3);

// Kolla om anv�ndaren finns i databasen
if ($result->num_rows == 1) {
    

  // H�mta l�senordet fr�n databasen
  $row = $result->fetch_assoc();
  $hashed_password = $row["password"];
   // H�mta l�senordet fr�n databasen
  $row2 = $result2->fetch_assoc();
    // H�mta flagga fr�n databasen
 $flag = $row2["flag"];
    // H�mta id fr�n databasen
  $row3 = $result3->fetch_assoc();
    // H�mta flagga fr�n databasen
 $id = $row3["id"];



  // J�mf�r l�senordet med det angivna l�senordet
  if (($password == $hashed_password) && ($flag == TRUE) )
  {
    // L�senord matchar, logga in anv�ndaren

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    // Skicka anv�ndaren till order-sidan
 
    ?>
        <meta HTTP-EQUIV="refresh" content="1;URL=order.php?id=<?php echo $id?>"> 
    <?php
    

  } 
  
  else if (($password == $hashed_password) && ($flag == FALSE))
  {
      // Ej verifierad via mail-l�nk
    $error = "not verified";
   
        echo utf8_encode                                                                                                                    //st�ller in echo-meddelande efter utf8 
       (    
        '<div class="ata_t1">' .    
        '<br>' .                                                                                                                    //visar med'' att det �r html-taggar som d�r vidare byter rad
        '<br>' .                                                                                                                     // -||-
          'V�nligen aktivera kontot. '  .                                      //text som skriv med css styling
         '<br>'    .                                                   
         '</div>'
         ); 
  }
  
  else 
  {
    // Fel l�senord
    $error = "Felaktigt l�senord.";
        echo utf8_encode                                                 //st�ller in echo-meddelande efter utf8 
       (    
        '<div class="ata_t1">' .    
        '<br>' .                                                        //visar med'' att det �r html-taggar som d�r vidare byter rad
        '<br>' .                                                        // -||-
          'Felaktigt l�senord '  .                                      //text som skriv med css styling
         '<br>'    .                                                   
         '</div>'
         ); 
  }
} else {
  // Anv�ndaren finns inte i databasen
  $error = "Anv�ndaren finns inte i databasen.";
}

// St�ng databasanslutningen
$conn->close();
?>


<div class = ata_t1>
    
      <form method="post" action="login.php">
          <br>
    <?php  echo utf8_encode ("E-post:");?> <input type="text" name="email"><br>
    <?php  echo utf8_encode ("L�senord:");?>  <input type="password" name="password"><br>
    <input type="submit" value="Logga in">
  </form>
    

</div>






















<?php
//L�s den sista posten som lagts till DB
$sql = "SELECT * FROM bookings ORDER BY ID DESC LIMIT 1";               //H�mtar hem senaste inskickade svar 
$result = $conn->query($sql);                                           //Utf�r en f�rfr�gan om denna sql-kod som sammanst�lls i $result        


$conn->close(); 
?>   

<div class="Endnavbar">
   <p>  <?php  echo utf8_encode( "Edebycamping & Kajakuthyrning");?>    </p>
   <p>  <?php  echo utf8_encode( "Edeby, H�l�");?>  </p>
   <p>  <?php  echo utf8_encode( "Tel: 073 987 46 86");?>   </p>             
</div> 
<!-- Denna sida skickar tillbaka anv�ndaren till start efer 5 sek 
<meta HTTP-EQUIV="refresh" content="5;URL=index.html"> -->
</body>
</html>

