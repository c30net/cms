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
			$query = "SELECT * FROM `posts` WHERE `post_status` = 'published' ";
			$select_all_posts_query = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
				$post_title         = $row['post_title'];
				$post_id            = $row['post_id'];
				//$post_category_id   = $row['post_category_id'];
				$post_author        = $row['post_author'];
				$post_date          = $row['post_date'];
				$post_image         = $row['post_image'];
				$post_content       = $row['post_content'];
				//$post_tags          = $row['post_tags'];
				//$post_comment_count = $row['post_comment_count'];
				//$post_status        = $row['post_status'];

				$row['post_title'];

//                truncate post content
                $post_content_truncated = substr($post_content, 0, 100);

				echo "<h1 class='page-header'>
                Page Heading
                <small>Secondary Text</small>
            </h1>
            

            <!-- First Blog Post -->
            <h2>
                <a href='post.php?p_id=$post_id'>{$post_title}</a>
            </h2>
            <p class='lead'>
                by <a href='#'>{$post_author}</a>
            </p>
            <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
            <hr>
            <a href='post.php?p_id=$post_id'><img class='img-responsive' src='images/{$post_image}' alt=''></a>
            <hr>
            <p>{$post_content_truncated}</p>
            <a class='btn btn-primary' href='post.php?p_id=$post_id'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

            <hr>";
			}
			?>

			<!-- Pager -->

		</div>

		<!-- Blog Sidebar Widgets Column -->
		<?php
		include_once 'includes/sidebar.php'; ?>

	</div>
	<!-- /.row -->

	<hr>
	<?php
	include_once 'includes/footer.php'; ?>