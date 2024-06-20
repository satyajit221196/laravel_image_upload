<?php 

require_once "Modals/Users.php";

$user=new Users();


if(isset($_POST['submitData'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

   // $user=new Users();
    // echo '<pre>';
    // print_r($user);
    // echo '<pre>';
    $user->createUsers($name, $email, $password);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpCRUD</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Student Registration Form</h2>
            </div>
            <form name="form1" action="" method="post">
                <input type="hidden" name="h_action">
                <input type="text" name="name" placeholder="Name"><br><br>
                <input type="email" name="email" placeholder="Email"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br>
                <input type="submit" value="submit" name="submitData">

                <table>
                    <thead>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php 
                        $counter=1;
                        $users=$user->getAllUsers();
                        foreach($users as $user){
                        ?>
                        <tr>
                            <td><?=$counter?></td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['password']?></td>
                            <td>
                                <a href="update.php?id=<?=$user['id']?>"><span>Edit</span></a>
                                <span>Delete</span>
                            </td>
                        </tr>
                        <?php 
                        $counter++;
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>