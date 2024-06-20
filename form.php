
<?php 

require_once ("Modals/Members.php");
$member= new Members();

if(isset($_POST['submitData'])){
    $name1=$_POST['name'];
    $email1=$_POST['email'];
    $password1=$_POST['password'];
    
    //$member= new Members();
    $member1-> createMembers($name1, $email1, $password1);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Registration Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  </head>
  <body>
    <h1 class="text-center">Registration Form</h1>
    <div class="container">
        <form action="" method="post" name="form1">
            <input type="hidden" name="h_action">
            <input type="hidden" name="h_id">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                </div>
            </div>
            
            <button type="submit" name="submitData" class="btn btn-primary">Submit</button>

             <table class="table my-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
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
                            <a href="update.php?id=<?=$user['id']?>" class="btn btn-secondary">Edit</a>
                            <span class="btn btn-danger" onclick="deleteData(<?=$user['id']?>)">Delete</span>
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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>