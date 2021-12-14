<?php
if(isset($_POST['create_user']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];

    $lastname = $_POST['lastname'];
    $user_role = $_POST['user_role'];
    $email = $_POST['email'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($user_image_temp, 'images/'.$user_image);

    $query_user = "INSERT INTO `users` (`username`,`user_password`,`user_firstname`,`user_lastname`,`user_role`,`user_email`,`user_image`) VALUES ('$username', '$password', '$firstname', '$lastname', '$user_role', '$email', '$user_image')";
    $query_add_user = mysqli_query($connection, $query_user);

    confirmQuery($query_add_user);
    if($query_add_user){
        echo '<h1 id="used" class="alert alert-success" role="alert">User Added Successfully</h1>';
    }
}

?>
<span></span>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username ">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="firstname ">Firstname</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname ">Lastname</label>
        <input type="text" class="form-control" name="lastname">
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
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input  class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>
