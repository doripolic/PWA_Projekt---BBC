<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login_registracija_style.css">
    <link rel="icon" type="image/png" href="images/BBC_favicon.png">
    <title>BBC-Login/Register</title>
</head>
<body onload = "load()">
    <header>
        <div class="navigacija">
            <div class="logo">
                <img src="images/BBC_logo.png">
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="kategorija.php?id=news">News</a></li>
                    <li><a href="kategorija.php?id=sport">Sport</a></li>
                    <li><a href="#!">Unos</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>
        </div> 
    </header>
    
    <div class="naslov-boja">
        <div class="naslov">
            <h1 id="naslov"></h1>
        </div>
    </div>

    <div class="login" id="hide_login">
        <div class="login-forma">
            <form action="login_registracija.php" method="post" enctype="multipart/form-data">
                <div class="form-odsjecak">
                    <label for="username">Korisnicko ime</label>
                    <br>
                    <span id="errorUsername" class="errorBoja"></span>
                    <div>
                        <input type="text" name="username" id="username" class="unos-username">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <label for="password">Lozinka</label>
                    <br>
                    <span id="errorPassword" class="errorBoja"></span>
                    <div>
                        <input type="password" name="password" id="password" class="unos-password">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <button type="submit" name="ulogirajse" id="ulogirajse" value="Prihvati">Log in</button>
                </div>
            </form>
        </div>

        <div class="clear"></div>
        
        <div class="registracija-upit">
            <button type="submit" name="switch_to_register" id="switch_to_register">Nemas racun? Registriraj se</button>
        </div>

    </div>

    <div class="register" id="hide_register">    
        <div class="register-forma">
            <form action="login_registracija.php" method="post" enctype="multipart/form-data">
                <div class="form-odsjecak">
                    <label for="name">Ime</label>
                    <br>
                    <span id="errorName" class="errorBoja"></span>
                    <div>
                        <input type="text" name="name" id="name" class="unos-name">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <label for="surname">Prezime</label>
                    <br>
                    <span id="errorSurname" class="errorBoja"></span>
                    <div>
                        <input type="text" name="surname" id="surname" class="unos-surname">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <label for="reg_username">Korisnicko ime</label>
                    <br>
                    <span id="errorRegUsername" class="errorBoja"></span>
                    <div>
                        <input type="text" name="reg_username" id="reg_username" class="unos-reg-username">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <label for="reg_password">Lozinka</label>
                    <br>
                    <span id="errorRegPassword" class="errorBoja"></span>
                    <div>
                        <input type="password" name="reg_password" id="reg_password" class="unos-reg-password">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <label for="reg_password2">Ponovljena lozinka</label>
                    <br>
                    <span id="errorRegPassword2" class="errorBoja"></span>
                    <div>
                        <input type="password" name="reg_password2" id="reg_password2" class="unos-reg-password">
                    </div>
                </div>

                <div class="form-odsjecak">
                    <button type="submit" name="registrirajse" id="registrirajse" value="Prihvati">Register</button>
                </div>
            </form>
        </div>

        <div class="clear"></div>
        
        <div class="login-upit">
            <button type="submit" name="switch_to_login" id="switch_to_login">Vec imas racun? Ulogiraj se</button>
        </div>
    </div>

    <footer>
        <div class="footer-text">
            <hr>
            <p>Dorijan Polić - projekt za kolegij "Programiranje Web Aplikacija"</p>
        </div>
    </footer>

    <script type="text/javascript" name="login_validation">
        document.getElementById("ulogirajse").onclick = function(event) {
            var dobraForma = true;

            var unosUser = document.getElementById("username");
            var user = document.getElementById("username").value;
            if (user.length == 0) {
                dobraForma = false;
                unosUser.style.border = "2px dashed red";
                document.getElementById("errorUsername").innerHTML ="Korisnicko ime mora biti uneseno!<br>";
            }
            else {
                unosUser.style.border = "3px solid green";
                document.getElementById("errorUsername").innerHTML = "";
            }

            var unosPass = document.getElementById("password");
            var pass = document.getElementById("password").value;
            if (pass.length == 0) {
                dobraForma = false;
                unosPass.style.border = "2px dashed red";
                document.getElementById("errorPassword").innerHTML ="Lozinka mora biti unesena!<br>";
            }
            else {
                unosPass.style.border = "3px solid green";
                document.getElementById("errorPassword").innerHTML = "";
            }
            
            if (dobraForma != true){
                event.preventDefault();
            }
            
        };
    </script>

    <script type="text/javascript" name="register_validation">
        document.getElementById("registrirajse").onclick = function(event){
            var dobraForma = true;

            var unosName = document.getElementById("name");
            var name = document.getElementById("name").value;
            if (name.length == 0) {
                dobraForma = false;
                unosName.style.border = "2px dashed red";
                document.getElementById("errorName").innerHTML ="Ime mora bit uneseno!";
            }
            else {
                unosName.style.border = "3px solid green";
                document.getElementById("errorName").innerHTML = "";
            }

            var unosSurname = document.getElementById("surname");
            var surname = document.getElementById("surname").value;
            if (surname.length == 0) {
                dobraForma = false;
                unosSurname.style.border = "2px dashed red";
                document.getElementById("errorSurname").innerHTML ="Prezime mora bit uneseno!";
            }
            else {
                unosSurname.style.border = "3px solid green";
                document.getElementById("errorSurname").innerHTML = "";
            }

            var unosRegUsername = document.getElementById("reg_username");
            var regUsername = document.getElementById("reg_username").value;
            if (regUsername.length == 0) {
                dobraForma = false;
                unosRegUsername.style.border = "2px dashed red";
                document.getElementById("errorRegUsername").innerHTML ="Korisnicko ime mora bit uneseno!";
            }
            else {
                unosRegUsername.style.border = "3px solid green";
                document.getElementById("errorRegUsername").innerHTML = "";
            }

            var unosRegPassword = document.getElementById("reg_password");
            var regPassword = document.getElementById("reg_password").value;
            var unosRegPassword2 = document.getElementById("reg_password2");
            var regPassword2 = document.getElementById("reg_password2").value;
            
            if (regPassword.length == 0) {
                dobraForma = false;
                unosRegPassword.style.border = "2px dashed red";
                document.getElementById("errorRegPassword").innerHTML ="Lozinka mora biti unesena!";
            }
            else {
                unosRegPassword.style.border = "3px solid green";
                document.getElementById("errorRegPassword").innerHTML = "";
            }

            if (regPassword2.length == 0) {
                dobraForma = false;
                unosRegPassword2.style.border = "2px dashed red";
                document.getElementById("errorRegPassword2").innerHTML ="Ponovljena lozinka mora biti unesena!";
            }
            else {
                unosRegPassword2.style.border = "3px solid green";
                document.getElementById("errorRegPassword2").innerHTML = "";
            }

            if (regPassword.length != 0 && regPassword2.length != 0 && regPassword != regPassword2){
                unosRegPassword.style.border = "2px dashed red";
                unosRegPassword2.style.border = "2px dashed red";
                document.getElementById("errorRegPassword").innerHTML = "Lozinke se ne podudaraju!";
                document.getElementById("errorRegPassword2").innerHTML = "Lozinke se ne podudaraju!";
            }

            if (dobraForma != true){
                event.preventDefault();
            }
            else{
                location.reload();
            }
        }
    </script>

    <script type="text/javascript" name="load">
        function load(){
            var register = document.getElementById("hide_register");
            register.style.display = "none";
            
            document.getElementById("naslov").innerHTML = "LOGIN";
        }
    </script>
    

    <script type="text/javascript" name="switch_between">
        document.getElementById("switch_to_register").onclick = function(event){
            var login = document.getElementById("hide_login");
            var register = document.getElementById("hide_register");

            login.style.display = "none";
            register.style.display = "block";

            document.getElementById("naslov").innerHTML = "REGISTER";
        }

        document.getElementById("switch_to_login").onclick = function(event){
            var login = document.getElementById("hide_login");
            var register = document.getElementById("hide_register");

            login.style.display = "block";
            register.style.display = "none";


            document.getElementById("naslov").innerHTML = "LOGIN";
        }
    </script>
