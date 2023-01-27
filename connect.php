<?php
    $matric = $_POST['matric'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //Database Connection
    $conn = new mysqli('localhost','root','','attendance');
    if($conn -> connect_error){
        die('Connection failed : '.$conn -> connect_error);
    }else{
        $stmt = $conn->prepare("insert into class2(MatricNo,firstName,lastName,DOB,email,phone)
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss",$matric,$firstName,$lastName ,$dob,$email,$phone);
        $stmt->execute();
        echo "Attendance sumbitted";
        $stmt->close();
        $conn->close();
    }

?>