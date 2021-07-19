<!DOCTYPE html>
<html>
<head>
	<title>Liste Demande Congé</title>
	<?php 
require_once 'dashboard_user.php';
?>
</head>
<body>
	<div class="container pt-5">
		<div class="table-responsive">
			<table class='table table-bordered table-sm'>
			<thead class='thead-light'>
				<br><br><br>
				<label>Nombre de Jour Congé Restant</label>  
				<input type="number" id="reste_conge" name="reste_conge" placeholder="Entrer Nombre Jour Congé" class="form-control" value="25" disabled required>
			
				<tr><th class='text-center'><b>Date début</b></th>
					<th class='text-center'><b>Date fin</b></th>
					<th class='text-center'><b>Durée</b></th>
					<th class='text-center'><b>Employé</b></th>
					<th class='text-center'><b>Type Congé</b></th>
					<th class='text-center'><b>Status</b></th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
				include("function/connect.php");
				$id_employe=$_SESSION['id_employe'];
				$sql="SELECT * FROM demande_conge where id_employe=$id_employe";
				$res=mysqli_query($connect,$sql);
				while ($row=mysqli_fetch_array($res)) {
					$id_type_conge=$row['id_type_conge'];
					
					$sql2="SELECT * FROM employe where id=$id_employe";
					$res2=mysqli_query($connect,$sql2);	
					$row2=mysqli_fetch_array($res2);
					$nom=$row2['nom'];
					$prenom=$row2['prenom'];
					$reste_conge=$row2['reste_conge'];

					$sql3="SELECT * FROM type_conge where id=$id_type_conge";
					$res3=mysqli_query($connect,$sql3);	
					$row3=mysqli_fetch_array($res3);
					$conge=utf8_encode($row3['type']);
				    echo '<tr align="center">
				    		
				    		<td>'.$row[1].'</td>
				    		<td>'.$row[2].'</td>
				    		<td>'.$row[3]." Jours".'</td>
				    		<td>'.$nom.' '.$prenom.'</td>
							<td>'.$conge.'</td>
							<td>'.$row[6].'</td>
				    	  </tr>';
					/********
					$sql4="SELECT SUM(duree) as somme FROM `demande_conge` WHERE `id_employe`=$id_employe";
					$res4=mysqli_query($connect,$sql4);
					$row4=mysqli_fetch_array($res4);
					$total_duree=$row4['somme'];
					$reste_conge_tot=0;
					if($row['demande']=='Accepté'){
						$reste_conge_tot=$reste_conge-$total_duree;
						return;
					}

					$UpdateSql="UPDATE employe set reste_conge=$reste_conge_tot where `id_employe`=$id_employe";
					$res5=mysqli_query($connect, $UpdateSql);
					if ($res5) {
						echo 'Succés';
						
					}else {
						echo 'Erreur';
					}
					echo $reste_conge_tot;
					*************/
					
				}
				?>
			</tbody>

			</table>
		</div>
	</div>
</body>
</html>