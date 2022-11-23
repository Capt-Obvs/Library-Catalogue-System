<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['sign-in'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	echo $role;
 	if ($role == 'student'){
		// Check user is exist in the database
		$query    = "SELECT * FROM `registered_students` WHERE email='$email'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		  while($row = mysqli_fetch_assoc($result)) {
			$check_password = $row['password'];
			if(password_verify($password, $check_password)){
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['reg_no'] = $row['reg_no'];
				echo "
					<div class='alert alert-success alert-dismissible text-white' role='alert'>
					<span class='text-sm'>Login Successful!!! Redirecting to dashboard, hold on!</span>
					</div>
				";
				sleep(5);
				echo "<script type='text/javascript'> document.location ='dashboard'; </script>";
			}else{
				echo "
					<div class='alert alert-danger alert-dismissible text-white' role='alert'>
					<span class='text-sm'>Login Unsuccesful, Invalid Password!</span>
					</div>
				";
			}
		  }
		} else {
			echo "
					<div class='alert alert-warning alert-dismissible text-white' role='alert'>
					<span class='text-sm'>No Account attached to email ".$email.", <a href='sign-up' class='alert-link text-white'>Create an account now!</a></span>
					</div>
				";
		}
	} else if ($role == 'admin'){
		// Check user is exist in the database
		$queryz    = "SELECT * FROM `admin` WHERE email='$email' ";
		$result = mysqli_query($conn, $queryz);
		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		  while($row = mysqli_fetch_assoc($result)) {
			$check_password = $row['password'];
			if(password_verify($password, $check_password)){
				$_SESSION['admin_id'] = $row['id'];
				echo "
					<div class='alert alert-success alert-dismissible text-white' role='alert' id='success_element'>
					<span class='text-sm'>Login Successful!!! Redirecting to dashboard, hold on!</span>
					</div>
				";
				sleep(5);
				echo "<script type='text/javascript'> document.location ='admin/dashboard'; </script>";
			}else{
				echo "
					<div class='alert alert-danger alert-dismissible text-white' role='alert'>
					<span class='text-sm'>Login Unsuccesful, Invalid Password!</span>
					</div>
				";
			}
		  }
		} else {
			echo "
					<div class='alert alert-warning alert-dismissible text-white' role='alert'>
					<span class='text-sm'>No Account attached to email ".$email.", contact web administrator for admin account!!</a></span>
					</div>
				";
		}
	}else{
		echo "Nothing";
	}
}
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
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	  <!-- CSS Files -->
	  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
	</head>

	<body class="bg-gray-200">
	  <div class="container position-sticky z-index-sticky top-0">
		<div class="row">
		  <div class="col-12">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
			  <div class="container-fluid ps-2 pe-0">
				<a class="navbar-brand align-items-center font-weight-bolder ms-lg-0 ms-3 " href="https://www.bazeuniversity.edu.ng/">
				  Baze University
				</a>
			  </div>
			</nav>
			<!-- End Navbar -->
		  </div>
		</div>
	  </div>
	  <main class="main-content  mt-0">
		<div class="page-header align-items-start min-vh-100" style="background-image: url('../assets/img/login_background.jpg')">
		  <span class="mask bg-gradient-dark opacity-6"></span>
		  <div class="container my-auto">
			<div class="row">
			  <div class="col-lg-4 col-md-8 col-12 mx-auto">
				<div class="card z-index-0 fadeIn3 fadeInBottom">
				  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1 d-flex align-items-center">
					<img src="../assets/img/illustrations/dark-lock-ill.png" alt="login" width="100" height="50">
					<h6 class="text-white text-center mt-2 mb-0">Admin || Student Login</h6>
					</div>
				  </div>
				  <div class="card-body">
					<form class="text-start" method="POST">
					  <div class="input-group input-group-outline my-3">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control" required>
					  </div>
					  <div class="input-group input-group-outline my-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required>
					  </div>
					  <div class="input-group input-group-outline my-3">
						<select name="role" class="form-select" required>
							<option>Click here to choose role</option>
							<option value="admin">Admin</option>
							<option value="student">Student</option>
						</select>
					  </div>
					  <div class="form-check form-switch d-flex align-items-center mb-3">
						<input class="form-check-input" type="checkbox" id="rememberMe">
						<label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
					  </div>
					  <div class="text-center">
						<button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="sign-in">Sign in</button>
					  </div>
					  <p class="mt-4 text-sm text-center">
						Don't have a student account?
						<a href="sign-up" class="text-primary text-gradient font-weight-bold">Create Account</a>
					  </p>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		  <footer class="footer position-absolute bottom-2 py-2 w-100">
			<div class="container">
			  <div class="row align-items-center justify-content-lg-between">
				<div class="col-12 col-md-6 my-auto">
				  <div class="copyright text-center text-sm text-white text-lg-start">
					© <script>
					  document.write(new Date().getFullYear())
					</script>,
					made with <i class="fa fa-heart" aria-hidden="true"></i> by
					<a class="font-weight-bold text-white" target="_blank">Adnan Musa</a>
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