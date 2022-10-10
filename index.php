<pre>
<?php
require_once "errors.php";




$filename="./data/data.json";

$error=[
    'firstname'=>'',
    'lastname'=> '',
    'mail'=>'',
    'password'=>'',
];

$users=[];

if(file_exists($filename)){
    $file = file_get_contents($filename);
    $users = json_decode($file,true);
    // print_r($information);
 }

if($_SERVER["REQUEST_METHOD"]== "POST"){

  require_once "add-information.php";
      
    }

?>

</pre>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="/" method="POST" class="form">
        <div class="form-control" >
        
            <label for="firstname">prénom :</label>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom">
        </div>
        <div>
            <?php if($error)?>
            <p class="error"><?=$error['firstname']?></p>
        </div>
        <div class="form-control">
        
            <label for="lastname">nom :</label>
            <input type="text" name="lastname" id="lastname" placeholder="Votre nom">
        </div>
        <div>
            <?php if($error)?>
            <p class="error"><?=$error['lastname']?></p>
        </div>
        <div class="form-control">
       
            <label for="mail">Votre adresse mail :</label>
            <input type="email" name="mail" id="mail"placeholder="Votre adresse mail">
        </div>
        <div>
            <?php if($error)?>
            <p class="error"><?=$error['mail']?></p>
        </div>
        <div class="form-control">
        
            <label for="password">votre mot de passe :</label>
            <input type="password" name="password" id="password" placeholder ="votre mot de passe">
        </div>
        <div>
            <?php if($error)?>
            <p class="error"><?=$error['password']?></p>
        </div>
        <button type="submit"><a href="/send-message.php">Valider</a></button>       
    </form>
     <!-- <input type ="submit" value="Valider"> - autre façon de faire un bouton  -->
    <!-- <form action="/valid-information.php" method="POST">
        <input type="hidden"name="id" value="<?= $users['id'] ?? ''?>">
        <input type="hidden"name="action" value="envoi">
    </form> -->

    <section>

    <h2>afficher les utilisateurs</h2>
    <?php foreach ($users as $user) : ?>
        <div class="cadre">
            <h3>Prénom : <?= $user['firstname'] ?></h3>
            <h3>Nom : <?= $user['lastname']?></h3>
            <h3>Adresse mail : <?= $user['mail']?></h3>
            <a href="/send-message.php?id=<?= $user['id']?>">détails</a>
        </div>
    <?php endforeach; ?>
    </section>
</body>
</html>