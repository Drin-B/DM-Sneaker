<?php
include_once 'database.php';
include_once 'user.php';

if(isset($_POST['register'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $connection = $db->getConnection();
        $user = new User($connection);

        // Get form data
        $name = $_POST['namer'];
        $email = $_POST['emailr'];
        $password = $_POST['passwordr'];

        // Register the user
        if ($user->register($name, $email, $password)) {
            header("Location: login.php"); // Redirect to login page
            exit;
        } else {
            echo "Error registering user!";
        }
    }
}

if(isset($_POST['login'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $connection = $db->getConnection();
        $user = new User($connection);

        // Get form data
        $email = $_POST['emaill'];
        $password = $_POST['passwordl'];

        // Attempt to log in
        if ($user->login($email, $password)) {
            header("Location: Ballina.php"); // Redirect to home page
            exit;
        } else {
            echo "Invalid login credentials!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="Hyrja.css">
</head>
<body>


 <header>
        <nav class="navbar">
            <div class="logo">
                <img src="DM.png" alt="Logo"> 
            </div>
            <ul>
                <li><a href="Ballina.php">Ballina</a></li>
                <li><a href="Produktett.php">Produktet</a></li>
                <li><a href="rrethnesh.php">Rreth Nesh</a></li>
                 <li><a href="Kontakti.php">Kontakti</a></li>
                <li><a href="Hyrja.php">Hyrja</a></li>
            </ul>
        </nav>
    </header>


<main>
    <h2>Mirë se vini</h2>
    

    <div class="container">
        <div class="form-box">

            <div class="button-box">
                <div id="btn-indicator"></div>
                <button class="toggle-btn" onclick="showLogin()">Hyr</button>
                <button class="toggle-btn" onclick="showRegister()">Regjistrohu</button>
            </div>

            <form id="loginForm" class="input-group">
                <input id="loginEmail" type="email" class="input-field" placeholder="Email" name="emaill" required>
                <input id="loginPassword" type="password" class="input-field" placeholder="Password" name="passwordl" required>
                <div id="loginError" class="error-msg"></div>
                <button type="submit" class="submit-btn" name="login">Hyr</button>
            </form>

            <form id="registerForm" class="input-group">
                <input id="registerName" type="text" class="input-field" placeholder="Name" name="namer" required>
                <input id="registerEmail" type="email" class="input-field" placeholder="Email" name="emailr" required>
                <input id="registerPassword" type="password" class="input-field" placeholder="Password" name="passwordr" required>
                <input id="registerConfirmPassword" type="password" class="input-field" placeholder="Confirm Password" required>
                <div id="registerError" class="error-msg"></div>
                <button type="submit" class="submit-btn" name="register">Regjistrohu</button>
            </form>

        </div>
    </div>
</main>

 <footer>
        <p>&copy; 2024 DM Sneakers.</p>
        <p>Adresa: Rruga B, Prishtinë | Tel: +383 (0)42 123 456</p>
        <p>Email: info@dmsneakers.com</p>
    </footer>

<script src="Hyrja.js"></script>
</body>
</html>