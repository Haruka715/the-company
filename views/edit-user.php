<?php
session_start();

include "../classes/User.php";

//create an object based on the user class
$user_obj = new User();

//calling the method and creating an array
$user = $user_obj->getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
     <!-- BOOSTRAP CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--fontawsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--My Page-->
    <link http://localhost:8888/HARUKA.S-PHP/dev2-oop/The-company/views/edit-user.php>
</head>    
<body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 800px;">
      <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h3>The Company</h3>
        </a>
        <div class="navbar-nav">
            <span class="navbar-text"><?= $_SESSION['full_name']?></span>
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
              <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
            </form>
        </div>
      </div>
    </nav>
   
    <main class="row justify-content-center">
        <div class="col-4">
            <h2 class="text-center text-uppercase mb-4">Edit User</h2>

            <form action="../actions/edit-user.php"method="post" enctype="multipart/form-data">
                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                    <?php
                            if($user['photo']){
                            ?>
                              <img src="../assets/images/<?= $user['photo'] ?>" class="d-block mx-auto edit-photo">
                            <?php
                            }else{
                            ?>
                              <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                            <?php
                            }
                            ?>

                            <input type="file" name="photo" accept="image/*" class="form-control mt-2">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">First Name</label>
                    <input type="text" name="first_name"id="first_name" class="form-control"value="<?= $user['first_name'] ?>" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" name="last_name"id="last_name" class="form-control" value="<?= $user['last_name'] ?>"required>
                </div>
               
                <div class="mb-4">
                  <label for="" class="form-label fw-bold">Username</label>
                  <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>" fw-bold maxlength=15 required>
                </div>
    
                <div class="text-end">
                  <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                  <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>