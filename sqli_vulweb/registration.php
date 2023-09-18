<?php
    $conn = mysqli_connect('localhost', 'root', '', 'hackwithehc');

    if (!isset($_POST['username'], $_POST['password'], $_POST['telephone'])) {
        exit ('empty field(s)');
    }
    
    if ($statement = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
        $statement->bind_param('s', $_POST['username']);
        $statement->execute();
        $statement->store_result();
    
        if ($statement->num_rows > 0) {
            echo 'User already exists. Please go back.';
        } else {
            if ($statement = $conn->prepare('INSERT INTO users(username, password, telephone) values (?, ?, ?)')) {
                $statement->bind_param('sss', $_POST['username'], $_POST['password'], $_POST['telephone']);
                $statement->execute();
                echo 'You have registered successfully.';
            } else {
                echo 'Something went wrong. Please contact the admin for more details.';
            }
        }   
        $statement->close();     
    } else {
        echo 'Something went wrong. Please contact the admin for more details.';
    }
    $conn->close();
?>
