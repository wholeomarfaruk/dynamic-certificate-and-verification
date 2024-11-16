<?php

//Page Linkup
include "connection.php";

// ==========================================
// Delete korar jonno Custome Function.
// ==========================================

// table name
// primary key
// delete id
// url 
// database

function delete($tbl, $key, $d_id, $url, $db)
{

    $query3 = "DELETE FROM $tbl WHERE $key = '$d_id'";
    $result3 = mysqli_query($db, $query3);

    if ($result3) {
        header('Location:' . $url);
    } else {
        echo 'Opps! Data not deleted.';
    }

}


?>