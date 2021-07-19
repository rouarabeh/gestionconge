<?php 
include("function/connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout Employé</title>

<?php 
require_once 'dashboard.php';
?>
<style type="text/css">
	
.box{
    box-shadow: 0px 0px 0px 0px ;
    margin-top: 7px;
    height: 760px;
	
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
			<form method="POST" action="add_emp.php" autocomplete="on" >
				
			<div class="form-group">
			<input type="text" id="nom" name="nom" placeholder="Entrer le Nom" class="form-control" required>
			</div>
            <div class="form-group">
			<input type="text" id="prenom" name="prenom" placeholder="Entrer le Prénom" class="form-control" required>
			</div>
            <div class="form-group">
			<input type="number" id="cin" name="cin" placeholder="Entrer N° CIN" class="form-control" required>
			</div>
            <div class="form-group">
			<input type="number" id="tel" name="tel" placeholder="Entrer N° Téléphone" class="form-control" required>
			</div>
            <div class="form-group">
			<input type="email" id="email" name="email" placeholder="Entrer l'E-mail" class="form-control" required>
			</div>
            <div class="form-group">
			<input type="text" id="matricule" name="matricule" placeholder="Entrer Matricule" class="form-control" required>
			</div>
            <div class="form-group">
            <label>Nombre de Jour Congé par Année</label>  
			<input type="number" id="reste_conge" name="reste_conge" placeholder="Entrer Nombre Jour Congé" class="form-control" value="25" disabled required>
			</div>
            <div class="form-group">
            <label>Date de Naissance*</label>  
			<input type="date" id="date_naissance" name="date_naissance"  class="form-control" required>
			</div>
            <div class="form-group">
            <label>Date Embauche*</label>  
			<input type="date" id="date_embauche" name="date_embauche"  class="form-control" required>
			</div>
			<div class="form-group">
			<label>Sérvices*</label>
			<select id="service" name="service" class="form-control" onchange="OnSelectionChange()" required>
                        <?php
                        $query_service = "SELECT * FROM Service";
                        $result = mysqli_query($connect, $query_service);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <option value="<?= $row['id']; ?>"><?= utf8_encode($row["Service"]); ?></option>
                        <?php
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
			</select>
			</div>

			<button class="btn btn-info" name="submit" type="submit">Ajouter</button>
			</form>


		</div>
		</div>
	</div>
		
</body>

</html>

<?php
include("function/connect.php");

if (isset($_POST['submit'])) {

	$nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $matricule = $_POST['matricule'];
    $date_naissance = $_POST['date_naissance'];
	$date_embauche = $_POST['date_embauche'];
    $service = $_POST['service'];
    

    $CreateSql = "INSERT INTO employe (nom,prenom,CIN,Tel,email,date_embauche,id_service,matricule,date_de_naissance,reste_conge) VALUES 
    ('$nom','$prenom','$cin','$tel','$email','$date_embauche','$service','$matricule','$date_naissance',25)";
    $res=mysqli_query($connect, $CreateSql);
    if ($res) {
    	 echo "<script>alert('Succés');</script>";
    }else {
    	echo "<script>alert('Erreur');</script>";
    }

}
mysqli_close($connect);
 
?>