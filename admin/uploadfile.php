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
                $filename = $_POST['filename'];
                $dataFile = $_FILES['dataFile']['name'];
                //$dataFile consist info like hello.jpg
                $filesize = $_FILES['dataFile']['size'];
                $explode_values = explode('.', $dataFile);
                //$explode_values become array having data in the form $explode_values = ['hello','jpg']
                $name = $explode_values[0];
                $fname = str_replace(' ','', $name);
                $finalname = strtolower($fname.time());
                $ext = $explode_values[1];
                $finalfile = $finalname.'.'.$ext;
                /*suru ma chai file kon= name aayo tespaxi file ko size kb ma aayo,then file ko first name maatra aayo hello matra aayo
                then same cheez aayo but space hatera aayo then sabali str lai lowercase lagyou plus time pani add garyou then file ko
                extension aayo eg:png vara aayo then laast ma sab lai process garera final version nikalyou */
                if($filename!="")
                {
                  if($filesize<1000000) //if file size is less than 10 mb then upload it otherwise not
                  {
                    if($ext=='jpg' || $ext == 'png' || $ext == 'pdf')
                    {
                        if(move_uploaded_file($_FILES['dataFile']['tmp_name'],"../uploads/".$finalfile)) //sabai file haru upload ma aayera basxa ani link haru matra datatable ko file ma basxa
                        {
                          $query = "INSERT INTO filemanager (name,filelink,ext) VALUES('$filename','$finalfile','$ext')";
                          $result = mysqli_query($conn,$query);
                          if($result)
                          {
                            echo "File is uploaded successfully.";
                          }
                          else 
                          {
                            echo "File couldn't uploaded successfully.";
                          }
                        }
                    }
                    else 
                    {
                      echo "File Extension doesn't match. We only accept jpg, png, pdf.";
                    }

                  }
                  else
                  {
                    echo "File size exceeded.";
                  }
                }
                else 
                {
                  echo "File name is necessary.";
                }
              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload File</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">File Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="filename" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">File</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="dataFile" placeholder="">
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