<?php include_once 'admin_includes/admin_header.php'; ?>
    <div id="wrapper">

    <!-- Navigation -->
    <?php include_once 'admin_includes/admin_navigation.php'; ?>
    <!-- /#page-wrapper -->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        WELCOME TO ADMIN
                        <?php
                        if(!empty($_SESSION['username']))
                        {
                            echo ($_SESSION['username']);
                        }
                        ?><small>'s profile</small>
                    </h1>


                    <?php
                    if(!empty($_SESSION['username']))
                    {
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
                        $select_user = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_user)) {

                            $username = $row['username'];
                            $password = $row['user_password'];
                            $firstname = $row['user_firstname'];
                            $lastname = $row['user_lastname'];
                            $user_role = $row['user_role'];
                            $email = $row['user_email'];
                        }
                    }


                    if (isset($_POST['update_user'])) {

                        $username = $_POST['username'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $user_role = $_POST['user_role'];



                        $edit_query = "UPDATE `users` SET ";
                        $edit_query .= "`username` = '$username' , ";
                        $edit_query .= "`user_password` = '$password' , ";
                        $edit_query .= "`user_firstname` = '$firstname' , ";
                        $edit_query .= "`user_lastname` = '$lastname' , ";
                        $edit_query .= "`user_email` = '$email' ,  ";
                        $edit_query .= "`user_role` = '$user_role' ";
                        $edit_query .= "WHERE `user_id` = '$user_id' ";
                        echo 'This is test';
                        $create_edit_query = mysqli_query($connection, $edit_query);
                        confirmQuery($create_edit_query);
                        header('location: profile.php');
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
                            <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">
                        </div>
                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

<?php
include_once 'admin_includes/admin_footer.php'; ?>