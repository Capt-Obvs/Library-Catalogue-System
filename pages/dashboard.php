<?php
session_start();
//include session file on all user panel pages
include("includes/config.php");

$query = "SELECT COUNT(*) FROM `issued_books` WHERE student_reg_no='".$_SESSION['reg_no']."' AND status='returned'";
$result = mysqli_query($conn, $query);
$returned_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `issued_books` WHERE student_reg_no='".$_SESSION['reg_no']."' AND status='issued'";
$result = mysqli_query($conn, $query);
$issued_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `audiobooks`";
$result = mysqli_query($conn, $query);
$audiobooks_count = mysqli_fetch_assoc($result)['COUNT(*)'];

if(isset($_SESSION['user_id']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Library Catalogue Management System
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-6 d-flex align-items-center">
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="includes/logout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-sign-out me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-symbols-rounded">Cycle</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Returned Books</p>
                <h4 class="mb-0"><?php if ($returned_count > 0) { echo $returned_count; } else { echo 'N/A'; } ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="mb-0 text-sm">Total count of my returned books to the library </span></p>
            </div>
          </div>
        </div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-symbols-rounded">book</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Issued Books</p>
                <h4 class="mb-0"><?php if ($issued_count > 0) { echo $issued_count; } else { echo 'N/A'; } ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="mb-0 text-sm">Total count of issued books given to you from the library</span></p>
            </div>
          </div>
        </div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-symbols-rounded">library_music</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Audio Books</p>
                <h4 class="mb-0"><?php if ($audiobooks_count > 0) { echo $audiobooks_count; } else { echo 'N/A'; } ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="mb-0 text-sm">Total count of all audio books in the library </span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Latest Audiobooks</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
				<div class="row">
					<?php
						$query    = "SELECT * FROM `audiobooks`";
						$result = mysqli_query($conn, $query);
						if (mysqli_num_rows($result) > 0) {
						  // output data of each row
						  while($row = mysqli_fetch_assoc($result)) {
							echo "
								<div class='col-md-3 col-6'>
								  <div class='card'>
									<div class='card-header p-3 text-center'>
										<div class='icon icon-shape icon-xl bg-gradient-primary shadow text-center border-radius-xl'>
											<i class='material-symbols-rounded'>slow_motion_video</i>
										  </div>
									</div>
									<div class='card-body pt-0 p-3 text-center'>
									  <h6 class='text-center text-xs'>".$row['audio_title']."</h6>
									  <audio controls class='col-12'>
										<source src='".$row['audio_file']."' type='audio/mpeg'>
										Your browser does not support the audio element.
									  </audio>
									</div>
								  </div>
								  <hr class='horizontal dark my-3'>
								</div>
							";
						  }
						}else{
							echo "
								<li class='list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg'>
									<div class='d-flex flex-column'>
										<h6 class='mb-3 text-sm'>Nothing to show here</h6>
										<span class='mb-2 text-xs'>Why ??</span>
										<span class='mb-2 text-xs'>The database is empty!!!</span>
										<span class='text-xs'>Do not worry, admin will update it very soon!!</span>
									</div>
								</li>
							";
						}
					?>
				</div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Student Buzz</h6>
            </div>
            <div class="card-body p-3">
			<?php
				$query = "SELECT * FROM `registered_students` ORDER BY id DESC LIMIT 5";
				$result = mysqli_query($conn, $query);
				if (mysqli_num_rows($result) > 0) {
				// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						echo"
							<div class='timeline timeline-one-side'>
								<div class='timeline-block mb-3'>
								  <span class='timeline-step'>
									<i class='material-icons text-success text-gradient'>notifications</i>
								  </span>
								  <div class='timeline-content'>
									<h6 class='text-dark text-sm font-weight-bold mb-0'>".$row['full_name'].", just joined!!</h6>
									<p class='text-secondary font-weight-bold text-xs mt-1 mb-0'>".date('F d, Y', strtotime($row['created_date']))."</p>
								  </div>
								</div>
							</div>
						";
					}
				}
			?>
              
            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a class="font-weight-bold" target="_blank">Adnan Musa</a>
                for a better library catalogue system.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>
</html>
<?php
}else{
	header("location:sign-in");
}
?>