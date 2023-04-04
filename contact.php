<!DOCTYPE html>
<?php
require 'conexion.php';
require 'message.php';
$db = new database();
$con = $db->conectar();




?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AMINS</title>
        <link rel="icon" type="image/x-icon" href="assets/amins.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html"><img src="assets/amins.ico">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="projects.html">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
      <!-- Contact-->
      <section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contáctanos</h2>
        </div>
        

        <form id="contactForm" action="contact.php" method="post" autocomplete="off">
            <?php
    if (isset($_POST['names'])) {
        $name = $_POST['names'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $campos = array();
        if ($name == "" || strlen($name) > 50) {
            $campos[] = "El nombre no puede estar en blanco ni contener más de 50 caracteres.";
        }

        if ($email == "" || strlen($email) > 50) {
            $campos[] = "El correo electrónico no puede estar en blanco ni contener más de 50 caracteres.";
        }

        if ($phone == "" || strlen($phone) != 10) {
            $campos[] = "El teléfono no puede estar en blanco y debe contener exactamente 10 caracteres.";
        }

        if ($message == "" || strlen($message) > 300) {
            $campos[] = "El mensaje no puede estar en blanco ni contener más de 300 caracteres.";
        }

        if (count($campos) > 0) {
            echo '<div class="alert alert-danger" role="alert">ERROR.</div>';
            foreach ($campos as $campo) {
                echo '<div class="alert alert-danger" role="alert">'.$campo.'</div>';
            }
        } else {
            $contact = registrar([$name, $email, $phone,$message], $con); 
            echo '<div class="alert alert-success" role="alert">Enviados correctamente.</div>';
        }
    }
?>

                <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        
                    <input type="text" name="names" id="names" placeholder="Ingrese su Nombre *" class="form-control" required>
        
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input type="email" name="email" id="email" placeholder="Ingrese su Email *" class="form-control" required>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input type="tel" name="phone" id="phone" placeholder="Ingrese su Telefono *" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea name="message" id="message" placeholder="Ingrese su Mensaje *" class="form-control" required></textarea>
    
                </div>
            </div>

            <div class="text-centers">
            <button type="submit"  class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</section>

       
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script src="js/scripts.js"></script>
    </body>
</html>
