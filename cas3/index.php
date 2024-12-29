<?php
    
    require "dbBroker.php";
    require "model/user.php";

    session_start();

    if(isset($_POST['username'])&& isset($_POST['password'])) {
        $uname = $_POST['username'];
        $upassword = $_POST['password'];

        //$conn = new mysqli();

        $korisnik = new User(1, $uname, $upassword);

        // $odgovor = $korisnik->logInUser($korisnik, $conn); ------ ako je logInUser nestaticka funkcija

        $odgovor = User::logInUser($korisnik, $conn); // ------- moze zato sto je logInUser() staticka funkcija

        if($odgovor->num_rows == 1) { 
            echo `<script>console.log("Uspesno ste se ulogovali");</script>`;

            $_SESSION['user_id'] = $korisnik->id;
            header('Location: home.php');
            exit();
        } else {
            Echo `<script>console.log("Niste se prijavili");</script>`;
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>