</body>
</html>

<?php
    if(isset($_POST['registrirajse'])){
        include 'konekcija.php';

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $reg_username = $_POST['reg_username'];
        $reg_password = $_POST['reg_password'];
        $hashed_password = password_hash($reg_password, CRYPT_BLOWFISH);
        $razina_prava = 0;
        $reg_uspjeh = '';

        $query = "SELECT korisnicko_ime FROM bbckorisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query)){
            mysqli_stmt_bind_param($stmt, 's', $reg_username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if (mysqli_stmt_num_rows($stmt) > 0){
            echo "Korisnik vec postoji!";
        }
        else{
            $query2 = "INSERT INTO bbckorisnik (korisnicko_ime, ime, prezime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $query2)){
                mysqli_stmt_bind_param($stmt, 'ssssi', $reg_username, $name, $surname, $hashed_password, $razina_prava);
                mysqli_stmt_execute($stmt);
                $reg_uspjeh = true;
            }
        }
        if($reg_uspjeh == true){
            echo "Korisnik uspjesno registriran!";
        }
        else {
            "Doslo je do pogreske.";
        }
    }

    if(isset($_POST['ulogirajse'])){
        include 'konekcija.php';

        $username_input = $_POST['username'];
        $password_input = $_POST['password'];

        $query3 = "SELECT korisnicko_ime, lozinka, razina FROM bbckorisnik WHERE korisnicko_ime = ?";
        
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query3)){
            mysqli_stmt_bind_param($stmt, 's', $username_input);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        mysqli_stmt_bind_result($stmt, $username_baza, $password_baza, $razina_baza);
        mysqli_stmt_fetch($stmt);

        if(password_verify($_POST['password'], $password_baza) && mysqli_stmt_num_rows($stmt) > 0){
            $login_success = true;
            
            if($razina_baza == 1){
                $admin = true;
            }
            else {
                $admin = false;
            }
            $_SESSION['username'] = $username_baza;
            $_SESSION['razina'] = $razina_baza;
        }
        else {
            $login_success = false;
        }

        if ($login_success == true && $admin == true){
            $_SESSION['poruka'] = "Uspjesno ste ulogirani " . $username_baza . ", te ste administrator.";
        }
        elseif($login_success == true && $admin == false){
            $_SESSION['poruka'] =  "Uspjesno ste se ulogirali ali nazalost nemate administracijska prava. Molim ponovite login sa username-om koji ima administracijska prava.";
        }
        else {
            $_SESSION['poruka'] =  "Neuspjesan login.";
        }

        echo '<script type=text/javascript>
            location.href="after_login.php";
        </script>';
    }
?>