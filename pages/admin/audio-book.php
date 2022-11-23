<?php
session_start();
//include session file on all user panel pages
include("../includes/config.php");

if(isset($_POST['add_audio'])){
	$target_dir = "../../assets/audio/";
	$target_file = $target_dir . basename($_FILES["audio_file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Allow certain file formats
	if($imageFileType != "mp3"  ) {
	  echo "
				<div class='alert alert-danger alert-dismissible text-white' role='alert'>
				<span class='text-sm'>Sorry, only MP3 files are allowed!!</span>
				</div>
			";
	  $uploadOk = 0;
	}
	$audio_title = $_POST['audio_title'];
	$writer_id = $_POST['writer_id'];
	$date = date('Y-m-d');
	
	if ($uploadOk == 0) {
	  echo "
				<div class='alert alert-danger alert-dismissible text-white' role='alert'>
				<span class='text-sm'>Problem updating audio file, File type not valid!</span>
				</div>
			";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["audio_fie"]["tmp_name"], $target_file)) {
		$query = "INSERT INTO audiobooks (audio_title, writer_id, audio_file, created_date) VALUES ('$audio_title', '$writer_id', '$target_file', '$date')";
		if (mysqli_query($conn, $query)) {
			sleep(5);
			echo "
				<div class='alert alert-success alert-dismissible text-white' role='alert' id='success_element'>
				<span class='text-sm'>Audiobook added succesfully!!</span>
				<button type='button' class='btn-close text-lg py-3 opacity-10' data-bs-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				</div>
			";
		} else {
			echo "
				<div class='alert alert-danger alert-dismissible text-white' role='alert'>
				<span class='text-sm'>Audiobook creation unsuccessful, Try Again!</span>
				</div>
			";
		}
	  } else {
		echo "
				<div class='alert alert-danger alert-dismissible text-white' role='alert'>
				<span class='text-sm'>Problem uploading audio file, Try Again!</span>
				</div>
			";
	  }
	}
	
	
}

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
          <a class="nav-link text-white" href="dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="library-groups">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">diversity_2</i>
            </div>
            <span class="nav-link-text ms-1">Library Groups</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="writers">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">psychology</i>
            </div>
            <span class="nav-link-text ms-1">Writers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="books">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded">auto_stories</i>
            </div>
            <span class="nav-link-text ms-1">Physical Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="audio-book">
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
          <h6 class="font-weight-bolder mb-0">Audiobooks</h6>
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
			<div class="col-md-12 mb-lg-0 mb-4">
				  <div class="card mt-4">
					<div class="card-header pb-0 p-3">
					  <div class="row">
						<div class="col-6 d-flex align-items-center">
						  <h6 class="mb-0">Add / Manage Audiobooks</h6>
						</div>
					  </div>
					</div>
				  </div>
				  <hr class="horizontal dark my-3">
				</div>
		</div>
		<div class="row">
		<div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Add Audiobook</h6>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
			<div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-xl bg-gradient-primary shadow text-center border-radius-xl">
                        <i class="material-symbols-rounded">play_lesson</i>
                      </div>
                    </div>
				<form enctype="multipart/form-data" class="text-start" method="POST">
					<div class="row">
						<div class="col-md-6">
						  <div class="input-group input-group-outline my-3">
							<label class="form-label">Audio Title</label>
							<input type="text" name="audio_title" class="form-control" required>
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="input-group input-group-outline my-3">
							<select name="writer_id" class="form-select" required>
								<?php
									$query    = "SELECT * FROM `writers`";
									$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									  // output data of each row
									  while($row = mysqli_fetch_assoc($result)) {
										echo " <option value='".$row['id']."'>".$row['writer_name']."</option> ";
									  }
									}
								?>
							</select>
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="input-group input-group-outline my-3">
							<input type="file" name="audio_file" class="form-control" required>
						  </div>
						</div>
					</div>
					  <div class="text-center">
						<button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="add_audio">Add</button>
					  </div>
					</form>
            </div>
          </div>
        </div>
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Manage Audiobooks</h6>
            </div>
            <div class="card-body pt-4 p-3">
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
										  <a class='btn btn-link text-danger text-gradient px-3 mb-0' href='../includes/function?audio_id=".$row['id']."'><i class='material-icons text-sm me-2'>delete</i>Delete</a>
										</div>
									  </div>
									  <hr class='horizontal dark my-3'>
									</div>
								";
							}
						}else{
							echo "
									<div class='col-md-3 col-6'>
									  <div class='card'>
										<div class='card-header p-3 text-center'>
											<div class='icon icon-shape icon-xl bg-gradient-primary shadow text-center border-radius-xl'>
												<i class='material-symbols-rounded'>slow_motion_video</i>
											  </div>
										</div>
										<div class='card-body pt-0 p-3 text-center'>
										  <h6 class='text-center text-xs'>N/A</h6>
										  <audio controls class='col-12'>
											<source src='N/A' type='audio/mpeg'>
											Your browser does not support the audio element.
										  </audio>
										  <a class='btn btn-link text-danger text-gradient px-3 mb-0' href='#'><i class='material-icons text-sm me-2'>delete</i>Delete</a>
										</div>
									  </div>
									  <hr class='horizontal dark my-3'>
									</div>
									<div class='col-md-3 col-6'>
									  <div class='card'>
										<div class='card-header p-3 text-center'>
											<div class='icon icon-shape icon-xl bg-gradient-primary shadow text-center border-radius-xl'>
												<i class='material-symbols-rounded'>slow_motion_video</i>
											  </div>
										</div>
										<div class='card-body pt-0 p-3 text-center'>
										  <h6 class='text-center text-xs'>N/A</h6>
										  <audio controls class='col-12'>
											<source src='N/A' type='audio/mpeg'>
											Your browser does not support the audio element.
										  </audio>
										  <a class='btn btn-link text-danger text-gradient px-3 mb-0' href='#'><i class='material-icons text-sm me-2'>delete</i>Delete</a>
										</div>
									  </div>
									  <hr class='horizontal dark my-3'>
									</div>
								";
						}
					?>
					
				</div>
            </div>
          </div>
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