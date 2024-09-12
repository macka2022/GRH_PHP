<div class="card">
    <div class="card-header">
        <h4>Mes candidatures(offres postulés)</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($listeCandidature as $key => $o) { ?>
                <div class="col-md-4 mb-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <?= $o['poste'] ?>
                            <h6 <?= $o['etatCandidature'] == 1 ? "" : 'hidden' ?> class="text-center text-success">Candidature validée</h6>
                            <h6 <?= $o['etatCandidature'] == 0 ? "" : 'hidden' ?> class="text-center text-danger">Candidature refusée</h6>
                            <h6 <?= $o['etatCandidature'] == -1 ? "" : 'hidden' ?> class="text-center text-warning">En attente de validation</h6>
                        </div>
                        <div class="card-footer">
                            <a href="?page=detailOffre&idOffre=<?= $o['idOffre'] ?>" class="btn btn-sm btn-primary float-end">Details</a>
                        </div>
                    </div>
                </div>
                
            <?php }?>
        </div>
    </div>
</div>