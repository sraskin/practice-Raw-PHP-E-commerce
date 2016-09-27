<?php
include "../includes/db.php";

function get_cats()
{
    global $con;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($con, $query) or die ("Couldn't execute query");
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo "<li class=\"list-group-item\"><a href=\"#\">$cat_title</a></li>";
    }
}

function get_cats_drop()
{
    global $con;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($con, $query) or die ("Couldn't execute query");
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo "<option value='$cat_id'>$cat_title</option>";
    }
}

function get_brands()
{
    global $con;
    $query = "SELECT * FROM brands";
    $result = mysqli_query($con, $query) or die ("Couldn't execute query");
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo "<li class=\"list-group-item\"><a href=\"#\">$brand_title</a></li>";
    }
}

function get_brands_drop()
{
    global $con;
    $query = "SELECT * FROM brands";
    $result = mysqli_query($con, $query) or die ("Couldn't execute query");
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo "<option value='$brand_id'>$brand_title</option>";
    }
}

?>