<html>
<head>
<title>igra jezikov</title>
<meta charset="utf-8" />
<link rel="stylesheet" type='text/css' href='hitrost_opazovanja_stil.css'>
</head>

<body bgcolor="#2ECCFA">

<?php 

$servername = "localhost";
$mysql_database = "id1370995_jeziki";
$username = "id1370995_lukal";
$password = "gorgonzola13";

// Create connection
$conn = new mysqli($servername, $username, $password, $mysql_database);
//mysql_select_db($username,$conn);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$sql  = 'SELECT slo,nem FROM slonem';
$result = $conn->query($sql);
$iks=0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         if($iks<10){
         echo "<br> id: ". $row["slo"]. " - Name: ". $row["nem"]. " "  . "<br>";
         $kranjska[$iks]=$row["slo"]; 
         $bavaria[$iks]=$row["nem"];
         }
         $iks=$iks+1;
     }
} else {
     echo "0 results";
}

$conn->close();

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


<a href='glavna_stran.html'>nazaj na glavno stran<a>

<button id="gumb1">zacni</button>
<button id="gumb_navodila">navodila</button>

<div id="navodila"> Na levi strani so slovenske besede na desni pa nemske ti jih moras povezati med sabo jih med sabo</div>
<br>

<table align='left' border='1' id='slovenija'>
<tr>
<td><font size='15px' id='s1'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s2'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s3'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s4'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s5'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s6'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s7'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s8'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s9'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='s10'> u</font> </td>
</tr>
</table>



<table align='right' border='1' id='deutschland'>
<tr>
<td><font size='15px' id='n1'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n2'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n3'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n4'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n5'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n6'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n7'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n8'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n9'> u</font> </td>
</tr>
<tr>
<td><font size='15px' id='n10'> u</font> </td>
</tr>
</table>

</table>

<table>


</br>

<h1 id='napake'>napake</h1>
<script src='skupne_funkc.js'></script>
<script>
slo_indeks=[];
nem_indeks=[];
slo_besede="";
nem_besede="";

for(var i=1;i<11;++i){
	slo_indeks.push("s"+i);
	nem_indeks.push("n"+i);
	slo_besede+="#s"+i
	if(i<10){
		slo_besede+=", "
	}
	nem_besede+="#n"+i
	if(i<10){
		nem_besede+=", "
	}	
	
}


slo=<?php echo json_encode($kranjska ); ?>;
nem=<?php echo json_encode($bavaria ); ?>;

prvi_klik=false;
prvi_index=-1;

$(document).ready(function(){
	$("#slovenija").hide();
	$("#deutschland").hide();
	$("#gumb1").click(function(){
		$("#slovenija").slideDown("slow");
		$("#deutschland").slideDown("slow");
		//var sez=zaporedje(3);
		var a=1;
		var sez1=zaporedje(10);
		
		var sez2=zaporedje(10);
		while(a<11){
			$("#s"+a).text(slo[sez1[a-1]-1]);			
			$("#n"+a).text(nem[sez2[a-1]-1]);

			a+=1;
	}

		

	
		
	})
})

$(slo_besede+", "+nem_besede).mouseover(function(){
	$(this).addClass('podcrta');
	
})

$(slo_besede+", "+nem_besede).mouseout(function(){
	$(this).removeClass('podcrta');
	
})



var slo_indeks=-1;
var slo_indeks2="";
var nem_indeks=-1;
var nem_indeks2="";

var napake=0;

$(slo_besede).click(function(){
	$(slo_besede).removeClass();
	$(this).addClass('izbran');
	napake-=1;
	var izbrana=$(this).text();
	slo_indeks=slo.indexOf(izbrana);
	slo_indeks2=$(this).attr('id');
	$("#test1").text(slo_indeks+slo_indeks2);
	if(izbrana!="abc"){
		//$("#"+slo_indeks2).text("lek");
		if(slo_indeks==nem_indeks){
			$("#"+slo_indeks2).text("abc");
			$("#"+nem_indeks2).text("abc");
		}
		else{
			napake+=1;
			$('#napake').text("trenutno ste neredili"+napake+"napak");
		}
	}
	
})

$(nem_besede).click(function(){
	$(nem_besede).removeClass();
	$(this).addClass('izbran');
	
	var izbrana=$(this).text();
	nem_indeks=nem.indexOf(izbrana);
	nem_indeks2=$(this).attr('id');
	$("#test2").text(nem_indeks+nem_indeks2);
	napake-=1;
	if(izbrana!="abc"){
		if(slo_indeks==nem_indeks){
			$("#"+slo_indeks2).text("abc");
			$("#"+nem_indeks2).text("abc");
		}
		else{
			napake+=1;
			$('#napake').text("trenutno ste neredili"+napake+"napak");			
		
	}

	}
	
	
})


//CreateTable(nem,'nem','de')
</script>
</body>


</html>