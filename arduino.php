<?php
// Thanks to this guy, 
//http://www.instructables.com/id/Control-an-Arduino-with-PHP/step3/Touching-the-serial-port-in-PHP/
//who should how to read/write to serial ports.

$verz="1.0";
$comPort = "/dev/ttyUSB0"; /*change to correct com port */
$score = 0;
if (isset($_POST["rcmd"])) {
$rcmd = $_POST["rcmd"];
switch ($rcmd) {
     case Stop:
        $fp =fopen($comPort, "w");
  fwrite($fp, 1); /* this is the number that it will write */
  fclose($fp);
  break;
     case Slow:
        $fp =fopen($comPort, "w");
  fwrite($fp, 2); /* this is the number that it will write */
  fclose($fp);
  break;
  case Medium:
        $fp =fopen($comPort, "w");
  fwrite($fp, 3); /* this is the number that it will write */
  fclose($fp);
  break;
  case Fast:
        $fp =fopen($comPort, "w");
  fwrite($fp, 4); /* this is the number that it will write */
  fclose($fp);
  break;
case Right:
        $fp =fopen($comPort, "w");
  fwrite($fp, 5); /* this is the number that it will write */
  fclose($fp);
  break;
case Left:
        $fp =fopen($comPort, "w");
  fwrite($fp, 6); /* this is the number that it will write */
  fclose($fp);
  break;
default:
  die('Crap, something went wrong. The page just puked.');
}

}
?>
<html>
<body>

<center><h1>Hot Fuss</h1></center>
<div id="container" style="width:100%">
	<div id="left" style="background-color:yellow; width:50%; height:100%; float:left">
		<center>
			<h2 style="color:black">Yellow</h2>
				<h2 style="color:black">
					<?php
							$fp = fopen($comPort, "r");
							$score = fread($comPort);
							echo $score;
					?>
				</h2>
		</center>
	</div>
	<div id="right" style="background-color:black; width:50%; height:100%; float:right">
			<center><h2 style="color:yellow">Black</h2></center>
			<?php
					$fp = fopen($comPort, "r");
					$score = fread($comPort);
					echo $score;
			?>	
	</div>
</div>


</body>
</html>
