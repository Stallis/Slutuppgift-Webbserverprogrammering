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

  <title>Tack f�r feedback!</title>

  
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

  //L�s den sista posten som lagts till DB
  $id =  $_GET['id'];
$sql = "SELECT * FROM bookings WHERE id=$id";               //H�mtar hem senaste inskickade svar 
$result = $conn->query($sql);                                           //Utf�r en f�rfr�gan om denna sql-kod som sammanst�lls i $result        

if ($result->num_rows > 0)                                              //Villkorlig kontrollav $result d�r den kollar om antalet svar som tankats ned fr�n databasen �r st�rre �n 0. 
{                                                                       //OM SANT g�r programmer in i if-satsen
  // output data of each row
  while($row = $result->fetch_assoc())                                  //while-funktion d�r fetch_assoc anv�nds f�r h�mta en associativ array f�r att lagra hela inneh�llet p� raden som h�mtats fr�n                                                   databasen. Denna info lagras sedani $row, d�r nycklar som $row["name"] anv�nds f�r att h�mta specifik data ur                                                                    array.
  {    
       echo utf8_encode                                                 //st�ller in echo-meddelande efter utf8 
       (                                    
        '<br>' .                                                        //visar med'' att det �r html-taggar som d�r vidare byter rad
        '<br>' .                                                        // -||-
         '<div class="ata_t1">' .                                       //formaterar efter div klassen som anv�nds i ata_t1 (dvs ett annat html-doc som har styling via css)
         '<p>' .                                                        //visar med'' att det �r html-taggar, formaterar paragraf genom html
         'Hej '                                                        //text som skriv med css styling
         ); 
         echo                                                           //skriver ut den h�mtade raden fr�n result, dvs namnet p� senaste angivna anv�ndare
         $row["name"] ; 
        echo utf8_encode                                                //Den andra utf8_encode-funktionen anv�nds f�r att koda om texten som h�mtas fr�n databasen
       (                                                                //G�r att den visas korrekt i webbl�saren
        ' Din registerering inneh�ller:' .                             //text tylad enligt div css
        '<br>' .                                                        //brake, radbryt med html-kod
                                                                     //text tylad enligt div css
        '<br>');                                                         //brake, radbryt med html-kod
        echo( $row["name"] .  
        '<br>' . 
        $row["email"]  .  '<br>' . 
        $row["tel"] .                                                      //skriver ut senaste angivna svars email, ger konfirmation p� angiven email
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
   <p>  <?php  echo utf8_encode( "Edeby, H�l�");?>  </p>
   <p>  <?php  echo utf8_encode( "Tel: 073 987 46 86");?>   </p>             
</div> 
<!-- Denna sida skickar tillbaka anv�ndaren till start efer 5 sek
<meta HTTP-EQUIV="refresh" content="5;URL=index.html">  -->
</body>
</html>

