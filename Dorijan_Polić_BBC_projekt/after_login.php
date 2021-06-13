<?php 
    session_start();

    echo $_SESSION['poruka'];

    if($_SESSION['razina'] == 1){
        echo "Imate administratorska prava, te mozete nastaviti na administraciju: ";
        echo "<a href='administracija.php'> ADMINISTRACIJA </a>";
    }
    else {
        echo "<a href='login_registracija.php'> NATRAG NA LOGIN </a>";
    }
?>