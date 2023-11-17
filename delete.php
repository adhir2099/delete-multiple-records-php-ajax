<?php

    include('dbcon.php');
    
    if(isset($_POST["checkbox_value"]) && is_array($_POST["checkbox_value"])) {
        $ids = $_POST['checkbox_value'];    
        $placeholders = rtrim(str_repeat('?,', count($ids)), ',');
        $query = "DELETE FROM employees WHERE id IN ($placeholders)";    
        $statement = $connect->prepare($query);
        foreach($ids as $key => $id) {
            $statement->bindValue(($key+1), $id, PDO::PARAM_INT);
        }    
        $statement->execute();
    }

?>