<?php require('inc/header.php');
 require('connection/config.php');
?>

  <!-- start inner banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Achievement</h1>
</section>
<!-- end inner banner -->
<!-- start achievement -->
<section class="achievement">
    <div class="container">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">Our Achievement</span>
            <h2>Happiness Of Great Achievement</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>

<?php

        // Retrieve achievements from the database
        $sql = "SELECT title, content, img FROM awards";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $content = $row['content'];
                $img = "assets/images/".$row['img'];
        ?>
                <div class="row my-5">
                    <div class="col-lg-6 offset-lg-0 offset-xl-0 col-md-8 offset-md-2">
                        <div class="img-block left-block">
                            <div class="border-line"></div>
                            <div class="cust_img">
                            <img class="img-fluid" data-aos="zoom-in" style="height:340px; width:295px;" data-aos-duration="1000" src="<?php echo $img; ?>" alt="Achievement">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-xl-5 mt-lg-5 mt-md-2 mt-sm-5 mt-5">
                        <h3 class="font-weight-bold color-orange" data-aos="fade-up" data-aos-duration="1000"><?php echo $title; ?></h3>
                        <p class="font-weight-bold mb-3"><?php echo $content; ?></p>

                    </div>
                </div>
        <?php
            }
        } else {
            echo "No achievements found";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</section>

<!-- end achievement -->

    <!-- start footer -->
    <?php require('inc/footer.php'); ?>



























































