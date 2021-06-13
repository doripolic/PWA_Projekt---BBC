<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unos_forma_style.css">
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
                    <li><a href="#!">Unos</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>
        </div> 
    </header>
    
    <div class="naslov-boja">
        <div class="naslov">
            <h1>OBRAZAC ZA UNOS CLANKA</h1>
        </div>
    </div>

    <div class="obrazac">
        <form action="unos_kod.php" method="post" enctype="multipart/form-data">
            <div class="form-odsjecak">
                <label for="title">Naslov vijesti</label>
                <br>
                <span id="errorTitle" class="errorBoja"></span>
                <div>
                    <input type="text" name="title" id="title" class="unos-naslov">
                </div>
            </div>

            <div class="form-odsjecak">
                <label for="short-about">Kratki opis clanka</label>
                <br>
                <span id="errorAbout" class="errorBoja"></span>
                <div>
                    <textarea name="short-about" id="about" cols="30" rows="5" class="unos"></textarea>
                </div>
            </div>

            <div class="form-odsjecak">
                <label for="article-text">Sadrzaj clanka</label>
                <br>
                <span id="errorText" class="errorBoja"></span>
                <div>
                    <textarea name="article-text" id="text" cols="30" rows="5" class="unos"></textarea>
                </div>
            </div>
            
            <div class="form-odsjecak">
                <label for="category">Kategorija vijesti</label>
                <br>
                <span id="errorCategory" class="errorBoja"></span>
                <div class="form-field">
                    <select name="category" id="category" class="unos-kategorija">
                        <option value="" selected disabled>---</option>
                        <option value="news">News</option>
                        <option value="sport">Sport</option>
                    </select>
                </div>
            </div>
            
            <div class="form-odsjecak">
                <label for="photo">Slika: </label>
                <br>
                <span id="errorPhoto" class="errorBoja"></span>
                <div class="form-field">
                    <input type="file" accept="image/jpg" name="photo" id="photo"/>
                </div>
            </div>
            
            <div class="form-odsjecak">
                <label>Spremiti u arhivu:
                <div class="form-field">
                    <input type="checkbox" name="archive" class="unos-arhiva" value="true">
                </div>
                </label>
            </div>

            <div class="form-odsjecak">
                <button type="submit" name="submit" id="slanje" value="Prihvati">Podnesi</button>
                <button type="reset" value="Poništi">Poništi</button>
            </div>
        </form>
    </div>

    <footer>
        <div class="footer-text">
            <hr>
            <p>Dorijan Polić - projekt za kolegij "Programiranje Web Aplikacija"</p>
        </div>
    </footer>

    <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {
            var dobraForma = true;

            var unosTitle = document.getElementById("title");
            var title = document.getElementById("title").value;
            if (title.length < 5 || title.length > 30){
                dobraForma = false;
                unosTitle.style.border = "2px dashed red";
                document.getElementById("errorTitle").innerHTML ="Naslov vijesti mora imati izmedu 5 i 30 znakova!<br>";
            }
            else {
                unosTitle.style.border = "3px solid green";
                document.getElementById("errorTitle").innerHTML = "";
            }

            var unosAbout = document.getElementById("about");
            var about = document.getElementById("about").value;
            if (about.length < 10 || about.length > 100) {
                dobraForma = false;
                unosAbout.style.border = "2px dashed red";
                document.getElementById("errorAbout").innerHTML = "Kratki opis mora imati izmedu 10 i 100 znakova!<br>";
            }
            else {
                unosAbout.style.border = "3px solid green";
                document.getElementById("errorAbout").innerHTML = "";
            }

            var unosText = document.getElementById("text");
            var text = document.getElementById("text").value;
            if (text.length == 0) {
                dobraForma = false;
                unosText.style.border = "2px dashed red";
                document.getElementById("errorText").innerHTML ="Sadrzaj mora biti unesen!<br>";
            }
            else {
                unosText.style.border = "3px solid green";
                document.getElementById("errorText").innerHTML = "";
            }
            
            var unosCategory = document.getElementById("category");
            if (document.getElementById("category").selectedIndex == 0){
                dobraForma = false;
                unosCategory.style.border = "2px dashed red";
                document.getElementById("errorCategory").innerHTML ="Kategorija mora biti odabrana!<br>";
            }
            else {
                unosCategory.style.border = "3px solid green";
                document.getElementById("errorCategory").innerHTML ="";
            }


            var unosPhoto = document.getElementById("photo");
            var photo = document.getElementById("photo").value;

            if (photo.length == 0){
                dobraForma = false;
                unosPhoto.style.border = "2px dashed red";
                document.getElementById("errorPhoto").innerHTML ="Slika mora biti odabrana!<br>";
            }
            else {
                unosPhoto.style.border = "3px solid green";
                document.getElementById("errorPhoto").innerHTML ="";
            }
            
            if (dobraForma != true){
                event.preventDefault();
            }
            
        };
    </script>
</body>
</html>