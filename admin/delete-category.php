<?php
include('config/constants.php');

if (isset($_GET['id']) and isset($_GET['image_name'])) {
    //echo "get value and delete"
    $id = $_get['id'];
    $image_name = $_get['image_name'];

    if ($image_name != "") {
        $path = "../images/category";
        $remove = unlink($path);

        if ($remove == false) {
            $_SESSION['remove'] = "<div class='error'>Failed to remove category image.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');
            die();
        }
    }


    $sql = "DELETE FROM tbl-category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Failed to Deleted Category.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }

} else {
    header('location:' . SITEURL . 'admin/manage-category.php');
}