<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit'])) {	
	$refProduit = mysqli_real_escape_string($mysqli, $_POST['ref_produit']);
	$libelle = mysqli_real_escape_string($mysqli, $_POST['libelle']);
	$prix_unitaire = mysqli_real_escape_string($mysqli, $_POST['prix_unitaire']);
	$quantite = mysqli_real_escape_string($mysqli, $_POST['quantite']);
	// checking empty fields
	if(empty($refProduit) || empty($libelle) || empty($prix_unitaire) || empty($quantite)) {
		if(empty($refProduit)) {
			echo "<font color='red'>le nom est requis.</font><br/>";
		}

		if(empty($libelle)) {
			echo "<font color='red'>le libelle est requis.</font><br/>";
		}

		if(empty($prix_unitaire)) {
			echo "<font color='red'>le prix unitaire est requis.</font><br/>";
		}

		if(empty($quantite)) {
			echo "<font color='red'>la quantité est requise.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO produit(ref_produit,libelle,prix_unitaire,quantite) VALUES('$refProduit','$libelle','$prix_unitaire','$quantite')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='../index.php'>View Result</a>";
	}
}
?>
</body>
</html>
