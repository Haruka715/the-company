<?php
session_start();

include "../classes/User.php";

//create and ojbect based on the User class
$user = new User();

//calling the method
$all_users = $user->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--My link-->
    <link http://localhost:8888/HARUKA.S-PHP/dev2-oop/The-company/views/dashboard.php >
    <!--fontawsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href ="../assets/css/style.css">
    <title>Dashboard</title>


</head>
<body>
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 80px;">
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
        <div class="col-6">
            <h2 class="text-center text-uppercase">User List</h2>

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th></th><!--for the photo-->
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th><!--for action buttons edit & delete-->
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    while($user = $all_users->fetch_assoc()){
                    ?>

                    <tr>
                        <td>
                            <?php
                            if($user['photo']){
                            ?>
                              <img src="../assets/images/<?= $user['photo'] ?>" class="d-block mx-auto dashboard-photo">
                            <?php
                            }else{
                            ?>
                              <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                            <?php
                            }
                            ?>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <?php
                            if($_SESSION['id'] == $user['id']){
                            ?>
                               <a href="edit-user.php" class="btn btn-outline-warning" title="Edit"><!--edit-->
                                 <i class="fa-regular fa-pen-to-square"></i>
                               </a>

                               <a href="delete-user.php" class="btn btn-outline-danger" title="Delete">
                                 <i class="fa-solid fa-trash-can"></i>
                               </a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>