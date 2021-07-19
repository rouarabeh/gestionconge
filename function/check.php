<?php
include("../function/connect.php");
function redirect($page)
{
    header('location:' . $page);
}
$message = '';
function emp_accepter($connect, $id)
{
    $query = "UPDATE demande_conge SET demande = 'Accepté' WHERE id = '$id' ";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
$id = $_GET['id'];
if (emp_accepter($connect, $id)) :
    header("location:../conges.php?message=accepter");
    else :
        header("location:../conges.php?message=err");

endif;  