<?php

session_start();
include 'connect.php';
include "include/direct.php";

 ?>

<!DOCTYPE html>
<html>
<head>
    <base href="http://localhost/trunk/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="google-signin-client_id" content="252015222418-qq255jpdirkdc19m8utsn9imcj7vjj0v.apps.googleusercontent.com"> <!-- client ID -->
    <title>The Sentence Login</title>
    <link rel="icon" href="favicon.ico" type="image/icon"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans|Open+Sans:300,400" rel="stylesheet">
    <script src="https://use.fontawesome.com/f24e56ad22.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script> <!-- Google platform library -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#0161a3"
    },
    "button": {
      "background": "#2196f3"
    }
  },
  "showLink": false,
  "theme": "classic",
  "content": {
    "message": "Korištenjem web stranice pristajete na uporabu kolačića.",
    "dismiss": "Slažem se!"
  }
})});
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
