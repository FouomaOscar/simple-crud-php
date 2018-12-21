<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit'])) {	
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
	$ville = mysqli_real_escape_string($mysqli, $_POST['ville']);
		
	// checking empty fields
	if(empty($nom) || empty($ville)) {
				
		if(empty($nom)) {
			echo "<font color='red'>le nom est requis.</font><br/>";
		}
		
		if(empty($ville)) {
			echo "<font color='red'>la ville est requise.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO client(nom,ville) VALUES('$nom','$ville')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='../index.php'>View Result</a>";
	}
}
?>
</body>
</html>
