<?php 
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link
      rel="stylesheet"
      href="fonts/material-icon/css/material-design-iconic-font.min.css"
    />

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="main">
      <!-- Sign up form -->
      <section class="signup">
        <div class="container">
          <div class="signup-content">
            <div class="signup-form">
              <h2 class="form-title">Sign up</h2>
              <form method="POST" class="register-form" id="register-form">
                <div class="form-group">
                  <label for="name"
                    ><i class="zmdi zmdi-account material-icons-name"></i
                  ></label>
                  <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Your Name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="email"><i class="zmdi zmdi-email"></i></label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Your Email"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                  <input
                    type="password"
                    name="pass"
                    id="pass"
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="re-pass"
                    ><i class="zmdi zmdi-lock-outline"></i
                  ></label>
                  <input
                    type="password"
                    name="re_pass"
                    id="re_pass"
                    placeholder="Repeat your password"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="checkbox"
                    name="agree-term"
                    id="agree-term"
                    class="agree-term"
                    required
                  />
                  <label for="agree-term" class="label-agree-term"
                    ><span><span></span></span>I agree all statements in
                    <a href="#" class="term-service">Terms of service</a></label
                  >
                </div>
                <div class="form-group form-button">
                  <input
                    type="submit"
                    name="submit"
                    id="submit"
                    class="form-submit"
                    value="Register"
                  />
                </div>
                   
    <!-- Donate Function -->

    <br>
    <?php    
    if(isset($_POST['submit'])){
                if($_POST['pass'] == $_POST['re_pass']){                  
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $re_pass = $_POST['re_pass'];
                    $hashpass = md5($pass);

                    // Mengecek apakah email sudah ada dalam tabel
                    $sql = "SELECT * FROM user WHERE useremail = '$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      // Jika email sudah ada, tampilkan pesan kesalahan atau lakukan tindakan lain
                      echo "Email sudah terdaftar.";
                  } else {$insert = mysqli_query($conn,"INSERT INTO user VALUES (                        
                    '".$name."',
                    '".$email."',
                    '".$pass."'
                )");

                if($insert){
                    echo '<script>alert("Register Berhasil")</script>'; 
                    echo '<script>window.location="login.php"</script>';                           
                    
                }else{
                    mysqli_error($conn);
                }
            }
                    
                  }else{
                    echo 'Password Salah';
                  }
                   
                    
                  }else{
                    
                  }
                ?>

              </form>
            </div>
            <div class="signup-image">
              <figure>
                <img src="images/signup-image.jpg" alt="sing up image" />
              </figure>
              <a href="login.php" class="signup-image-link"
                >I am already member</a
              >
            </div>
          </div>
        </div>
      </section>
    </div>

 

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
