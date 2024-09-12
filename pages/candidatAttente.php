<div class="card">
    <div class="card-header">
        <span class="h4">CANDIDAT EN ATTENTE DE VALIDATION</span>


        <div class="imprimer">
      	<a href="http://localhost/glese/generer.php"  style="width:170px ;border-radius:10px" class="btn btn-primary float-end"  >Generer pdf </a>
      </div>
 
      <!-- <script type="text/javascript">
            function imprimer_page(){
            window.print();
             }
        </script>
         <PHP header('Expires: 0');
          header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
          header('Pragma: public');
          ?>-->
       
        
       
        
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
                        <td><?= $a['idCandidature'] ?></td>
                       
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
