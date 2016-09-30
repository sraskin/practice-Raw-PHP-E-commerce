<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ecommerce_db';
$con = mysqli_connect($host, $user, $password, $db) or die(mysqli_error($con));

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

function get_products()
{
    global $con;
    $query = "SELECT * FROM products";
    $result = mysqli_query($con, $query) or die ("Couldn't execute query");
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo "
        <div class=\"col-md-3\">
                        <div class=\"card\">
                            <img class=\"card-img-top\" src=\"images/product_images/$product_image\" width=\"243px\" height=\"180px\" alt=\"product_image\">
                            <div class=\"card-block\">
                                <h4 class=\"card-title\">$product_title</h4>
                                <h4 class=\card-title\">$product_price BDT</h4>
                                <p class=\"card-text\">$product_desc</p>
                                <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                                    <a href=\"detalis.php?id=$product_id\" class=\"btn btn-info\">Details</a>
                                    <a href=\"index.php?id=$product_id\" class=\"btn btn-success\">Add to cart</a>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
        
        ";
    }
}
?>