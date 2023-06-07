<?php 
require('inc/toppart.php');
require('inc/navbar.php');
require('inc/sidebar.php');
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->

            <?php 
    $servername = "localhost"; //hamle kun server use garna laairaxau and pin chai default 3306 ma chaliraaxa
    $username = "root";
    $password = "";
    $dbname = "school_website";

    $conn = new mysqli($servername,$username,$password,$dbname);
    // if($conn)
    // {
    //     echo "Connection Successful";
    // }
?>
            <?php
              if(isset($_POST['submit'])) {
                $year = $_POST['year'];
                $h1 = $_POST['h1'];
                $p= $_POST['p'];
                $img = $_POST['img'];

                if($year!="" && $h1!="" && $p!="" &&  $img !="")
                { 
                    

                    $query2 ="INSERT INTO `aboutus` ( `year`, `h1`, `p`, `img`) VALUES ('$year','$h1','$p','$img');";

                    $myresult = mysqli_query($conn,$query2);
                    if($myresult)
                    {
                      
                      echo "About Us is added successfully.";
                    }
                    else 
                    {
                      // print($result2);
                        
                        echo "About Us couldn't add successfully.",$query2;
                    }
                }


              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add About Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Years</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="year" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="h1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Text</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="p" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image Link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="img" placeholder="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <?php
  require('inc/footer.php'); 
  ?>