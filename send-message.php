<?php 
$filename="./data/data.json";

$users=[];

if(file_exists($filename)){
    $file = file_get_contents($filename);
    $users = json_decode($file,true);
 }


$id= $_GET['id'] ?? '';

if($id){
 // tableau qui renvoie l'ID de l'ensemble du tableau $users   
    $array = array_column($users, 'id');
   
//variable qui renvoie l'index du premier ID soit 0
    $indexUser= array_search($id,$array);

// variable $user va rechercher les informations dans $users en fonction de l'index de l'ID     
    $user= $users[$indexUser]; 
    };


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Félicitations</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="result">
            <h2>Félicitations !! <?=$user['firstname']?>, vous êtes bien enregistré(e)</h2>
            <h3>Prénom : <?= $user['firstname'] ?></h3>
            <h3>Nom : <?= $user['lastname']?></h3>
            <h3>Adresse mail : <?= $user['mail']?></h3>
        </div>
    </body>
</html>