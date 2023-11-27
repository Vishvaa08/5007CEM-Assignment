<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "css/main.css" />
        <link rel = "stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <title> Admin Sign In </title>

        <style>

            body{
                background-image: url("images/bg3.jpg");
            }

        </style>

    </head>
    <body>

        <?php
        session_start();
        $error = '';
        if (isset($_POST['submitted'])) {

            if (empty($_POST['user_name']) || empty($_POST['password'])) {
                print '<p style = "color:white;" class = "error">Enter both username and password.</p>';
            } else {

                $hc_username = "Admin";
                $hc_password = "adminpass";

                $user_name = $_POST['user_name'];
                $password = $_POST['password'];

                if (($user_name == $hc_username) && ($password == $hc_password)) {
                    header('location: admin_homepage.php');
                } else {
                    print '<p style = "color:white;" class = "error">Invalid username or password!</p>';
                }
            }
        } else {
            print '<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fs-4" href="homepage.html">Blood Donation</a>
                <!-- Toggle Button -->
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- SideBar -->    
                <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <!-- SideBar Header -->    
                    <div class="offcanvas-header text-white border-bottom">

                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Blood Donation</h5>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                    </div>
                    <!-- SideBar Body -->    
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item mx-2">
                                <a class="nav-link" aria-current="page" href="homepage.html">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="account.html">Account</a></li>
                                    <li><a class="dropdown-item" href="register.php">Register</a></li>
                                    <li><a class="dropdown-item" href="sign_in.php">Sign In</a></li>
                                </ul>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="user_view_notifications.php">Notifications</a>
                            </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="appointment.php">Appointment</a>
                    </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container mt-4">

            <div style="background: rgba(255, 255, 255, 0.25); box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2); border: 2px solid rgba(255, 255, 255, 0.5)" class="card mb-3 ms-4 me-4">

                <div class="row">

                    <div class="col-12">
                        <h1 style="font-family: fantasy" class="text-center mt-2 text-white"><u> Admin Sign In</u></h1>
                    </div>

                    <form action = "admin_sign_in.php" method = "post">
                    <div class="col-6 col-lg-6 offset-3">
                        
                        <div class="mt-3 ms-3 me-3">
                            <input type="text" name="user_name" placeholder="User Name" id = "user_name" class="form-control"/>
                        </div>
                        <div class="mt-3 ms-3 me-3 mb-4">
                            <input type="text" name="password" placeholder="Password" id = "password" class="form-control"/>
                        </div>
                        
                    </div>

                        <p><input type = "submit" name = "submit" value = "Sign In" style="background: #FF0066" class="btn col-4 col-lg-4 offset-4 text-white"/></p>  
                        <input type = "hidden" name = "submitted" value = "true" />
                    </form>
                    <p style="font-size: 13px;" class="col-2 col-lg-2 offset-5 text-center pt-3 text-white">OR</p>

                    <div class="btnRegister">
                        <button style="background: #FF0066" type="button" class="btn col-4 col-lg-4 offset-4 mb-3 text-white">Register</button>
                    </div>
                    
                    <div class="col-6 col-lg-6 offset-3 text-white">
                    <p style="text-decoration:none; text-align: center; cursor: pointer;" id="admin_login" onclick="userLoginFunc()">I am a User...</p>
                    </div>

                </div>



            </div>

        </div>
        
        <script>
            function userLoginFunc(){
                window.location.href="sign_in.php";
            }
        </script>
        
        <footer class="bg-dark text-white pt-5 pb-4">
            
            <div class="container text-center text-md-left">
                
                <div class="row text-center text-md-left">
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Blood Donation</h5>
                        <p>Thank you for visiting our website!</p>
                    </div>
                    
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Links</h5>
                        <p><a href="homepage.html" class="text-white" style="text-decoration: none;">Home</a></p>
                        <p><a href="account.php" class="text-white" style="text-decoration: none;">Account</a></p>
                        <p><a href="user_view_notifications.php" class="text-white" style="text-decoration: none;">Notifications</a></p>
                        <p><a href="appointment.php" class="text-white" style="text-decoration: none;">Appointment</a></p>
                        <p><a href="contact.php" class="text-white" style="text-decoration: none;">Contact</a></p>
                        <p><a href="about.html" class="text-white" style="text-decoration: none;">About</a></p>
                    </div>
                    
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contacts</h5>
                        <p><i class="fas fa-home mr-3"></i> 11900, Bayan Lepas, Penang</p>
                        <p><i class="fas fa-envelope mr-3"></i> pantaihosp@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> 04-6433888</p>
                    </div>
                    
                </div>
                
                <hr class="mb-4">
                
                <div class="row align-items-center">
                    
                    <div class="col-12 col-md-6">
                        <p>Copyright All rights reserved by <span class="text-warning"> VISHVAA</span>.</p>
                    </div>
                    
                </div>
                
            </div>
            
        </footer>';
        }
        ?>

    </body>
</html>