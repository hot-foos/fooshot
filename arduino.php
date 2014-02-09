<?php
// Thanks to this guy, 
//http://www.instructables.com/id/Control-an-Arduino-with-PHP/step3/Touching-the-serial-port-in-PHP/
//who should how to read/write to serial ports.
include 'getSerial.php';
$verz="1.0";
$comPort = "/dev/cu.usbmodemfa131"; 
$a = 0;

$fp = fopen($comPort, "r");


?>

<html>
    <head>

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script>
            
            window.setInterval("getSerial",1000);
            function getSerial(){
                console.log("hello");
                $.getJSON('getSerial.php',function(data){
                 console.log(data);   
                });
                
            }
        </script>

    </head>
    <body>
        
        <center><h1>Hot Foos</h1></center>
        <div id="container" style="width:100%">
            <div id="left" style="background-color:yellow; width:50%; height:100%; float:left">
                <center>
                    <h2 style="color:black">Yellow</h2>
                    <div >
                        <h2 style="color:black">
                          
                         
                            <?php

        
//if($score == false){
//    echo "Ohno!";
//}
//if($score =="Yellow"){
//    echo $score;
//}

                            ?>
                        </h2>
                    </div>
                </center>
            </div>
            <div id="right" style="background-color:black; width:50%; height:100%; float:right">
                <center><h2 style="color:yellow">Black</h2></center>
                <?php

                ?>	
            </div>
        </div>
        
        
    </body>
</html>
