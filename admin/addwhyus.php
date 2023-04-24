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
                $h1=$_POST['h1'];
                $txt=$_POST['txt'];
                if($name!="" && $h1!="" && $txt!="" )
                {
                    $query ="INSERT INTO why_choose_us (name,h1,txt) VALUES('$name','$h1','$txt')";
                    $result = mysqli_query($conn,$query);
                    if($result)
                    {
                      echo "Why Us is added successfully.";
                      ?>
                          <meta http-equiv="refresh" content="0; URL=managewhyus.php?msg=csuccess" />
                            <?php
                    }
                    else 
                    {
                        echo "Why Us couldn't added successfully.";
                    }
                }


              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Why Choose Us</h3>
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
                    <label for="exampleInputEmail1">h1</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="h1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">txt</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="txt" placeholder="">
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