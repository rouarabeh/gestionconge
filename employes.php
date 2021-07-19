<!DOCTYPE html>
<html>
<head>
	<title>Liste Employés</title>
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
				<tr><th class='text-center'><b>Nom</b></th>
					<th class='text-center'><b>Prénom</b></th>
					<th class='text-center'><b>CIN</b></th>
					<th class='text-center'><b>Téléphone</b></th>
					<th class='text-center'><b>E-mail</b></th>
					<th class='text-center'><b>Date Embauche</b></th>
					<th class='text-center'><b>Sérvice</b></th>
					<th class='text-center'><b>Matricule</b></th>
					<th class='text-center'><b>Date De Naissance</b></th>
					<th class='text-center'><b>Reste Congé</b></th>
					<th class='text-center'><b>Action</b></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include("./function/connect.php");
				$sql="SELECT * FROM employe";
				$res=mysqli_query($connect,$sql);
				while ($row=mysqli_fetch_array($res)) {
				    echo '<tr align="center">
				    		
				    		<td>'.$row[1].'</td>
				    		<td>'.$row[2].'</td>
				    		<td>'.$row[3].'</td>
				    		<td>'.$row[4].'</td>
							<td>'.$row[5].'</td>
							<td>'.$row[6].'</td>
							<td>'.$row[7].'</td>
							<td>'.$row[8].'</td>
							<td>'.$row[9].'</td>
							<td>'.$row[10].'</td>
							<td>
							<a href="function/delete_emp.php?id= '.$row['id'].' " title="delete"><img src="dist/img/ikondelet.svg" style="width: 20px;"></a>
                            <a href="edit_emp.php?id='.$row['id'].'" title="update"><img src="dist/img/iconupdate.svg" style="width: 20px;"></a>
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