<?php 
$DB = new mysqli("localhost","root","","zajecia_db");
//echo "<pre>";
//print_r($DB);
//echo "</pre>";


//dodanie rekordu do tabeli w bazie
//$sql = "INSERT INTO `users` (`Id`, `imie`, `nazwisko`) VALUES (NULL, 'Mateusz', 'Karwacki')";
//$DB->query($sql);
//if(isset($_POST["wyslij"])){
    //if(!empty($_POST['imie']) || !empty($_POST['nazwisko'])){
       // $sql = "INSERT INTO `users` (`id`, `imie`, `nazwisko`) VALUES (NULL, '{$_POST['imie']}', '{$_POST['nazwisko']}')";
       // $DB->query($sql);
        //echo "podaj imie i nazwisko";
    //}
//}
//wyciagamy dane z bazy
if(isset($_POST["wyslij"])){
    if(!empty($_POST['imie']) || !empty($_POST['nazwisko'])){
        $sql = "SELECT * FROM users  WHERE imie LIKE '{$_POST['imie']}' && nazwisko LIKE '{$_POST['nazwisko']}'";
        echo $sql;
        $wynik = $DB->query($sql);
        echo "<pre>";
        print_r($wynik);
        echo "</pre>";
        $ile_wierszy = $wynik->num_rows;
        echo "ilosc zwroconych rekordow to $ile_wierszy<br>";

        foreach($wynik as $row){
            echo "{$row['imie']} {$row['nazwisko']}<br>";
        }
        echo "<ol>";
        foreach($wynik as $row){
            echo "<li>{$row['imie']} {$row['nazwisko']}</li>";
        }
        echo "</ol>";

        echo"<table>";
        foreach($wynik as $row){
            echo "<tr>";
                echo "<td>{$row['imie']}</td><td></td>{$row['nazwisko']}</td>";
        }
        echo "</table>";
    }
}
else{
    echo "podaj imie i nazwisko";
}
$DB->close();
?>


<form action="" method="post">
    Imie: <input type= "text" name="imie"><br>
    nazwisko: <input type="text" name="nazwisko"><br>
    <input type="submit" value="wyslij" name="wyslij">
</form>

