<?php 
include 'session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/addons/datatables.min.css" rel="stylesheet">


	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			 &nbsp;&nbsp;&nbsp;
		  <a class="navbar-brand" href="employes.php">Gestion Congé</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="basicExampleNav">
		  <ul class="navbar-nav mr-auto">

      <li class="nav-item">
            <a class="nav-link" href="employes.php"><span class="fa fa-eye"></span>Liste Employés</a>
        </li>

      		<li class="nav-item">
		        <a class="nav-link" href="add_emp.php"><span class="fa fa-edit"></span>Ajout Employé</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link" href="conges.php"><span class="fa fa-eye"></span>Liste Demande Congé</a>
		    </li>
		    </ul> 
		   <ul class="navbar-nav ml-auto">
              <li class="nav-item">
		        <a class="nav-link" href="logout.php"><span class="fa fa-sign-out"></span> Logout <b style="color: yellow"><?php echo $_SESSION['username']; ?></b></a>
		      </li>

        </ul>
		  </div>
		</nav>

<?php


?>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
	</body>
	</html>
