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
						<small>Author Name</small>
					</h1>
					<div class="col-xs-6">
						<?php insert_categories(); ?>


						<!--  start : form for adding category  -->
						<form action="" method="post">
							<div class="form-group">
								<label for="cat_title">Add Category</label>
								<input type="text" name="cat_title" class="form-control">
							</div>
							<div class="form-group">
								<input class='btn btn-primary' type="submit" name="submit" value="Add Category">
							</div>
						</form>
						<!--  end : form for adding category  -->
						<!--  start : form for editing category  -->


						<?php
						if (isset($_GET['edit'])) {
							$cat_id = $_GET['edit'];
							include_once 'admin_includes/update_categories.php';
						}
						?>
					<!--  end : form for editing category -->
					</div>
					<!--  start :  a table to show categories as content -->

					<div class="col-xs-6">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">Id</th>
									<th class="text-center">Category Title</th>
								</tr>
							</thead>
							<tbody>

								<?php
								//                  mysql query to read all categories from database
								findAllCategories();
								?>
								<!--              mysql query to delete a category from database -->
								<?php
								deleteCategories();
								?>

							</tbody>
						</table>
					</div>



				</div>
			</div>
			<!-- /.row -->

		</div>
		<!-- /.container-fluid -->

	</div>

	<?php
	include_once 'admin_includes/admin_footer.php'; ?>