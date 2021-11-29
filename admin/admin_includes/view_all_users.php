<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>E-mail</th>
        <th>Role</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];





        echo "<tr>
                            <td>$user_id</td>
                            <td>$username</td>
                            <td>$user_firstname</td>
                            <td>$user_lastname</td>
                            <td>$user_email</td>
                            <!-- <td><img src='../images/$ post_image' width='100px' alt='image'></td> -->
                            <td>$user_role</td>
                            <td>date</td>
                            <td><a href='users.php?source=edit_user&edit_id=" . $user_id . "'>Edit</a></td>
                            <td><a href='users.php?delete=" . $user_id . "'>Delete</a></td>                            
                         </tr>";
    }
    ?>
    </tbody>
</table>

<!-- delete query to delete a row from database or a user from users table -->
<?php
if (isset($_GET['delete']) && $connection) {
    $user_id = ($_GET['delete']);
    $query = "DELETE FROM `users` WHERE `user_id` = '$user_id'";
    $delete_query = mysqli_query($connection, $query);
    header('Location: users.php');
} ?>