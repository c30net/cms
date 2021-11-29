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


                    <!-- this include makes a table to show all posts -->
                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_user':
                            include_once 'admin_includes/add_user.php';
                            break;

                        case 'edit_user':
                            include_once 'admin_includes/edit_user.php';
                            break;

                        default:
                            include_once 'admin_includes/view_all_users.php';
                    }
                    ?>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

<?php
include_once 'admin_includes/admin_footer.php'; ?>