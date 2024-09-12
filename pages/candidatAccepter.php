<div class="card">
    <div class="card-header">
        <span class="h4">CANDIDATURES ACCEPTER</span>
        <a href="http://localhost/glese/generera.php"  style="width:170px ;border-radius:10px" class="btn btn-primary float-end"  >Generer pdf </a>
        
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
                <?php foreach ($listeCandidatAccepter as $key => $ac) { ?>
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $ac['prenom'] ?></td>
                        <td><?= $ac['nom'] ?></td>
                        <td><?= $ac['email'] ?></td>
                        <td><?= $ac['login'] ?></td>
                        <td><?= $ac['tel'] ?></td>
                       
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
   
</div>
