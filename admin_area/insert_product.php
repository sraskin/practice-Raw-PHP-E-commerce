<!DOCTYPE html>
<?php
include "../functions/functions.php";
include "../includes/db.php";
?>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"
          integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"
            integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<div class="container">
    <div class="row">
        <p class="display-4"> Insert New Post Here</p>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="product_title" class="col-xs-2 col-form-label">Product Title</label>
                <div class="col-xs-10">
                    <input type="text" name="product_title" class="form-control" id="product_title"
                           placeholder="Enter Product Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_cat" class="col-xs-2 col-form-label">Product Category</label>
                <div class="col-xs-10">
                    <select class="form-control" id="product_cat" name="product_cat" required>
                        <option value="NULL">Select Category</option>
                        <?php get_cats_drop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_brand" class="col-xs-2 col-form-label">Product Brand</label>
                <div class="col-xs-10">
                    <select class="form-control" id="product_brand" name="product_brand" required>
                        <option value="NULL">Select Brand</option>
                        <?php get_brands_drop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_image" class="col-xs-2 col-form-label">Product Image</label>
                <div class="col-xs-10">
                    <input type="file" name="product_image" class="form-control-file" id="product_image" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_price" class="col-xs-2 col-form-label">Product Price</label>
                <div class="col-xs-10">
                    <input type="text" name="product_price" class="form-control" id="product_price"
                           placeholder="Enter Product Price" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_desc" class="col-xs-2 col-form-label">Product Description</label>
                <div class="col-xs-10">
                    <textarea name="product_desc" class="form-control" id="product_desc" rows="3"></textarea>
                    <!--                    <input type="text" name="product_desc" class="form-control" id="product_desc"-->
                    <!--                           placeholder="Enter Product Description">-->
                </div>
            </div>
            <div class="form-group row">
                <label for="product_keywords" class="col-xs-2 col-form-label">Product Keywords</label>
                <div class="col-xs-10">
                    <input type="text" name="product_keywords" class="form-control" id="product_keywords"
                           placeholder="Enter Product Keywords">
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block" name="insert_post">Submit</button>
        </form>

        <?php
        if (isset($_POST['insert_post'])) {
            $product_title = $_POST['product_title'];
            $product_cat = $_POST['product_cat'];
            $product_brand = $_POST['product_brand'];
            $product_price = $_POST['product_price'];
            $product_desc = $_POST['product_desc'];
            $product_keywords = $_POST['product_keywords'];

            $product_image = $_FILES['product_image']['name'];
            $product_image_tmp = $_FILES['product_image']['tmp_name'];
            move_uploaded_file($product_image_tmp, "../images/product_images/$product_image");

            $query = "insert into products(product_id,product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values('','$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
            $insert_product = mysqli_query($con, $query) or die(mysqli_error($con));

            if ($insert_product) {
                echo "<script>alert('product has been inserted')</script>";
                echo "<script>window.open('insert_product.php','_self')</script>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>