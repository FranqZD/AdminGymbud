<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once("Connection.php");
    $id = $_POST["uid"];
    $User = $_POST["user"];
    $mail = $_POST["mail"];
    $code = $_POST["code"];
    $query = "UPDATE user SET UID = " . $id . ", User = '" . $User . "', Mail = '" . $mail . "' WHERE Password = '" . $code . "'";
    $result = $link->query($query);

    if ($link->affected_rows > 0) {
        header('Location: https://francoaldrete.com/Admin/UsersList.php');
        exit();
    } else {
        echo "Something went wrong";
    }

        
    $result->close();
    $link->close();
}
