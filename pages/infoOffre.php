<div class="card">
    <div class="card-header">
        <span class="h4">Info de l'offre <?= $offreDetail['poste'] ?></span>
    </div>
    <div class="card-body">
        <h3>Liste des candidats</h3>
        
        <H1><?=isset($_GET['id'], $_GET['idO'],$_GET['etatC'])  ? $u : ""?></H1>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeCandidatPost as $key => $U) { ?>
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $U['prenom'] ?></td>
                        <td><?= $U['nom'] ?></td>
                        <td><?= $U['email'] ?></td>
                        <td><?= $U['tel'] ?></td>
                        <td><?= $U['etatCandidature'] ?></td>
                        <td>

                    <a    <?=   $U['etatCandidature']==-1 ? "" : 'hidden' ?> class="btn btn-white" style="width:170px;border-radius:10px;border:2px solid orange" href="?id=<?= $U['idCandidature']  ?>&idO=<?=$U['idOffre']?>&etatC=1">Accepter</a>


                        <a  style="width:170px;border-radius:10px;border:2px solid orange" href="?id=<?= $U['idCandidature']  ?>&idO=<?=$U['idOffre']?>&etatC=-1">Attente</a>



                        <a  <?=   $U['etatCandidature']==-1  ? "" : 'hidden' ?>    class="btn btn-white" style="width:170px;border-radius:10px;border:2px solid red"  
                         href="?id=<?= $U['idCandidature']  ?>&idO=<?=$U['idOffre']?>&etatC=0">Refuser</a>
                       
                        
                        
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>