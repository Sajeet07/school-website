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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Why Choose us</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th> Name</th>
                                            <th> h1</th>
                                            <th>text</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                    $select_query = "SELECT * FROM why_choose_us ORDER BY created_at DESC";
                                    $select_result = mysqli_query($conn,$select_query);
                                    $count = 0;
                                    while($data = mysqli_fetch_array($select_result))
                                    {
                                        $count += 1; //$count = $count + 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['h1']; ?></td>
                                            <td><?php echo $data['txt']; ?></td>
                                            <td><button type="button" name="" id="" class="btn btn-primary btn-sm" btn-lg btn-block><?php echo $data['status']; ?></button></td>
                                            <td>
                                            <a name="" id="" class="btn btn-primary btn-sm" href="editwhyus.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                            <a name="" id="" class="btn btn-danger btn-sm" href="process/deletewhyus.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                                            </td>
                                        </tr>
                                        <?php      
                                    }
                                    ?>
                                    </tbody>

                                    <tfoot>
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
             
  
  <?php
  require('inc/footer.php'); 
  ?>