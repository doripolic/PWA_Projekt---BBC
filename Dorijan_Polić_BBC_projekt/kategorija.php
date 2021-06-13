<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="kategorija_style.css">
    <link rel="icon" type="image/png" href="images/BBC_favicon.png">
    <title>BBC-HomePage</title>
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

    <?php include 'konekcija.php'; ?>

        <?php
            $kategorija_clanka = $_GET['id'];

            if ($dbc){
                $query = "SELECT * FROM bbcvijesti WHERE arhiva=1 AND kategorija='$kategorija_clanka'";
                $result = mysqli_query($dbc, $query);
                
                if($_GET['id'] == "news"){
                    $boja = 'red';
                }
                elseif($_GET['id'] == "sport") {
                    $boja = 'rgb(255, 208, 0)';
                }
                    echo '<style>
                        .kategorija {
                        background-color:' . $boja .';
                    }
                    </style>';
                    echo '<div class="kategorija">
                        <div class="ime_kategorije">
                            <h1>' . strtoupper($_GET['id']) . '</h1>
                        </div>
                    </div>
                <section class="svi-clanci">
                    <div class="articles">';
                    while($row = mysqli_fetch_array($result)){
                        echo '<article>
                            <div class="article-slika">
                                <a href="clanak.php?id=' . $row['id'] . ' "><img src="'.'images/'.$row['slika'].'"></a>
                            </div>
                            <a href="clanak.php?id=' . $row['id'] . ' "><h3>' . $row['naslov'] . '</h3></a>
                            <p>' . $row['sazetak'] . '</p>
                            </article>';
                    }
                    echo '</div>
               </section>';
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