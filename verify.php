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
                      
             
            </div> 
            </nav>
        </header>

  <title>Verify!</title>

  
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


// Kontrollera om anslutningen har uppr�ttats korrekt
if (!$conn) 
{
    die("Anslutningen till databasen misslyckades: " . mysqli_connect_error());
}

$id = $_GET['id'];
echo $id;
                      //H�mtar hem senaste inskickade svar 
// L�gg till bokningsuppgifterna i databasen
$sql = "UPDATE bookings SET flag = true WHERE id = $id"; 

$result = mysqli_query($conn, $sql); // Skickar SQL-fr�gan som l�gger till bokningsuppgifter i databasen och resultatet tilldelas sedan till variabeln $result.


       echo utf8_encode                                                 //st�ller in echo-meddelande efter utf8 
       (                                    
        '<br>' .                                                        //visar med'' att det �r html-taggar som d�r vidare byter rad
        '<br>' .                                                        // -||-
         '<div class="ata_t1">' .                                       //formaterar efter div klassen som anv�nds i ata_t1 (dvs ett annat html-doc som har styling via css)
         '<p>' .                                                        //visar med'' att det �r html-taggar, formaterar paragraf genom html
         'Tack din email �r nu verifierad ! Du skickas nu till startsidan.'                                                        //text som skriv med css styling
        ); 
			

$conn->close();
?>    

<div class="Endnavbar">
   <p>  <?php  echo utf8_encode( "Edebycamping & Kajakuthyrning");?>    </p>
   <p>  <?php  echo utf8_encode( "Edeby, H�l�");?>  </p>
   <p>  <?php  echo utf8_encode( "Tel: 073 987 46 86");?>   </p>             
</div> 
<!-- Denna sida skickar tillbaka anv�ndaren till start efer 5 sek -->
<meta HTTP-EQUIV="refresh" content="5;URL=index.html"> 
</body>
</html>

