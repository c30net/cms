<?php

function insert_categories(){
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == '' || empty($cat_title)) {
            echo '<h1>This field should not be empty</h1>';
        } else {
            $query
                = "INSERT INTO categories (cat_title) VALUE ('$cat_title')";

            $create_category_query = mysqli_query(
                $connection,
                $query
            );


            if (!$create_category_query) {
                die('Query Failed ' . mysqli_error($connection));
            }
        }
    }
}


function findAllCategories(){
    global $connection;
    $query             = "SELECT * FROM categories";
    $select_categories = mysqli_query(
        $connection,
        $query
    );

    while ($row = mysqli_fetch_assoc($select_categories)) {
        echo "<tr>
                <td>{$row['cat_id']}</td>
                <td>{$row['cat_title']}</td>
                <td><a href='categories.php?delete={$row['cat_id']}' >DELETE</a></td>
                <td><a href='categories.php?edit={$row['cat_id']}' >Edit</a></td>
                </tr>";
    };
}


function deleteCategories(){
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id   = $_GET['delete'];
        $delete_query
            = "DELETE FROM `categories` WHERE `cat_id` = {$the_cat_id}";
        $delete_query = mysqli_query(
            $connection,
            $delete_query
        );
        header("Location: categories.php");
        if (!$delete_query) {
            die('Delete Query Failed ' . mysqli_error(
                    $connection
                ));
        }
    }
}