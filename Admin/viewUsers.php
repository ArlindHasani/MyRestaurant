<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if($_SESSION['accessLevel'] != 'admin'){
        header("Location: ../Pages/index.php");
    }

    require_once('../CRUD/userCRUD.php');
    $userCRUD =  new userCRUD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRestaurant | VIEW USERS</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include '../Objektet/header.php'; ?>

    <section id="viewUser">
        <div class="addUserContainer">
            <a class="" href="../Admin/addUser.php">
                <button type="submit" class="button_type3 addUserBtn">Add User</button>
            </a>
        </div>
        <div class="viewUserContainer">
            <?php $users = $userCRUD->readAllUsers(); ?>
            <h5 class="montserrat_paragraph">Current Users: </h5>
            <div class="viewUsersContent">   
                <table>
                    <thead>
                        <tr class="montserrat_small_paragraph_2 tableheader">
                        <th>UserID</th>
                        <th>Name and Surename</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Access Level</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <?php foreach($users as $user){?>
                    <tbody>
                        <tr class="montserrat_small_paragraph tablerow">
                            <td data-label="UserID"><?php echo $user['userID']?></td>
                            <td data-label="Name and Surename"><?php echo $user['userName']?></td>
                            <td data-label="Password"><?php echo $user['userPassword']?></td>
                            <td data-label="Email"><?php echo $user['userEmail']?></td>
                            <td data-label="Phone"><?php echo $user['userPhone']?></td>
                            <td data-label="Access Level"><?php echo $user['accessLevel']?></td>
                            <td data-label="Actions" class="viewUsersActions">
                                <a href="../AdminFunctions/deleteUser.php?userID=<?php echo $user['userID']?>">
                                    <button type="submit" class="button_type4 cancelReservation">Delete</button>
                                </a>
                                <a href="../Admin/editUser.php?userID=<?php echo $user['userID']?>">
                                    <button type="submit" class="button_type4 editReservation">Edit</button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <?php }?>
                </table>
            </div>
        </div>
    </section>

    <?php include '../Objektet/footer.php'; ?>
    <script src="../script.js"></script>
</body>
</html>