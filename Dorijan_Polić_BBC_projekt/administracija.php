<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="administracija.css">
    <link rel="icon" type="image/png" href="images/BBC_favicon.png">
    <title>BBC-Unos</title>
</head>
<body>
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
                    <li><a href="unos_forma.php">Unos</a></li>
                    <li><a href="#!">Administracija</a></li>
                </ul>
            </nav>
        </div> 
    </header>
    
    <?php 
    $naslov_stranice = "SVI UNESENI CLANCI";

    echo '<div class="naslov-boja">
        <div class="naslov">
            <h1>' . $naslov_stranice . '</h1>
        </div>
    </div>';
    ?>

    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $basename = "bbc-projekt";

        $dbc = mysqli_connect($servername, $username, $password, $basename) or
            die('Error connecting to MySQL server.' . mysqli_connect_error());

        if(isset($_SESSION['razina'])){
            $admin = $_SESSION['razina'];
            if($admin == 1){
                if ($dbc){
                    $query = "SELECT * FROM bbcvijesti";
                    $result = mysqli_query($dbc, $query);
    
                    while($row = mysqli_fetch_array($result)){
                        echo '<div class="obrazac">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="form-naslov">
                                        <label for="title">Naslov vijesti</label>
                                        <div>
                                            <input type="text" name="title" class="unos-naslov" value="'.$row['naslov'].'">
                                        </div>
                                    </div>
    
                                    <div class="form-kratki-opis">
                                        <label for="short-about">Kratki opis clanka</label>
                                        <div>
                                            <textarea name="short-about" cols="30" rows="5" class="unos">'.$row['sazetak'].'</textarea>
                                        </div>
                                    </div>
    
                                    <div class="form-sadrzaj">
                                        <label for="article-text">Sadrzaj clanka</label>
                                        <div>
                                            <textarea name="article-text" cols="30" rows="5" class="unos">'.$row['tekst'].'</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-kategorija">
                                        <label for="category">Kategorija vijesti</label>
                                        <div class="form-field">
                                            <select name="category" class="unos-kategorija">';
                                                if($row['kategorija'] == "news"){
                                                    echo '<option value="news" selected="true">News</option>
                                                        <option value="sport">Sport</option>';
                                                }
                                                elseif($row['kategorija'] == "sport"){
                                                    echo '<option value="news">News</option>
                                                        <option value="sport" selected="true">Sport</option>';
                                                }
                                            echo '</select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-slika">
                                        <label for="photo">Slika </label>
                                        <div class="form-field">
                                            <input type="file" accept="image/jpg" name="photo" value="'.$row['slika'].'"/>
                                        </div>
                                        <img src="'.'images/'.$row['slika'].'">
                                    </div>
                                    
                                    <div class="form-arhiva">
                                        <label>Spremiti u arhivu
                                        <div class="form-field">';
                                            if($row['arhiva'] == 0){
                                                echo '<input type="checkbox" name="archive" class="unos-arhiva" value="true">';
                                            }
                                            else {
                                                echo '<input type="checkbox" name="archive" class="unos-arhiva" value="true" checked="true">';
                                            }
                                            echo '</div>
                                        </label>
                                    </div>
    
                                    <div class="objavljeno">
                                        <p>Objavljeno: ' . $row['datum'] . '</p>
                                    </div>
    
                                    <div class="form-button">
                                        <button type="submit" name="update" value="Izmjeni">Izmjeni</button>
                                        <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                                    </div>
                                    <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                                </div>
                            </form>
                        </div>
                        <div class="clear">
                        </div>
                        ';
                    }
                }
                else {
                    echo "Neuspjelo spajanje sa bazom.";
                }
            }
            else {
                echo "<div class='before_login'>
                    <a href='login_registracija.php'> ULOGIRAJTE SE! </a>
                </div>
                <style>
                    .before_login {
                        text-align: center;
                    }
    
                    .before_login a {
                        text-decoration: none;
                        color: white;
                        background-color: rgb(126, 186, 255);
                        font-size: large;
                        padding: 15px;
                        border: 0.5px solid rgb(100, 100, 100);
                        border-radius: 10px;
                        box-shadow: 0 0 6px rgb(100, 100, 100);
                    }
                </style>";
            }
        }
        else {
            echo "<div class='before_login'>
                <a href='login_registracija.php'> ULOGIRAJTE SE! </a>
            </div>
            <style>
                .before_login {
                    text-align: center;
                }

                .before_login a {
                    text-decoration: none;
                    color: white;
                    background-color: rgb(126, 186, 255);
                    font-size: large;
                    padding: 15px;
                    border: 0.5px solid rgb(100, 100, 100);
                    border-radius: 10px;
                    box-shadow: 0 0 6px rgb(100, 100, 100);
                }
            </style>";
        }
    ?>

    <?php 
        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $query2 = "DELETE FROM bbcvijesti WHERE id = $id";
            $result2 = mysqli_query($dbc, $query2);

            echo "<script type='text/javascript'>
                location.href = 'administrator.php';
            </script>";
        }

        if(isset($_POST['update'])){
            $naslov_clanka = $_POST['title'];
            $kratki_opis = $_POST['short-about'];
            $sadrzaj_clanka = $_POST['article-text'];
            $kategorija = $_POST['category'];
            $slika_clanka = $_FILES['photo']['name'];
            if(isset($_POST['archive'])){
                $arhiva = 1;
            }
            else{
                $arhiva = 0;
            }
            $id = $_POST['id'];

            $temp_direktorij = 'images/' . $slika_clanka;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $temp_direktorij);

            $query2 = "UPDATE bbcvijesti SET naslov = '$naslov_clanka', sazetak = '$kratki_opis', tekst = '$sadrzaj_clanka', slika = '$slika_clanka', kategorija = '$kategorija', arhiva = '$arhiva' WHERE id = $id";
            $result2 = mysqli_query($dbc, $query2);

            echo "<script type='text/javascript'>
                location.href = 'administrator.php';
            </script>";
        }
    ?>

    <?php mysqli_close($dbc); ?>    

    <footer>
        <div class="footer-text">
            <hr>
            <p>Dorijan Polić - projekt za kolegij "Programiranje Web Aplikacija"</p>
        </div>
    </footer>
</body>
</html>