<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Slo: <input type="text" name="slova">
  Nem: <input type="text" name="nema">
  Tema: <input type="text" name="tem">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $si = $_POST['slova']; 
    $de = $_POST['nema']; 
    $te = $_POST['tem']; 
    if ((empty($si)||empty($de))||empty($te)) {
        echo "nic ni napisano";
    } 
	else {
        echo $si;
        echo $de;
        echo $te;
    
		$servername = "localhost";
		$mysql_database = "id1370995_jeziki";
		$username = "id1370995_lukal";
		$password = "geslo";
	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO slonem (slo, nem, tema) VALUES ($si, $de, $te)";
													

		if ($conn->query($sql) === TRUE) {
			echo "dodal si novo besedo";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
	
	
	
	
	
		$conn->close();


	}







	
	
	
}
?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Vpisi Temo: <input type="text" name="teme">
  <input type="submit">
</form>

<?php
$servername = "localhost";
$mysql_database = "id1370995_jeziki";
$username = "id1370995_lukal";
$password = "geslo";
$v=$_POST['teme'];
// Create connection
if(empty($v)){
echo "te teme ni";
}
else{
	$conn = new mysqli($servername, $username, $password, $mysql_database);
	//mysql_select_db($username,$conn);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	function vse($conn){
		$sql = "SELECT slo, nem FROM slonem ORDER BY tema";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<br> slovensko: ". $row["slo"]. " nemsko ". $row["nem"]. " ". "<br>";
		}
		} 
		else {
			echo "0 results";
		}
	}

	function vojna($conn,$v){
		$v=$v.'';
		$sql = "SELECT slo, nem FROM slonem WHERE tema=\"$v\"";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br> slovensko: ". $row["slo"]. " nemsko ". $row["nem"]. " ". "<br>";
			}
		} 
		else {
			echo "te teme ni";
		}
	}



	vojna($conn,$v);


	$conn->close();

}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit">
</form>
<?php
$servername = "localhost";
$mysql_database = "id1370995_jeziki";
$username = "id1370995_lukal";
$password = "geslo";

// Create connection
$conn = new mysqli($servername, $username, $password, $mysql_database);
//mysql_select_db($username,$conn);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


function vse_teme($conn){
$sql = "SELECT DISTINCT tema FROM slonem ORDER BY tema";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     // output data of each row
     echo "vse teme";
     while($row = $result->fetch_assoc()) {
         echo "<br> ". $row["tema"]. " <br>";
     }
} else {
     echo "0 results";
}
}






vse_teme($conn);


$conn->close();


?>

</body>

</html>