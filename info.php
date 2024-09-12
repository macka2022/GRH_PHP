<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php require_once('generer.php');?>
<body>
<div class="card">
    <div class="card-header">
        <h1 class="float-end">GLESE</h1>
        <span class="h4">LISTE DES CANDIDAT EN ATTENTE DE VALIDATION</span>
       
        
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>login</th>
                    <th>Telephone</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeCandidatAttente as $key => $a) { ?>
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $a['prenom'] ?></td>
                        <td><?= $a['nom'] ?></td>
                        <td><?= $a['email'] ?></td>
                        <td><?= $a['login'] ?></td>
                        <td><?= $a['tel'] ?></td>
                       
                       
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>