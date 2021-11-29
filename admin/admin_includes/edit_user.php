<!-- edit query to edit a row from database or a user from users table -->
<?php
if(isset($_GET['source']) &&  !empty($_GET['edit_id'])  &&  $connection)
{
    $user_id = ($_GET['edit_id']);
    $query = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
    $select_user_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_by_id)) {

        $username = $row['username'];
        $password = $row['user_password'];
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $email = $row['user_email'];
        //$user_image = $_FILES['image']['name'];
        //$user_image_temp = $_FILES['image']['tmp_name'];

        //move_uploaded_file($user_image_temp, 'images/' . $user_image);

       // $query_user = "INSERT INTO `users` (`username`,`user_password`,`user_firstname`,`user_lastname`,`user_role`,`user_email`,`user_image`) VALUES ('$username', '$password', '$firstname', '$lastname', '$user_role', '$email', '$user_image')";
        //$query_add_user = mysqli_query($connection, $query_user);

        //confirmQuery($query_add_user);
    }
}



if (isset($_POST['update_user'])) {
    $user_id = ($_GET['edit_id']);
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_role = $_POST['user_role'];

//    $post_image_temp = $_FILES['image']['tmp_name'];
//    if (strlen($post_image_temp) > 1) {
//        $post_image = $_FILES['image']['name'];
//        move_uploaded_file($post_image_temp, '../images/' . $post_image);
//    }



    $edit_query = "UPDATE `users` SET ";
    $edit_query .= "`username` = '$username' , ";
    $edit_query .= "`user_password` = '$password' , ";
    $edit_query .= "`user_firstname` = '$firstname' , ";
    $edit_query .= "`user_lastname` = '$lastname' , ";
    $edit_query .= "`user_email` = '$email' ,  ";
    $edit_query .= "`user_role` = '$user_role' ";
    $edit_query .= "WHERE `user_id` = '$user_id' ";

    $create_edit_query = mysqli_query($connection, $edit_query);
    confirmQuery($create_edit_query);
    header('location: users.php');
}

?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username ">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="firstname ">Firstname</label>
        <input type="text" class="form-control" name="firstname"  value="<?php echo $firstname ?>">
    </div>
    <div class="form-group">
        <label for="lastname ">Lastname</label>
        <input type="text" class="form-control" name="lastname"  value="<?php echo $lastname; ?>">
    </div>
    <div class="form-group">
        <label for="user_role">User Role</label><br>
        <select name="user_role" id="user_role">
            <option value="administrator">Administrator</option>
            <option value="editor">Editor</option>
            <option value="author">Author</option>
            <option value="contributor">Contributor</option>
            <option selecte="selected" value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email"  value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password"  value="<?php echo $password; ?>">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>
</form>
