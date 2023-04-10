<nav class="navbar navbar-inverse navbar-fixed-top navbar-expand-md bg-dark pe-5">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".coll1">
            <span class="navbar-toggler-icon"></span>
</button>





    <div class="coll1 collapse navbar-collapse">
    <ul class="navbar-nav nav side-nav">
    <li class="nav-item"><a href="index.php?dashboard" class="nav-link">
                <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a></li>
                <li class="nav-item"><a href="#"data-bs-toggle="collapse" data-bs-target="#p_cat" class="nav-link">
                <i class="fa fa-fw fa-tag"></i> Products
                <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="p_cat" class="collapse">
                    <li class="nav-item"><a href="index.php?insert_product" class="nav-link">Insert Products</a></li>
                    <li class="nav-item"><a href="index.php?view_product" class="nav-link">View Products</a></li>
                </ul>
                </li>
                <li class="nav-item"><a href="#"data-bs-toggle="collapse" data-bs-target="#p_cat2" class="nav-link">
                <i class="fa fa-fw fa-edit"></i> Products Categories
                <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="p_cat2" class="collapse">
                    <li class="nav-item"><a href="index.php?insert_p_cat" class="nav-link">Insert Products Categories</a></li>
                    <li class="nav-item"><a href="index.php?view_p_cat" class="nav-link">View Products Categories</a></li>
                </ul>
                </li>
                <li class="nav-item"><a href="#"data-bs-toggle="collapse" data-bs-target="#p_cat3" class="nav-link">
                <i class="fa fa-fw fa-cart"></i> Categories
                <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="p_cat3" class="collapse">
                    <li class="nav-item"><a href="index.php?insert_cat" class="nav-link">Insert Category</a></li>
                    <li class="nav-item"><a href="index.php?view_cat" class="nav-link">View Categories</a></li>
                </ul>
                </li>
                <li class="nav-item"><a href="#"data-bs-toggle="collapse" data-bs-target="#p_cat4" class="nav-link">
                <i class="fa fa-fw fa-edit"></i> Slides
                <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="p_cat4" class="collapse">
                    <li class="nav-item"><a href="index.php?insert_slide" class="nav-link">Insert Slide</a></li>
                    <li class="nav-item"><a href="index.php?view_slides" class="nav-link">View Slides</a></li>
                </ul>
                </li>
                <li class="nav-item"><a href="#"data-bs-toggle="collapse" data-bs-target="#p_cat4" class="nav-link">
                <i class="fa fa-fw fa-dropbox"></i> Boxes
                <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="p_cat4" class="collapse">
                    <li class="nav-item"><a href="index.php?insert_box" class="nav-link">Insert Box</a></li>
                    <li class="nav-item"><a href="index.php?view_boxes" class="nav-link">View Boxes</a></li>
                </ul>
                </li>
               <li class="nav-item"><a href="#" data-bs-target=".col123" class="nav-link" data-bs-toggle="collapse">Check Out</a>
                <ul class="collapse col123">
                <li class="nav-item"><a class="nav-link" href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> Customers
                </a></li>
                
                <li class="nav-item"><a class="nav-link" href="index.php?view_orders">
                    <i class="fa fa-fw fa-pencil"></i> Orders
                </a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> Payments
                </a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?edit_css">
                    <i class="fa fa-fw fa-money"></i> CSS Editor
                </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target=".col12">
                    <i class="fa fa-fw fa-users"></i> Users
                <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse col12">
                    <li class="nav-item"><a class="nav-link" href="index.php?insert_user">Insert User</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?view_user">View Users</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a></li>
               
    </ul>

</div>


<a href="index.php?dashboard" class="navbar-brand text-light m">Admin Area</a>

<ul class="nav ms-auto me-5 top-nav">
        <li class="dropdown">
            <a href="#" style="text-decoration: none;" data-bs-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-user"></i> Xawft <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="index.php?user_profile" class="dropdown-item">
                    <i class="fa fa-fw fa-user"></i> Profile
                </a></li>
                <li><a href="index.php?view_products" class="dropdown-item">
                <i class="fa fa-fw fa-envelope"></i> Products
                <span class="badge">7</span>
                </a></li>
                <li><a href="index.php?view_customers" class="dropdown-item">
                <i class="fa fa-fw fa-users"></i> Customers
                <span class="badge">11</span>
                </a></li>
                <li><a href="index.php?view_cats" class="dropdown-item">
                <i class="fa fa-fw fa-gear"></i> Products Categories
                </a></li>
                <li><hr></li>
                <li><a href="logout.php" class="dropdown-item">
                <i class="fa fa-fw fa-power"></i> Log Out
                </a></li>
               
            </ul>
        </li>
    </ul>

</nav>