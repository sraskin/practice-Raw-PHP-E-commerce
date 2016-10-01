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
        echo "<li class=\"list-group-item\"><a href=\"index.php?cat=$cat_id\">$cat_title</a></li>";
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
        echo "<li class=\"list-group-item\"><a href=\"index.php?brand=$brand_id\">$brand_title</a></li>";
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
    if (!isset($_GET['cat']) && !isset($_GET['brand'])) {
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
                                    <a href=\"details.php?id=$product_id\" class=\"btn btn-info\">Details</a>
                                    <a href=\"index.php?id=$product_id\" class=\"btn btn-success\">Add to cart</a>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
        
        ";
        }


    }
}

function get_product_details()
{
    global $con;
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $query = "SELECT * FROM products where product_id = '$product_id'";
        $result = mysqli_query($con, $query) or die ("Couldn't execute query");
        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "
                            <div class=\"card text-xs-center\">
                        <div class=\"card-header\">
                            $product_title
                        </div>
                        <div class=\"card-block\">
                            <img class=\"card-img-top\" src=\"images/product_images/$product_image\" width=\"400px\" height=\"350px\" alt=\"product_image\">
                            <p class=\"card-text\">$product_price</p>
                            <p class=\"card-text\">$product_desc</p>
                        </div>
                        <div class=\"card-footer text-muted\">
                            <a href=\"#\" class=\"btn btn-primary\">Add to cart</a>
                        </div>
                    </div>
                            ";
        }
    }
}

function get_product_cat()
{
    global $con;
    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $query = "SELECT * FROM products where product_cat = '$cat_id'";
        $result = mysqli_query($con, $query) or die ("Couldn't execute query");
        $count_cat = mysqli_num_rows($result);
        if ($count_cat == 0) {
            echo "
                <div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Oops!</strong> There is nothing on this Category.
                </div>
                ";
            exit();
        }
        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "
                            <div class=\"card text-xs-center\">
                        <div class=\"card-header\">
                            $product_title
                        </div>
                        <div class=\"card-block\">
                            <img class=\"card-img-top\" src=\"images/product_images/$product_image\" width=\"400px\" height=\"350px\" alt=\"product_image\">
                            <p class=\"card-text\">$product_price</p>
                            <p class=\"card-text\">$product_desc</p>
                        </div>
                        <div class=\"card-footer text-muted\">
                            <a href=\"#\" class=\"btn btn-primary\">Add to cart</a>
                        </div>
                    </div>
                            ";
        }
    }
}

function get_product_brand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $query = "SELECT * FROM products where product_cat = '$brand_id'";
        $result = mysqli_query($con, $query) or die ("Couldn't execute query");
        $count_brand = mysqli_num_rows($result);
        if ($count_brand == 0) {
            echo "
                <div class=\"alert alert-danger\" role=\"alert\">
                    <strong>Oops!</strong> There is nothing on this Brand.
                </div>
                ";
            exit();
        }
        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "
                            <div class=\"card text-xs-center\">
                        <div class=\"card-header\">
                            $product_title
                        </div>
                        <div class=\"card-block\">
                            <img class=\"card-img-top\" src=\"images/product_images/$product_image\" width=\"400px\" height=\"350px\" alt=\"product_image\">
                            <p class=\"card-text\">$product_price</p>
                            <p class=\"card-text\">$product_desc</p>
                        </div>
                        <div class=\"card-footer text-muted\">
                            <a href=\"#\" class=\"btn btn-primary\">Add to cart</a>
                        </div>
                    </div>
                            ";
        }
    }
}

function get_tags()
{
    global $con;
    $query = "SELECT * FROM products";
    $result = mysqli_query($con, $query) or die ("Couldn't execute query");
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $exp = explode(',', $product_keywords);
        foreach ($exp as $x => $x_value) {
            echo "\"$x_value\",";
        }
    }
}

?>