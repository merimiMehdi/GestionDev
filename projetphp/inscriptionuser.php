<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription User</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <?php

    $dsn = 'mysql:host=localhost;dbname=gestiondev';
    $user = 'root';
    $pswrd = '';



    try {
        $con = new PDO($dsn, $user, $pswrd);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['submit'])) {

            if (empty($_POST['name']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password'])) {
                echo "3mr a7madi rah khawi had chi";
            } else {
                $nom = $_POST['name'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $hash_pass = password_hash($password, PASSWORD_DEFAULT);
                
                $insert = "INSERT INTO user_table (nom_user, prenom_user, email_user, password_user) VALUES ('$nom', '$prenom', '$email', '$hash_pass')";
                $con->exec($insert);
                header("location: loginuser.php");
            }
        }
    } catch (PDOException $e) {
        echo "failed" . $e->getMessage();
    }

    ?>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Inscription</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Firstname" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="prenom" id="prenom" placeholder="Your Lastname" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib https://colorlib.com) -->

</html>