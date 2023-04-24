<?php
/*delete click garda data table bata file ko id leara janxa then id leara gayesi tyo file ko name find garxam ani sabai file haru 
uploads mah hunxa ani tyo upload ma vako  file  lai delete gardini plus database ma vako record lai pani delete gardinxa*/
    require('../../connection/config.php');
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $select_query = "SELECT * FROM filemanager WHERE id = $id";
        $select_result = mysqli_query($conn,$select_query);
        $select_row = $select_result->fetch_assoc();
        $filelink = $select_row['filelink'];
        $finalfilelink = '../../uploads/'.$filelink;
        unlink($finalfilelink);

        $query = "DELETE FROM filemanager WHERE id=$id";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            echo header('Location: ../managefile.php?msg=dsuccess');
        }
        else
        {
            echo header('Location: ../managefile.php?msg=derror');
        }
    }
?>