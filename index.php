<?php 
    // Insère le contenu d'un fichier externe, ici le fichier qui vérifie si le mot de passe inséré correspond, une fois haché, au MDP de la BDD
    include('connexion.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" href="pokeball.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeRmon - Connexion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5 login-container">
        <h2 class="text-center text-warning"><img src="pokeball.png" width="100" height="100" alt=""></h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <div class="card shadow">
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateurs :</label>
                        <!-- l'attribut "name" permet ici de définir le nom de la donnée envoyé par le formulaire -->
                        <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
