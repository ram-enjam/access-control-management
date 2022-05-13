
<?php require_once(APPPATH . 'views/includes/header.php'); ?>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">User Registration</h1>
                  </div>
                  <form name="form" action="save_register.php" method="POST">
                    <div class="form-group">
                      <label>User Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputFirstName" placeholder="Enter User Name" required>
                    </div>
                    <!-- <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" id="exampleInputLastName" placeholder="Enter Last Name">
                    </div> -->
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" name="email" required>
                    </div> 


                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="text" class="form-control" id="mobile" 
                        placeholder="Enter Mobile Number"  maxlength="10" minlength="10" name="mobile" onkeyup="myFunction()" required>
                    </div>

                   <div class="form-group">
                      <label>Aadhar Number</label>
                      <input type="text" class="form-control" id="aadhar" 
                        placeholder="Enter Aadhar Number" name="adhar" onkeyup="myFunction_new()" maxlength="12" minlength="12" required>
                    </div>



                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="psw" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                      <label>Repeat Password</label>
                      <input type="password" class="form-control" id="psw1"
                        placeholder="Repeat Password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <hr>
                    <!-- <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a> -->
                  </form>
           
                  <div class="text-center">
                    <a class="font-weight-bold small" href="<?php echo base_url() ?>">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <?php require_once(APPPATH . 'views/includes/footer.php'); ?>

<script type="text/javascript">
    window.onload = function () {
      document.getElementById("psw").onchange = validatePassword;
      document.getElementById("psw1").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("psw1").value;
      var pass1 = document.getElementById("psw").value;
      if (pass1 != pass2)
        document.getElementById("psw1").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("psw1").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <script>
function myFunction() {
  var mobile = document.getElementById("mobile").value;
 

 if(isNaN(mobile)) {

   alert("Plz Enter Numbers Only");
   return false;

 }
 else {

  return true;
 }
 
  
  
   
}
function myFunction_new() {
 
  var aadhar = document.getElementById("aadhar").value;
 

 if(isNaN(aadhar)) {

   alert("Plz Enter Numbers Only");
   return false;

 }
 else {

  return true;
 }
 
  
   
}

</script>
</body>
</html>