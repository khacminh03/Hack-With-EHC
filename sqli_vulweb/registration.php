<?php
    $conn = mysqli_connect('localhost', 'root', '', 'hackwithehc');

    if (!isset($_POST['username'], $_POST['password'], $_POST['fullname'], $_POST['gmail'], $_POST['telephone'])) {
        exit ('empty field(s)');
    }

    if ($statement = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
        $statement->bind_param('s', $_POST['username']);
        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows > 0) {
            echo 'User has exist please go back';
        } else {
            if ($statement = $con->prepare('INSERT INTO users(fullname, username, password, gmail, telephone) values (?, ?, ?, ?, ?)')) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $statement->bind_param('sssss', $_POST['fullname'], $_POST['username'], $password, $_POST['gmail'], $_POST['telephone']);
                $statement->execute();
                echo 'you have registered successfully';
            } else {
                echo 'something wrong please contact admin for more details';
            }
        }   
        $statement->close();     
    } else {
        echo 'something wrong please contact admin for more details';
    }
    $con->close();
?>