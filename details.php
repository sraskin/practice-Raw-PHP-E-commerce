<!DOCTYPE html>
<?php
include "functions/functions.php";
include "includes/db.php";
?>
<html>
<head>
    <title>Practice-ECommerce</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"
          integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"
            integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>
<body>
<!--Nav start-->
<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Practice-ECommerce</a>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">All Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">My Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Shopping Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contacts Us</a>
        </li>
    </ul>
    <form class="form-inline pull-xs-right" method="get" action="results.php" enctype="multipart/form-data">
        <input class="form-control" type="text" name="user_query" placeholder="Search a Product">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form>
</nav>
<nav class="navbar navbar-light bg-faded">
    <div class="container pull-xs-right">
        <a class="fa fa-user" href="#">&nbsp;Welcome User!</a>
        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
        <a class="fa fa-shopping-cart" href="#">&nbsp;Cart:&nbsp;&nbsp;items(_) & price(_)</a>
    </div>
</nav>
<!--Nav end-->

<!--Main container start-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="sidebar">
            <ul class="list-group" id="sidebar_list">
                <p>Categories</p>
                <?php get_cats(); ?>
                <p>Brands</p>
                <?php get_brands(); ?>
            </ul>
        </div>
        <div class="col-md-10" id="content_area">
            <div class="container">
                <div class="row">
                    <?php
                    get_product_details();
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!--Main container end-->

</body>
</html>