<div class="col-md-4">
	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<!-- TODO search form  starts-->
		<form action="search.php" method="post">
			<div class="input-group">
				<input type="text" class="form-control" name="search">
				<span class="input-group-btn">
                        <button class="btn btn-default" name="submit"
                                type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                </span>
			</div>
		</form>
		<!-- TODO search form ends -->
		<!-- /.input-group -->
	</div>

	<!-- Blog Categories Well -->
	<div class="well">
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled">

					<?php
						$query                     = "SELECT * FROM categories";
						$select_categories_sidebar = mysqli_query(
							$connection, $query
						);

						while ($row = mysqli_fetch_assoc(
							$select_categories_sidebar
						))
						{
							echo "<li><a href='#'>".$row['cat_title']
								."</a></li>";
						};
					?>

				</ul>
			</div>
		</div>
		<!-- /.row -->
	</div>

	<!-- Side Widget Well -->
	<?php
		include_once 'widget.php'; ?>

</div>