<?php
session_start(); // Démarre la session

// Détruire toutes les données de la session
$_SESSION = array(); // Vide le tableau de session

// Si on utilise des cookies de session, on les supprime également
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: index.php");
exit();
?>
