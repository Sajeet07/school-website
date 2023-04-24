<?php 
require('inc/toppart.php');
require('inc/navbar.php');
require('inc/sidebar.php');
?>


<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $show_query = "SELECT * FROM users WHERE id=$id"; 
    $show_result = mysqli_query($conn,$show_query);
    $row = $show_result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $phone=$row['phone'];
    $password=$row['password'];
 
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
              if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = md5($_POST['password']);

                if($name!="" && $email!="" && $phone!="" && $password !="" )
                {
                    $query ="UPDATE users SET name='$name', email='$email', phone='$phone', password='$password' WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    if($result)
                    {
                        ?>
                          <meta http-equiv="refresh" content="0; URL=manageadmin.php?msg=csuccess" />
                            <?php
                        echo "Admin is updated successfully.";
                      
                    }
                    else 
                    {
                        echo "Admin couldn't updated successfully.";
                    }
                }
            }

           
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="">Name <span style="color:red;">*</span></label>
                                  <input type="text"class="form-control" name="name" id="" value="<?php echo $name; ?>" aria-describedby="helpId" placeholder="" required>
                                </div>
                              
                                <div class="form-group">
                                  <label for=""> Email<span style="color:red;">*</span></label>
                                  <input type="email"class="form-control" name="email" id="" value="<?php echo $email; ?>" aria-describedby="helpId" placeholder="" required>
                                </div>

                                <div class="form-group">
                                  <label for=""> Phone<span style="color:red;">*</span></label>
                                  <input type="number"class="form-control" name="phone" id="" value="<?php echo $phone; ?>" aria-describedby="helpId" placeholder="" required>
                                </div>

                                <div class="form-group">
                                  <label for="">Password<span style="color:red;">*</span></label>
                                  <input type="password"class="form-control" value="password" name="password" id="" value="<?php echo $password; ?>" aria-describedby="helpId" placeholder="" required>
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