<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>JSON gyakorlás</title>
</head>
<body>
    <?php
    //első beolvasás
    $fajl = readfile("kedvenc2.json");
    echo "$fajl<br>";
    //második beolvasás
    $eroforras = fopen("kedvenc2.json", "r") or die("Unable to open file!");
    $fajl = fread($eroforras, filesize("kedvenc2.json"));
    fclose($eroforras);
    echo $fajl;

    //átalakítás tömbbé
    $tomb = json_decode($fajl);
    echo '<pre>' . var_export($tomb, true) . '<pre>';

    //táblázatba kiiratás
    ?>
    <div>
        <table>
            <tr>
            <?php
            foreach ($tomb[0] as $kulcs => $ertek){
                echo "<th>";
                echo $kulcs;
                echo "</th>";
            }
            
            echo "</tr>";
            for ($i=0; $i < count($tomb); $i++) { 
                echo "<tr>";
                foreach ($tomb[$i] as $kulcs => $ertek){
                    echo "<td>";
                    if($kulcs == "kép"){
                        echo "<img src=\"kepek/" . $ertek . "\" alt=\"szerző\">";
                    }else{
                        echo $ertek;
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>