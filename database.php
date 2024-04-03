<?php
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $conn = new mysqli('localhost','root','','database');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt= $conn->prepare("insert into registration(name, email, password)values(?,?,?)");
        $stmt->bind_param("sss",$name,$email,$password);
        $stmt->execute();
        echo "Sucessful!";
        $stmt->close();
        $conn->close();
    }
?>