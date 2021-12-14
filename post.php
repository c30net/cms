<?php

include_once 'includes/db.php'; ?>
<?php include_once 'includes/header.php'; ?>
<!-- Navigation -->
<?php
include_once 'includes/navigation.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id']) && $_GET['p_id'] > 0 ) {
                $p_id = $_GET['p_id'];


                $query = "SELECT * FROM posts WHERE `post_id` = '$p_id'";
                $select_all_posts_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];

                    $row['post_title'];

                    //                truncate post content
                    $post_content_truncated = substr($post_content, 0, 100);

                    echo "<h1 class='page-header'>
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href='#'>{$post_title}</a>
            </h2>
            <p class='lead'>
                by <a href='index.php'>{$post_author}</a>
            </p>
            <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
            <hr>
            <img class='img-responsive' src='images/{$post_image}' alt=''>
            <hr>
            <p>{$post_content_truncated}</p>

            <hr>";
                }
            }

            ?>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <?php

            if (isset($_POST['create_comment'])) {
                $the_post_id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                $comment_query = "INSERT INTO `comments` (`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ('$the_post_id', '$comment_author', '$comment_email', '$comment_content', 'Unapproved', NOW())";
                $create_comment_query = mysqli_query($connection, $comment_query);
                if (!$create_comment_query) {
                    die("Query Failed " . mysqli_error($connection));
                }

                $query_count_comment = "SELECT * FROM `comments` WHERE `comment_post_id` = '$post_id' ";
                $query_count_comment_post = mysqli_query($connection, $query_count_comment);
                $post_comment_count = $query_count_comment_post->num_rows;

                $query_comment_count = "UPDATE `posts` SET `post_comment_count` = '$post_comment_count' WHERE `post_id` = '$the_post_id'";
                $query_update_comment_count = mysqli_query($connection, $query_comment_count);


            }

            ?>
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method='POST' role="form">
                    <div class="form-group">
                        <label>Author</label>
                        <input type='text' class="form-control" name='comment_author'>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type='email' class="form-control" name='comment_email'>
                    </div>
                    <div class="form-group">
                        <label>Your Comment</label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name='create_comment'>Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->


            <?php

            if (isset($_GET['p_id']) && $_GET['p_id'] > 0 ) {
                $p_id = $_GET['p_id'];
                $query_post_comments = "SELECT * FROM `comments` WHERE `comment_post_id` =  '$p_id' AND `comment_status` = 'approved' ORDER BY `comment_id` ASC";
                $queryToReadComments = mysqli_query($connection, $query_post_comments);
                while($row = mysqli_fetch_assoc($queryToReadComments))
                {


                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];

            ?>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author; ?>
                        <small><?php echo $comment_date; ?></small>
                    </h4>
                    <?php echo $comment_content; ?>
                </div>
            </div>
            <?php

                }
            }
            ?>
            <!-- Comment -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        include_once 'includes/sidebar.php'; ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php
    include_once 'includes/footer.php'; ?>