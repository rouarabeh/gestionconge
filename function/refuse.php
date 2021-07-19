<?php
include("../function/connect.php");
function emp_refuse($connect, $id)
{
    $query = "UPDATE demande_conge SET demande = 'Refusé' WHERE id = '$id' ";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
function redirect($page)
{
    header('location:' . $page);
}
$id = $_GET['id'];
if (emp_refuse($connect, $id)) :
    header("location:../conges.php?message=refusé");
else :
    header("location:../conges.php?message=err");
endif;
