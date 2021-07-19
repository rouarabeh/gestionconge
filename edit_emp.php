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
    height: 680px;
	
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
			<form method="POST" action="edit_emp.php?id=<?php  echo $_GET['id']?>" autocomplete="off" onsubmit="return check()">
            <?php  
                $sql = "SELECT * FROM employe Where id='".$_GET['id']."'";
                $query = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    $nom = $row['nom'];
                    $prenom = $row['prenom'];
                    $cin = $row['CIN'];
                    $tel = $row['Tel'];
                    $email = $row['email'];
                    $matricule = $row['matricule'];
                    $date_naissance = $row['date_de_naissance'];
                    $date_embauche = $row['date_embauche'];
                    $service = $row['id_service'];
            ?>	
			<div class="form-group">
			<input type="text" id="nom" name="nom" placeholder="Entrer le Nom" class="form-control" value="<?php  echo $nom ?>" required>
			</div>
            <div class="form-group">
			<input type="text" id="prenom" name="prenom" placeholder="Entrer le Prénom" class="form-control" value="<?php  echo $prenom ?>" required>
			</div>
            <div class="form-group">
			<input type="number" id="cin" name="cin" placeholder="Entrer N° CIN" class="form-control" value="<?php  echo $cin ?>"required>
			</div>
            <div class="form-group">
			<input type="number" id="tel" name="tel" placeholder="Entrer N° Téléphone" class="form-control" value="<?php  echo $tel ?>" required>
			</div>
            <div class="form-group">
			<input type="email" id="email" name="email" placeholder="Entrer l'E-mail" class="form-control" value="<?php  echo $email ?>" required>
			</div>
            <div class="form-group">
			<input type="text" id="matricule" name="matricule" placeholder="Entrer Matricule" class="form-control" value="<?php  echo $matricule ?>" required>
			</div>
            <div class="form-group">
            <label>Date de Naissance*</label>  
			<input type="date" id="date_naissance" name="date_naissance"  class="form-control" value="<?php  echo $date_naissance ?>" required>
			</div>
            <div class="form-group">
            <label>Date Embauche*</label>  
			<input type="date" id="date_embauche" name="date_embauche"  class="form-control" value="<?php  echo $date_embauche ?>" required>
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
                                <option value="<?= $service; ?>" <?php if($row['id']==$service){?> selected <?php } ?>><?= utf8_encode($row["Service"]); ?></option>
                                
                        <?php
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
			</select>
			</div>
			<button class="btn btn-info" name="submit" type="submit">Modifier</button>
            <?php } ?>
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

    $UpdateSql = "UPDATE employe SET nom = '$nom', prenom='$prenom',CIN = '$cin', Tel = '$tel', email = '$email', date_embauche = '$date_embauche',id_service = '$service', matricule = '$matricule', date_de_naissance = '$date_naissance' WHERE id='".$_GET['id']."'";
    $res=mysqli_query($connect, $UpdateSql);
    if ($res) {
    	 echo "<script>alert('Succés');</script>";
         header("Location: employes.php");
    }else {
    	echo "<script>alert('Erreur');</script>";
    }

}
mysqli_close($connect);
 
?>