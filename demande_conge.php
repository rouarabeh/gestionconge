<?php 
include("function/connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Demande Congé</title>

<?php 
require_once 'dashboard_user.php';
?>
<style type="text/css">
	
.box{
    box-shadow: 0px 0px 0px 0px ;
    margin-top: 7px;
    height: 600px;
	
 }

.box:hover{
    box-shadow: 2px 5px 20px 0px ;
}


</style>

</head>
<body>
	<div class="container mt-5">

		<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 box">
		
            <br>
			<form method="POST" action="demande_conge.php" autocomplete="on" >
            <div class="form-group">
            <label>Date Début*</label>  
			<input type="date" id="date_naissance" name="date_debut"  class="form-control" required>
			</div>
            <div class="form-group">
            <label>Date Fin*</label>  
			<input type="date" id="date_embauche" name="date_fin"  class="form-control" required>
			</div>
            <div class="form-group">
			<input type="number" id="dure" name="dure" placeholder="Entrer Durée Congé" class="form-control" required>
			</div>
			<div class="form-group">
			<label>Type Congé*</label>
			<select id="type_conge" name="type_conge" class="form-control" onchange="OnSelectionChange()" required>
            <?php
                $query_type = "SELECT * FROM type_conge";
                $rslt = mysqli_query($connect, $query_type);
                if (mysqli_num_rows($rslt) > 0) {
                while ($row = mysqli_fetch_assoc($rslt)) {
                ?>
                    <option value="<?= $row['id']; ?>"><?= utf8_encode($row["type"]); ?></option>
                <?php
                }
                } else {
                echo "0 result";
                }
                ?>
			</select>
			<button class="btn btn-info" name="submit" type="submit">Envoyer Demande</button>
			</form>


		</div>
		</div>
	</div>
		
</body>

</html>

<?php
include("function/connect.php");

if (isset($_POST['submit'])) {

	$id_employe = $_SESSION['id_employe'];
    $date_debut = $_POST['date_debut'];
	$date_fin = $_POST['date_fin'];
    $dure=$_POST['dure'];
    $type_conge = $_POST['type_conge'];

    
    $InsertSql = "INSERT INTO demande_conge (date_debut, date_fin, duree, id_employe, id_type_conge, demande) 
    VALUES ('$date_debut','$date_fin','$dure','$id_employe','$type_conge','Encours')";
    $result=mysqli_query($connect, $InsertSql);
    if ($result) {
    	 echo "<script>alert('Succés');</script>";
    }else {
    	echo "<script>alert('Erreur');</script>";
    }
    
}
mysqli_close($connect);
 
?>