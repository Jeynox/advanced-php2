<?php
if ($_POST){
  var_dump($_POST);
  $data = array_map('trim',$_POST);
  $errors = [];
  if ($data["user_name"] === ""){
    $errors["user_name"] = "Vous devez remplir votre nom !";
  }

  if ($data["user_firstName"] === ""){
    $errors["user_firstName"] = "Vous devez remplir votre prénom !";
  }

  if ($data["user_phone"] === ""){
    $errors["user_phone"] = "Vous devez remplir votre téléphone !";
  }

  if ($data["user_email"] === ""){
    $errors["user_email"] = "Vous devez remplir votre mail !";
  } 
  
  if (filter_var($data["user_email"], FILTER_VALIDATE_EMAIL)){
    $errors["notValidMail"] = "Veuillez saisir une adresse mail valide !";
  }

  if ($data["choix"] === ""){
    $errors["choix"] = "Vous devez remplir votre choix !";
  }

  if (!$errors){
    echo "<p>Vous etes bien connecté(e)!</p>";
  }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
</head>
<body>
    <section>
    <h1>Formulaire de contact</h1>
    <form  action=""  method="post">
        <div>
          <input  type="text"  id="nom" placeholder="Nom"  name="user_name">
          <?php 
          if (isset($errors["user_name"])){
            echo "<p>" . $errors["user_name"] . "</p>";
          }
          ?>
        </div>
        <div>
          <input  type="text"  id="prenom" placeholder="Prenom"  name="user_firstName">
          <?php
          if (isset($errors["user_firstName"])){
            echo "<p>" . $errors["user_firstName"] . "</p>";
          }
          ?>
        </div>
        <div>
          <input  type="number"  id="phone" placeholder="0645654565"  name="user_phone">
          <?php
            if (isset($errors["user_phone"])){
              echo "<p>" . $errors["user_phone"] . "</p>";
            }
          ?>
        </div>
        <div>
            <input  type="email"  id="courriel" placeholder="exemple@exemple.com"  name="user_email">
            <?php
              if (isset($errors["user_email"])){
                echo "<p>" . $errors["user_email"] ."</p>";
              }
              if (isset($errors["notValideMail"])){
                echo "<p>" . $errors["notValideMail"] . "</p>";
              }
            
            ?>
        </div>
        <?php $select = ["Info", "Commentaire", "Contact"] ?>
        <div>
          <select name="choix">
            <option value="">Selectionnez</option>
              <?php 
              foreach($select as $i => $choix){
                echo "<option value=" . $i . " >" . $choix . "</option>";
              }
              ?>
          </select>
          <?php
            if (isset($errors["choix"])){
              echo "<p>" . $errors["choix"] . "</p>";
            }
          ?>
        </div>
        <div>
          <textarea  id="message" placeholder="Message"  name="user_message"></textarea>
        </div>
        <div  class="button">
          <button  type="submit" value="Submit" >Envoyer votre message</button>
        </div>
        </form>
    </section>
</body>
</html>