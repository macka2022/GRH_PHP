<div class="card">
    <div class="card-header">
        <span class="h4">CANDIDATURES REFUSER</span>
        <a href="http://localhost/glese/generere.php"  style="width:170px ;border-radius:10px" class="btn btn-primary float-end"  >Generer pdf </a>
        
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
                <?php foreach ($listeCandidatRefuser as $key => $r) { ?>
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $r['prenom'] ?></td>
                        <td><?= $r['nom'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['login'] ?></td>
                        <td><?= $r['tel'] ?></td>
                       
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
