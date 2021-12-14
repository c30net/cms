<!-- edit query to edit a row from database or a post from posts table -->
<?php
if (isset($_GET['source']) &&  !empty($_GET['post_id'])  &&  $connection) {
    $post_id = ($_GET['post_id']);
    $query = "SELECT * FROM `posts` WHERE `post_id` = '$post_id'";
    $select_post_by_id = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];

        $post_id = $row['post_id'];

        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }
}

if (isset($_POST['edit_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];



    $post_image_temp = $_FILES['image']['tmp_name'];
    if (strlen($post_image_temp) > 1) {
        $post_image = $_FILES['image']['name'];
        move_uploaded_file($post_image_temp, '../images/' . $post_image);
    }



    $edit_query = "UPDATE `posts` SET ";
    $edit_query .= "`post_title` = '$post_title' , ";
    $edit_query .= "`post_author` = '$post_author' , ";
    $edit_query .= "`post_category_id` = '$post_category' , ";
    $edit_query .= "`post_status` = '$post_status' , `post_date` = now() , ";
    $edit_query .= "`post_image` = '$post_image' , ";
    $edit_query .= "`post_tags` = '$post_tags' ,`post_content` = '$post_content'  ";
    $edit_query .= "WHERE `post_id` = '$post_id'";

    $create_edit_query = mysqli_query($connection, $edit_query);
    confirmQuery($create_edit_query);
    if($create_edit_query){
        echo '<div class="alert alert-success alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<h4 class="alert alert-warning">Post Data Updated Successfully</h4>';
        echo '<h4 class="alert alert-info">see  <a href="../post.php?p_id='.$post_id.'">the post</a> updated  </h4>';
        echo '<h4 class="alert alert-warning">see  other <a href="./posts.php">posts</a> to update them</h4>';
        echo '</div>';
    }

}

?>


<!-- Start of html code for making edit form -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value='<?php echo $post_title;  ?>'>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value='<?php echo $post_author;  ?>'>
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <!-- a query to get all categories from database -->
        <select name="post_category" id="post_category">
            <?php
            $query_category = "SELECT * FROM `categories`";
            $select_categories = mysqli_query($connection, $query_category);
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value=" . $cat_id . ">" . $cat_title . "</option>";
            }

            ?>

        </select>
    </div>


    <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="user_role">
            <option value="<?php echo $post_status;  ?>"><?php echo ucfirst($post_status);  ?></option>
            <?php
            if($post_status === 'published'){
                echo "<option value='drafted'>Drafted</option>";
            } else {
                echo "<option value='published'>Published</option>";
            }
            ?>
        </select>
    </div>





    <div class="form-group">
        <label for="post_image">Post Image</label><br><input type="file" name="image"><br>
        <img width="100px" src="./../images/<?php echo $post_image;  ?>" alt="">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value='<?php echo $post_tags;  ?>'>
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label><textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_content;  ?>
         </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Edit Post">
    </div>
</form>
<!-- End of html code for making edit form -->