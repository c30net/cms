

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>in Response to</th>
            <th>Date</th>
            <th>Approved</th>
            <th>Unapproved</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php


        // sql query to read and show all comments information

        $query_comments = "SELECT * FROM comments";
        $select_comments = mysqli_query($connection, $query_comments);

        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];

            $comment_email = $row['comment_email'];

            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            //  sql query to read and show post title

            $query = "SELECT * FROM `posts` WHERE `post_id` =  '$comment_post_id'";
            $queryToReadPosts = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($queryToReadPosts);
            $post_title = $row['post_title'];
            // all comments information in a table

            echo "<tr>
                            <td>$comment_id</td>
                            <td>$comment_author</td>
                            <td>$comment_content</td>
                            <td>$comment_email</td>
                            <td>$comment_status</td>
                            <td><a href='../post.php?p_id=$comment_post_id'>$post_title</a></td>
                            <td>$comment_date</td>
                            <td><a href='comments.php?approve=" . $comment_id . "'>Approved</a></td>
                            <td><a href='comments.php?unapprove=" . $comment_id . "'>Unapprove</a></td>
                            <td><a>Edit</a></td>
                            <td><a href='comments.php?delete=" . $comment_id . "'>Delete</a></td>
                            
                            
                            
                            
                         </tr>";
        }
        ?>
    </tbody>
</table>

<!-- delete query to delete a row from database or a post from posts table -->
<?php
if (isset($_GET['approve']) && $connection) {
    $comment_id_to_approve = ($_GET['approve']);
    $query_to_approve = "UPDATE `comments` SET `comment_status` = 'approved' WHERE `comment_id` = '$comment_id_to_approve'";
    $approve_query = mysqli_query($connection, $query_to_approve);
    header("location: comments.php");
}

if (isset($_GET['unapprove']) && $connection) {
    $comment_id_to_unapprove = ($_GET['unapprove']);
    $query_to_unapprove = "UPDATE `comments` SET `comment_status` = 'unapproved' WHERE `comment_id` = '$comment_id_to_unapprove'";
    $approve_query = mysqli_query($connection, $query_to_unapprove);
    header("location: comments.php");
}


if (isset($_GET['delete']) && $connection) {
    $comment_id_to_delete = ($_GET['delete']);
    $query = "DELETE FROM `comments` WHERE `comment_id` = '$comment_id_to_delete'";
    $delete_query = mysqli_query($connection, $query);
    header("location: comments.php");
}
?>