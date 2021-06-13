<?php
    if(isset($_POST['submit'])){
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
        $datum = date("d-m-Y H:i:s");
        
        $temp_direktorij = 'images/' . $slika_clanka;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $temp_direktorij);

        echo $naslov_clanka;
        echo "<br>";
        echo $kratki_opis;
        echo "<br>";
        echo $sadrzaj_clanka;
        echo "<br>";
        echo $kategorija;
        echo "<br>";
        echo $arhiva;
        echo "<br>";
        echo $slika_clanka;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $basename = "bbc-projekt";

        $dbc = mysqli_connect($servername, $username, $password, $basename) or
            die('Error connecting to MySQL server.' . mysqli_connect_error());

        if ($dbc){
            echo "Connected successfuly to " . $basename . "<br>";
        }

        $query = "INSERT INTO bbcvijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum','$naslov_clanka','$kratki_opis','$sadrzaj_clanka','$slika_clanka','$kategorija','$arhiva')";
        

        $result = mysqli_query($dbc, $query) or die('Error querying database.');
        
        mysqli_close($dbc);
    }

    echo "<a href='unos_forma.php'>POVRATAK NA UNOS</a>";
?>