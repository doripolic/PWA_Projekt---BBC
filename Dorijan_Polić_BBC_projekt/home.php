<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home_style.css">
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
    
    <div class="welcome-text">
        <h2>Welcome to BBC.com</h2>
        <p><?php echo date("l, j F");?></p>
    </div>

    <section class="sekcija-news">
        <?php
            if ($dbc){
                $query = "SELECT * FROM bbcvijesti WHERE arhiva=1 AND kategorija='news' LIMIT 3";
                $result = mysqli_query($dbc, $query);
                
                echo '<div class="section-naslov">
                    <h2 id="news-crtica">I </h2>
                    <h2 id="news-naslov"> News</h2>
                </div>
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
                echo '</div>';
            }
        ?>
    </section>

    <section class="sekcija-sport">
        <?php
            if ($dbc){
                $query2 = "SELECT * FROM bbcvijesti WHERE arhiva=1 AND kategorija='sport' LIMIT 3";
                $result2 = mysqli_query($dbc, $query2);
                
                echo '<div class="section-naslov">
                    <h2 id="sport-crtica">I </h2>
                    <h2 id="sport-naslov"> Sport</h2>
                </div>
                <div class="articles">';
                while($row2 = mysqli_fetch_array($result2)){
                    echo '<article>
                        <div class="article-slika">
                        <a href="clanak.php?id=' . $row2['id'] . ' "><img src="'.'images/'.$row2['slika'].'"></a>
                        </div>
                        <a href="clanak.php?id=' . $row2['id'] . ' "><h3>' . $row2['naslov'] . '</h3></a>
                        <p>' . $row2['sazetak'] . '</p>
                        </article>';
                }
                echo '</div>';
            }
        ?>
    </section>
    
    <?php mysqli_close($dbc); ?>

    <footer>
        <div class="footer-text">
            <hr>
            <p>Dorijan Polić - projekt za kolegij "Programiranje Web Aplikacija"</p>
        </div>
    </footer>
</body>
</html>