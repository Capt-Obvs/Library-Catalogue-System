<?php
session_start();
//include session file on all user panel pages
include("../includes/config.php");

$query = "SELECT COUNT(*) FROM `books` WHERE type = 'book' ";
$result = mysqli_query($conn, $query);
$books_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `issued_books` WHERE status='issued'";
$result = mysqli_query($conn, $query);
$issued_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `registered_students`";
$result = mysqli_query($conn, $query);
$registered_students_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `writers`";
$result = mysqli_query($conn, $query);
$writers_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `audiobooks`";
$result = mysqli_query($conn, $query);
$audiobooks_count = mysqli_fetch_assoc($result)['COUNT(*)'];

$query = "SELECT COUNT(*) FROM `books` WHERE type = 'article' ";
$result = mysqli_query($conn, $query);
$articles_count = mysqli_fetch_assoc($result)['COUNT(*)'];

if(isset($_SESSION['admin_id']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    Library Catalogue Management System
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Baze University</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="library_groups">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">diversity_2</i>
            </div>
            <span class="nav-link-text ms-1">Library Groups</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="writers">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">psychology</i>
            </div>
            <span class="nav-link-text ms-1">Writers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="books">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">auto_stories</i>
            </div>
            <span class="nav-link-text ms-1">Physical Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="audio-book">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">play_lesson</i>
            </div>
            <span class="nav-link-text ms-1">Audiobooks</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="issue-book">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">swipe_up</i>
            </div>
            <span class="nav-link-text ms-1">Issue Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="registered_students">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">person_add</i>
            </div>
            <span class="nav-link-text ms-1">Student Registration</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="article_publications">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">style</i>
            </div>
            <span class="nav-link-text ms-1">Articles & Publications</span>
          </a>
        </li>
		<li class="nav-item">
          <a class="nav-link text-white " href="reset-password">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">lock_reset</i>
            </div>
            <span class="nav-link-text ms-1">Reset Password</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="../includes/logout" type="button">Logout</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-right">
			  <ul class="navbar-nav  justify-content-end">
				<li class="nav-item d-xl-none ps-3 d-flex align-items-right">
				  <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
					<div class="sidenav-toggler-inner">
					  <i class="sidenav-toggler-line"></i>
					  <i class="sidenav-toggler-line"></i>
					  <i class="sidenav-toggler-line"></i>
					</div>
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
        <div class="col-md-12">
          <div class="row">
			<div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded">format_list_numbered</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Book Count</h6>
                      <span class="text-xs">List of all physical books in the library</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0"><?php if (isset($books_count)) { echo $books_count; } else { echo 'N/A'; } ?></h5>
                    </div>
                  </div>
				  <hr class="horizontal dark my-3">
                </div>
				<div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded">hourglass_top</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Unreturned Books</h6>
                      <span class="text-xs">List of all issued books not returned to the library</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0"><?php if (isset($issued_count)) { echo $issued_count; } else { echo 'N/A'; } ?></h5>
                    </div>
                  </div>
				  <hr class="horizontal dark my-3">
                </div>
				<div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded">group_add</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Student Registration</h6>
                      <span class="text-xs">Total count of registered students in the library</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0"><?php if (isset($registered_students_count)) { echo $registered_students_count; } else { echo 'N/A'; } ?></h5>
                    </div>
                  </div>
				  <hr class="horizontal dark my-3">
                </div>
		  </div>
		  <div class="row">
			<div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded">attribution</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Writers</h6>
                      <span class="text-xs">Total count of book writers registered in library</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0"><?php if (isset($writers_count)) { echo $writers_count; } else { echo 'N/A'; } ?></h5>
                    </div>
                  </div>
				  <hr class="horizontal dark my-3">
                </div>
				<div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded">category</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Audio Books</h6>
                      <span class="text-xs">List of all audiobooks in the library</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0"><?php if (isset($audiobooks_count)) { echo $audiobooks_count; } else { echo 'N/A'; } ?></h5>
                    </div>
                  </div>
				  <hr class="horizontal dark my-3">
                </div>
				<div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded">pages</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Articles & Publications</h6>
                      <span class="text-xs">Total count of scholarly articles & publications </span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0"><?php if (isset($articles_count)) { echo $articles_count; } else { echo 'N/A'; } ?></h5>
                    </div>
                  </div>
				  <hr class="horizontal dark my-3">
                </div>
				<hr class="horizontal dark my-3">
		<div class="col-xl-12 mb-xl-0 mb-12">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl">
                  <img src="../../assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-500" alt="pattern-tree">
                  <span class="mask bg-gradient-dark opacity-10"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <div class="d-flex">
                      <div class="d-flex">
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Library Catalogue System</p>
                          <h6 class="text-white mb-0">Baze University</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		  </div>
		</div>
	  </div>
	</div>
  </main>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>
</html>
<?php
}else{
	header("location:../sign-in");
}
?>