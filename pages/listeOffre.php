<div class="row">
    <?php foreach ($listeOffrePub as $key => $o) { ?>
        
            
        <div  class="col-md-4 mb-3 mt-4">
           
            <div class="card border border-primary cool">
            <h5 class="card text-center">Offre </h5>
                <div class="card-body">
                    <?= $o['poste'] ?>
                </div>
                <div class="card-footer">
                    <a href="?page=detailOffre&idOffre=<?= $o['idOffre'] ?>" class="btn btn-sm btn-primary float-end">Details</a>
                </div>
            </div>
        </div>
   
    <?php } ?>
</div>