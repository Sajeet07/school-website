<?php 
require('inc/toppart.php');
require('inc/navbar.php');
require('inc/sidebar.php');
?>


<?php 
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $show_query = "SELECT * FROM aboutus WHERE id=$id"; 
  $show_result = mysqli_query($conn,$show_query);
  $row = $show_result->fetch_assoc();
  $year = $row['year'];
  $h1=$row['h1'];
  $p=$row['p'];
  $img=$row['img'];

}
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
                $year = $_POST['year'];
                $h1 = $_POST['h1'];
                $p= $_POST['p'];
                $img= $_POST['img'];

                if($year!="" && $h1!="" && $p!=""  && $img !="")
                {
                    $query ="UPDATE aboutus SET year='$year', h1='$h1', p='$p', img='$img' WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    if($result)
                    {
                        echo "About us is updated successfully.";
                        ?>
                        <meta http-equiv="refresh" content="0; URL=manageaboutus.php?msg=csuccess" />
                          <?php
                        
                    }
                    else 
                    {
                        echo "About us couldn't updated successfully.";
                    }
                }


              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit About Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Year</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="year" placeholder="" value="<?php echo $year; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="h1" placeholder="" value="<?php echo $h1; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Paragraph</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="p" placeholder="" value="<?php echo $p; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">About Us Image Link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="img" placeholder="" value="<?php echo $img; ?>">
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