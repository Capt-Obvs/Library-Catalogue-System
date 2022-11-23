<?php
include('includes/config.php');

if(isset($_POST['sign-up'])){
	$full_name = $_POST['full_name'];
	$reg_no = $_POST['reg_no'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$password = password_hash($pass, PASSWORD_DEFAULT);
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$date = date('Y-m-d');
	
	$query = "INSERT INTO registered_students (full_name, reg_no, email, password, faculty_id, department_id, created_date) VALUES ('$full_name', '$reg_no', '$email', '$password', '$faculty', '$department', '$date')";
	if (mysqli_query($conn, $query)) {
		echo "
			<div class='alert alert-success alert-dismissible text-white' role='alert' id='success_element'>
			<span class='text-sm'>Registration Successful!!! Redirecting to login, hold on!</span>
			</div>
		";
		sleep(5);
		echo "<script type='text/javascript'> document.location ='sign-in'; </script>";
	} else {
		echo "
			<div class='alert alert-danger alert-dismissible text-white' role='alert'>
			<span class='text-sm'>Registration Unsuccesful, Try Again!</span>
			</div>
		";
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

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Create Account</h4>
                </div>
                <div class="card-body">
                  <form class="text-start" method="POST">
                    <div class="row">
						<div class="col-md-6">
							<div class="input-group input-group-outline mb-3">
							  <label class="form-label">Full Name</label>
							  <input type="text" name="full_name" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group input-group-outline mb-3">
							  <label class="form-label">Student Registration No</label>
							  <input type="text" name="reg_no" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group input-group-outline mb-3">
							  <label class="form-label">Email</label>
							  <input type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group input-group-outline mb-3">
							  <label class="form-label">Password</label>
							  <input type="password" name="password" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group input-group-outline mb-3">
								<select name="faculty" class="form-select" required>
								  <?php
									$query    = "SELECT * FROM `faculty`";
									$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									  // output data of each row
									  while($row = mysqli_fetch_assoc($result)) {
										echo " <option value='".$row['id']."'>".$row['faculty_name']."</option> ";
									  }
									}
								  ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group input-group-outline mb-3">
								<select name="department" class="form-select" required>
								  <?php
									$query    = "SELECT * FROM `department`";
									$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									  // output data of each row
									  while($row = mysqli_fetch_assoc($result)) {
										echo " <option value='".$row['id']."'>".$row['department_name']."</option> ";
									  }
									}
								  ?>
								</select>
							</div>
						</div>
					</div>
					<hr class='horizontal dark my-3'>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="sign-up" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have a student account?
                    <a href="sign-in" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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