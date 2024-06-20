<?php
    require_once 'modals/Users.php';

    $user = new Users();

    $userId= $_GET['id'];
    $userData = $user->getUserById($userId);

    if (isset($_POST["form_submit"])) {
        //GET FORM DATA
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //call the updateUser method to insert the user into the databse
        $data = $user->updateUser( $userId ,$username, $email, $password);

        //check if user was successfully created
        if ($data) {    
          echo "<script>alert('User Updated successfully!')</script>";
        header("Location: index.php ");
        // exit;
        }
        else {
            echo "<script>alert('Error update user')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="form1" action="" method="post">
                <input type="text" name="name" value="<?=$userData['name']?>"><br><br>
                <input type="email" name="email" value="<?=$userData['email']?>"><br><br>
                <input type="password" name="password" value="<?=$userData['password']?>"><br><br>
                <button name="form_submit" >Update</button>
            </form>
</body>
</html>