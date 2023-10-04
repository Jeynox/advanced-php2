<?php

$user_firstname = $_POST["user_firstName"];
$lastName = $_POST["user_name"];
$mail = $_POST["user_email"];
$phoneNumber = $_POST["user_phone"];
$option = $_POST["choix"];
$message = $_POST["user_message"];


echo "Merci " . $user_firstname . " " . $lastName . " de nous avoir contacté à propos de " . $option . " . " . "<br>" .
"Un de nos conseillers vous contactera soit à l’adresse " . $mail . " ou par téléphone au " . $phoneNumber . " dans les plus brefs délais pour traiter votre demande :"; 

echo $message;