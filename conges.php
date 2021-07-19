<!DOCTYPE html>
<html>
<head>
	<title>Liste Demande Congé</title>
	<?php 
require_once 'dashboard.php';
?>
</head>
<body>
	<div class="container pt-5">
		<div class="table-responsive">
			<table class='table table-bordered table-sm'>
			<thead class='thead-light'>
				<br><br><br><br>
				<tr><th class='text-center'><b>Date début</b></th>
					<th class='text-center'><b>Date fin</b></th>
					<th class='text-center'><b>Durée</b></th>
					<th class='text-center'><b>Employé</b></th>
					<th class='text-center'><b>Type Congé</b></th>
					<th class='text-center'><b>Status</b></th>
					<th class='text-center'><b>Action</b></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include("function/connect.php");
				$sql="SELECT * FROM demande_conge order by id_employe";
				$res=mysqli_query($connect,$sql);
				while ($row=mysqli_fetch_array($res)) {
					$id_employe=$row['id_employe'];
					$id_type_conge=$row['id_type_conge'];
					
					$sql2="SELECT * FROM employe where id=$id_employe";
					$res2=mysqli_query($connect,$sql2);	
					$row2=mysqli_fetch_array($res2);
					$nom=$row2['nom'];
					$prenom=$row2['prenom'];

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
							<td>
							<a href="function/deletedmc.php?id='.$row['id'].' " title="supprimer"><img src="dist/img/ikondelet.svg" style="width: 20px;"></a>
                            <a href="function/refuse.php?id='.$row['id'].' " title="refuse"><img src="dist/img/refuse.svg" style="width: 20px;"></a>
                            <a href="function/check.php?id='.$row['id'].' " title="accepter"><img src="dist/img/check.svg" style="width: 20px;"></a>
							</td>

				    	  </tr>';
				}
				?>
			</tbody>

			</table>
		</div>
	</div>
</body>
</html>