<!-- slider area start -->
<div class="banner-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories-menu-bar cat-menu-style2 cat-header4">
                    <div class="categories-menu-btn bg-4 ha-toggle">
                        <div class="left">
                            <i class="lnr lnr-text-align-left"></i>
                            <span>Browse categories</span>
                        </div>
                        <div class="right">
                            <i class="lnr lnr-chevron-down"></i>
                        </div>
                    </div>
                    <nav class="categorie-menus ha-dropdown">
                        <ul id="menu2">
                            <?php
                            // Fetch categories from the database
                            $category_query = mysqli_query($connection, "SELECT * FROM tbl_category");
                            while ($category = mysqli_fetch_assoc($category_query)) {
                            ?>
                                <li><a href="category.php?category_id=<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?><span class="lnr lnr-chevron-right"></span></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="hero-slider-active hero-style-2 slick-dot-style slider-arrow-style">
                    <div class="single-slider d-flex align-items-center" style="background-image: url(assets/img/slider/slider1-home2.jpg);">
                        <div class="container-dluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-text">
                                        <h1>Win a IPhone</h1>
                                        <p>Sale online and in store</p>
                                        <a class="btn-1 home-btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="single-slider d-flex align-items-center" style="background-image: url(assets/img/slider/slider2-home4.jpg);">
                            <div class="container-dluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slider-text">
                                            <h1>Microsoft Xbox<br>360 controller</h1>
                                            <p>Limited time only</p>
                                            <a class="btn-1 home-btn" href="#">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider area end -->