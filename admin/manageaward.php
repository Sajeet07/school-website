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
                <h3 class="card-title">Manage award</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT * FROM awards ORDER BY created_at DESC";
                  $result = mysqli_query($conn,$query);
                  $sn = 0;
                  while($data=mysqli_fetch_array($result))
                  {
                    $sn+=1; //$sn = $sn+1
                    ?>
                  <tr>
                    <td><?php echo $sn; ?></td>
                    <td>
                        <a name="" id="" class="btn btn-primary btn-xs" href="editaward.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                        <a name="" id="" class="btn btn-danger btn-xs" href="process/deleteaward.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                    </td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['content']; ?></td>
                    <td> <img src="../assets/images/<?php echo $data['img'];?>" alt="" height="80px;" width="80px;">/td>
                  </tr>
                    <?php
                  }
                  ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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