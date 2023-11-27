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

            $okay = TRUE;
            
            if($okay){
                
                include_once './db_connection.php';
                
                $date = $_POST['date'];
                $bloodtype = $_POST['bloodtype'];
                $hospital = $_POST['hospital'];
                
                $sql = "INSERT INTO notification (date, bloodtype, hospital) VALUES ('$date', '$bloodtype', '$hospital');";
                $result = mysqli_query($conn, $sql);

                header("location: admin_view_notifications.php?notification added");
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
                        <a class="nav-link" aria-current="page" href="admin_homepage.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Notifications</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="add_notification.php">Add</a></li>
                                <li><a class="dropdown-item" href="admin_view_notifications.php">View</a></li>
                            </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="admin_appointment.php">Appointment</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="homepage.html">Users</a>
                    </li>
                </ul>
                
            </div>
            </div>
            </div>
        </nav>
        
        </br>
        </br>
        </br>
        
        <div class="container col-7 col-6" style="background: rgba(255, 255, 255, 0.25); box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2); border: 2px solid rgba(255, 255, 255, 0.5); height: 350px; border-radius: 10px;">
            
            <h2 style="text-align: center; font-family: fantasy; letter-spacing: 1px; padding-top: 5px;" class="text-white"><u>Add Notification Request</u></h2>
            
            
            <form action ="add_notification.php" method="post">
            <label class="col-4 offset-4 mb-2 text-white" style="text-align: center;">Blood Type :</label>
            </br>
            <select name="bloodtype" class="col-6 offset-3 mb-2" style="text-align: center;">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
                <option value="A">A-</option>
                <option value="A-">B-</option>
                <option value="AB-">AB-</option>
                <option value="O-">O-</option>
            </select>
            </br>
            
            
            <label class="col-4 offset-4 mb-2 text-white" style="text-align: center;">Hospital :</label>
            </br>
            <select name="hospital" class="col-6 offset-3 mb-2" style="text-align: center;">
                <option value="General">General</option>
                <option value="Adventist">Adventist</option>
                <option value="Lam Wah Ee">Lam Wah Ee</option>
                <option value="Pantai">Pantai</option>
            </select>
            </br>
            
            <label class="col-4 offset-4 mb-2 text-white" style="text-align: center;">Date :</label>
            </br>
            <input type="date" id="start" name="date" value="2023-11-26" min="2023-11-26" max="2025-11-26" class="col-6 offset-3 mb-4" style="text-align: center;"/>
            
            <p><input type = "submit" name = "submit" value = "Submit" class="col-4 offset-4" style="text-align: center; background: #FF0066; color: white;"/></p> 
            <input type = "hidden" name = "submitted" value = "true" />
            
            </form>
        </div>
        
        </br>
        </br>
        
        <footer class="bg-dark text-white pt-5 pb-4">
            
            <div class="container text-center text-md-left">
                
                <div class="row text-center text-md-left">
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Blood Donation</h5>
                        <p>Thank you for visiting our website!</p>
                    </div>
                    
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Links</h5>
                        <p><a href="admin_homepage.html" class="text-white" style="text-decoration: none;">Home</a></p>
                        <p><a href="account.php" class="text-white" style="text-decoration: none;">Account</a></p>
                        <p><a href="admin_view_notifications.html" class="text-white" style="text-decoration: none;">Notifications</a></p>
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