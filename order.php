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

  <title>Tack för feedback!</title>

  
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

  //Läs den sista posten som lagts till DB
  $id =  $_GET['id'];
$sql = "SELECT * FROM bookings WHERE id=$id";               //Hämtar hem senaste inskickade svar 
$result = $conn->query($sql);                                           //Utför en förfrågan om denna sql-kod som sammanställs i $result        

if ($result->num_rows > 0)                                              //Villkorlig kontrollav $result där den kollar om antalet svar som tankats ned från databasen är större än 0. 
{                                                                       //OM SANT går programmer in i if-satsen
  // output data of each row
  while($row = $result->fetch_assoc())                                  //while-funktion där fetch_assoc används för hämta en associativ array för att lagra hela innehållet på raden som hämtats från                                                   databasen. Denna info lagras sedani $row, där nycklar som $row["name"] används för att hämta specifik data ur                                                                    array.
  {    
       echo utf8_encode                                                 //ställer in echo-meddelande efter utf8 
       (                                    
        '<br>' .                                                        //visar med'' att det är html-taggar som där vidare byter rad
        '<br>' .                                                        // -||-
         '<div class="ata_t1">' .                                       //formaterar efter div klassen som används i ata_t1 (dvs ett annat html-doc som har styling via css)
         '<p>' .                                                        //visar med'' att det är html-taggar, formaterar paragraf genom html
         'Hej '                                                        //text som skriv med css styling
         ); 
         echo                                                           //skriver ut den hämtade raden från result, dvs namnet på senaste angivna användare
         $row["name"] ; 
        echo utf8_encode                                                //Den andra utf8_encode-funktionen används för att koda om texten som hämtas från databasen
       (                                                                //Gör att den visas korrekt i webbläsaren
        ' Din registerering innehåller:' .                             //text tylad enligt div css
        '<br>' .                                                        //brake, radbryt med html-kod
                                                                     //text tylad enligt div css
        '<br>');                                                         //brake, radbryt med html-kod
        echo( $row["name"] .  
        '<br>' . 
        $row["email"]  .  '<br>' . 
        $row["tel"] .                                                      //skriver ut senaste angivna svars email, ger konfirmation på angiven email
        '<br>' . 
         '</p>' .                                                       //Avslut paragraf-tagg
         '</div>'                                                       //Avslut div-tagg
          );
       
  }
}			
else 
{
  echo "0 results";
}
$conn->close();
?>    

<div class="Endnavbar">
   <p>  <?php  echo utf8_encode( "Edebycamping & Kajakuthyrning");?>    </p>
   <p>  <?php  echo utf8_encode( "Edeby, Hölö");?>  </p>
   <p>  <?php  echo utf8_encode( "Tel: 073 987 46 86");?>   </p>             
</div> 
<!-- Denna sida skickar tillbaka användaren till start efer 5 sek
<meta HTTP-EQUIV="refresh" content="5;URL=index.html">  -->
</body>
</html>

