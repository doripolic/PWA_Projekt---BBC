<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="clanak_style.css">
    <title>BBC-Clanak</title>
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
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>
        </div> 
    </header>

    <?php include 'konekcija.php'; 

    $id_clanka = $_GET["id"];

    if ($dbc){
        $query = "SELECT * FROM bbcvijesti WHERE id = $id_clanka";
        $result = mysqli_query($dbc, $query);

        while($row = mysqli_fetch_array($result)){
            if($row['kategorija'] == "news"){
                $boja = 'red';
            }
            elseif($row['kategorija'] == "sport") {
                $boja = 'rgb(255, 208, 0)';
            }
                echo '<style>
                    .kategorija {
                    background-color:' . $boja .';
                }
                </style>';
                echo '<div class="kategorija">
                    <div class="ime_kategorije">
                        <h1>' . strtoupper($row['kategorija']) . '</h1>
                    </div>
                </div>
                <div class="naslov_clanka">
                    <h2>' . $row['naslov'] . '</h2>
                </div>
                <div class="slika_clanka">
                    <img src="'.'images/'.$row['slika'].'">
                </div>
                <div class="opis_clanka">
                    <p>' . $row['sazetak'] . '</p>
                </div>
                <div class="sadrzaj_clanka">
                    <p>' . $row['tekst'] . '</p>
                </div>';
        }
    }
    else {
        echo "Neuspjelo spajanje s bazom.";
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