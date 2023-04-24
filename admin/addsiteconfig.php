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
              if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $site_key=$_POST['site_key'];
                $site_value=$_POST['site_value'];
                if($name!="" && $site_key!="" && $site_value!="" )
                {
                    $query ="INSERT INTO siteconfig (name,site_key,site_value) VALUES('$name','$site_key','$site_value')";
                    $result = mysqli_query($conn,$query);
                    if($result)
                    {
                      echo "SiteConfig is added successfully.";
                      ?>
                          <meta http-equiv="refresh" content="0; URL=managesiteconfig.php?msg=csuccess" />
                            <?php
                    }
                    else 
                    {
                        echo "SiteConfig couldn't added successfully.";
                    }
                }


              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Siteconfig</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Site_key</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="site_key" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Site_value</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="site_value" placeholder="">
                  </div>
                
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="" class="btn btn-primary">Submit</button>
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

<?php   require('inc/footer.php');  ?>