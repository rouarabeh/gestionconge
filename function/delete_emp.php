<?php
include("connect.php");
function emp_delete($connect, $id){
        $query = "DELETE FROM employe WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        if ($result != null) :
            return $result;
        else :
            return false;
        endif;
}

$id = $_GET['id'];
if (emp_delete($connect, $id)):
       header("location:../employes.php");
else:
    echo "<script>alert('Erreur');</script>";
endif;    