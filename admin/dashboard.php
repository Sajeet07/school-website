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
    <li class="breadcrumb-item"><a href="http://localhost/school-website-main/admin/" onclick="logout()">Logout</a></li>
    <li class="breadcrumb-item active">Dashboard v1</li>
  </ol>
</div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <script>
function logout() {
  var confirmLogout = confirm("Are you sure you want to logout?");
  if (confirmLogout) {
    // Clear the session
    // You can make an AJAX request to the server to clear the session
    // Example using jQuery:
    $.ajax({
      url: 'logout.php', // Replace with the actual logout script URL
      type: 'POST',
      success: function(response) {
        // Redirect to the login page
        window.location.href = 'http://localhost/school-website-main/admin/dashboard.php'; // Replace with the actual login page URL
      },
      error: function(xhr, status, error) {
        // Handle error
        console.log(error);
      }
    });
  } else {
    // User clicked "Cancel" or closed the dialog, do nothing
  }
}
</script>
    

               
  
  <?php
  require('inc/footer.php'); 
  ?>