<?php
    // Insère le contenu d'un fichier externe, ici permet d'avoir toutes les informations nous permettant de nous connecter à la BDD
    include('bdd.php');  
    session_start();



    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Traitement du formulaire de connexion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Ajout du sel : combinaison du nom d'utilisateur avec "az"
        
        $salt = $username . 'az';

        $password = hash('sha3-256', $salt.$password);

        // Préparation et exécution de la requête
        $stmt = $pdo->prepare("SELECT * FROM user WHERE Username = :username AND Password = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['username'] = $username;
            header("Location: accueil.php"); // Redirection vers la page d'accueil
            exit();
        } else {
            $error = "Identifiants incorrects.";
        }
    }
?>