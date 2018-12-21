<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM client ORDER BY id DESC"); // mysql_query is deprecated
$clients = mysqli_query($mysqli, "SELECT * FROM client ORDER BY idclient DESC"); // using mysqli_query instead
?>

<html>
	<head>	
		<title>Acceuil Ecommerce</title>
	</head>
	<body>
		<a href="clients/add.html">Nouveau client</a><br/><br/>
		
		<table width='80%' border=0>
			
			<tr bgcolor='#CCCCCC'>
				<td>Id</td>
				<td>Nom</td>
				<td>Ville</td>
				<td>Actions</td>
			</tr>
			<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while($res = mysqli_fetch_array($clients)) {
			echo "<tr>";
			echo "<td>".$res['idclient']."</td>";
			echo "<td>".$res['nom']."</td>";
			echo "<td>".$res['ville']."</td>";
			echo "<td><a href=\"clients/edit.php?id=$res[idclient]\">Editer</a> | <a href=\"clients/delete.php?id=$res[idclient]\" onClick=\"return confirm('Confirmer l'operation')\">Supprimer</a></td>";
		}
		?>
	</table>
	<br>
	<a href="produits/add.html">Nouveau Produit</a><br/><br/>
	
	<table width='80%' border=0>
		
		<tr bgcolor='#CCCCCC'>
			<td>Reference</td>
			<td>Libellé</td>
			<td>Prix unitaire</td>
			<td>Quantité</td>
			<td>Actions</td>
		</tr>
		<?php
		include_once("config.php");
		$produits = mysqli_query($mysqli, "SELECT * FROM produit ORDER BY idproduit DESC"); // using mysqli_query instead
		if (!$produits) {
			printf("Error: %s\n", mysqli_error($mysqli));
			exit();
		}
		while($res = mysqli_fetch_array($produits)) {
			echo "<tr>";
			echo "<td>".$res['ref_produit']."</td>";
			echo "<td>".$res['libelle']."</td>";
			echo "<td>".$res['prix_unitaire']."</td>";
			echo "<td>".$res['quantite']."</td>";
			echo "<td><a href=\"produit/editProduit.php?id=$res[idproduit]\">Editer</a> | <a href=\"produit/deleteProduit.php?id=$res[idproduit]\" onClick=\"return confirm('Confirmer l'operation')\">Supprimer</a></td>";
		}
	?>
	</table>
</body>
</html>
