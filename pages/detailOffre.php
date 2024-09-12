<div <?= empty($_SESSION) == false && ($_SESSION['user']['nomProfil'] == 'RH' || $_SESSION['user']['nomProfil'] == 'admin')  ? "hidden" : '' ?>>
    <div class="row alert alert-success" <?= isset($candidature) &&  $candidature != 0 && $candidature != false ? "" : 'hidden' ?>>
        <h4>Vous avez déjà postuler à cette offre</h4>
        <h6 <?= $candidature['etatCandidature'] == 1 ? "" : 'hidden' ?> class="text-center text-success">Candidature validée</h6>
        <h6 <?= $candidature['etatCandidature'] == 0 ? "" : 'hidden' ?> class="text-center text-danger">Candidature refusée</h6>
        <h6 <?= $candidature['etatCandidature'] == -1 ? "" : 'hidden' ?> class="text-center text-warning">En attente de validation</h6>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3> <?= $offreDetail['poste'] ?> </h3>
        <form action="" method="POST">
            <input type="hidden" name="idOffre" value="<?= $offreDetail['idOffre'] ?>">
            <!-- cacher le bouton postuler quand c un candidat -->

            <button <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil'] == 'RH' ? "hidden" : '' ?> <?= isset($candidature) && $candidature != 0 && $candidature != false ? 'hidden' : "" ?> class="btn btn-primary float-end" type="submit" name="postuler">Postuler</button>

            <!-- afficher le bouton modifier quand c rh -->
        </form>
        <button class="btn btn-primary float-end" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil'] == 'RH' ? "" : 'hidden' ?> class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleMod">modifier</button>


    </div>
    <div class="card-body">
        <p class="text-justify"><?= $offreDetail['description'] ?></p>
        <h3>Competence</h3>
        <p class="text-justify"><?= $offreDetail['competence'] ?></p>
    </div>
</div>

<!-- modal de modification -->
<div class="modal fade" id="exampleMod" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">modifier Offre </h1>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <label for="">Poste</label>
                    <input type="text" name="poste" class="form-control" id="" value="<?= $offreDetail['poste'] ?>">
                    <input type="hidden" name="idOffre" class="form-control" id="" value="<?= $offreDetail['idOffre'] ?>">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"><?= $offreDetail['description'] ?></textarea>
                    <label for="">Competence</label>
                    <textarea name="competence" id="" cols="30" rows="5" class="form-control"><?= $offreDetail['competence'] ?></textarea>
                    <label for="">Type</label>
                    <select name="type" id="" class="form-control">
                        <option value="emploi">Emploi</option>
                        <option value="stage">Stage</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="save">enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>