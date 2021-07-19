<?php
include("../function/connect.php");
function emp_delete($connect, $id)
{
    $query = "DELETE FROM demande_conge WHERE id = '$id'";
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
if (emp_delete($connect, $id)) :
    header("location:../conges.php?message=supprimé");
else :
    header("location:../conges.php?message=err");
endif;
