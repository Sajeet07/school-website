<?php 
require('inc/toppart.php');
require('inc/navbar.php');
require('inc/sidebar.php');
?>


<?php 
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $show_query = "SELECT * FROM sliders WHERE id=$id"; 
  $show_result = mysqli_query($conn,$show_query);
  $row = $show_result->fetch_assoc();
  $name = $row['name'];
  $h1 = $row['h1'];
  $p=$row['p'];
  $btn_txt=$row['btn_txt'];
  $btn_link=$row['btn_link'];
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
                $name = $_POST['name'];
                $h1 = $_POST['h1'];
                $p= $_POST['p'];
                $btn_txt = $_POST['btn_txt'];
                $btn_link = $_POST['btn_link'];
                $img= $_POST['img'];

                if($name!="" && $h1!="" && $p!="" && $btn_txt !="" && $btn_link!="" && $img !="")
                {
                    $query ="UPDATE sliders SET name='$name', h1='$h1', p='$p', btn_txt='$btn_txt', btn_link='$btn_link', img='$img' WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    if($result)
                    {
                        echo "Slider is updated successfully.";
                        ?>
                        <meta http-equiv="refresh" content="0; URL=manageslider.php?msg=csuccess" />
                          <?php
                        
                    }
                    else 
                    {
                        echo "Slider couldn't updated successfully.";
                    }
                }


              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="<?php echo $name; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Heading</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="h1" placeholder="" value="<?php echo $h1; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Text</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="p" placeholder="" value="<?php echo $p; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Button Text</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="btn_txt" placeholder="" value="<?php echo $btn_txt; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Button Link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="btn_link" placeholder="" value="<?php echo $btn_link; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Image Link</label>
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