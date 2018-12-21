<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['idclient']);
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
	$ville = mysqli_real_escape_string($mysqli, $_POST['ville']);	
	
	// checking empty fields
	if(empty($nom) || empty($ville)) {
			
		if(empty($nom)) {
			echo "<font color='red'>le nom est requis.</font><br/>";
		}
		
		if(empty($ville)) {
			echo "<font color='red'>La ville est requise.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE client SET nom='$nom',ville='$ville' WHERE idclient=$id");
		
		//redirectig to the display pville. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM client WHERE idclient=$id");

while($res = mysqli_fetch_array($result))
{
	$nom = $res['nom'];
	$ville = $res['ville'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="../index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
			</tr>
			<tr> 
				<td>Ville</td>
				<td><input type="text" name="ville" value="<?php echo $ville;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idclient" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
