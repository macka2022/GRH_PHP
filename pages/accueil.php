<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Page d'accueil</title>
</head>

<body>
    <div class="container">
        <nav>
            <img src="images/GLESE-removebg-preview.png" alt="" class="logo" />

        </nav>

        <section class="site-container">
            <p>Bienvenue à</p>
            <h1>GLESE</h1>
            <h4>VENEZ PROFITER DE NOS OFFRE D'EMPLOI, DE STAGE SUR DIFFERENTS SECTEURS</h4>

            <div class="row">
                <h4 class="font-family: 'Times New Roman';color:gray">

                </h4>
                <div class=" input-group">

                    <a href="?page=connexion" class="btn btn-primary" id="btnNavbarSearch" <?= empty($_SESSION) ? "" : 'hidden' ?>>se connecter</a>
                </div>
            </div>
        </section>


    </div>
</body>

</html>