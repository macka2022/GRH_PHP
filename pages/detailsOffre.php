<div <?= $verifCandidature ? "" : "hidden" ?> class="row alert alert-success">
    <h4>Vous avez postulé à cette offre (<?= $verifCandidature['dateCandidature'] ?>)</h4>
    <h6 <?= $verifCandidature['etatCandidature'] == -1 ? "" : "hidden" ?> class="text-warning text-center">En attente de validation...</h6>
    <h6 <?= $verifCandidature['etatCandidature'] == 1 ? "" : "hidden" ?> class="text-success text-center">Candidature validée</h6>
    <h6 <?= $verifCandidature['etatCandidature'] == 0 ? "" : "hidden" ?> class="text-danger text-center">Candidature refusée</h6>
</div>

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <!--LOGO-->
            <h2> Details pour le poste de <?= $offreDetails['poste'] ?> </h2>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <form method="post">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row register-form">
                            <div class=" col-md-12 float end">
                                <input <?= $verifCandidature ? "hidden" : "" ?> name="postuler" type="submit" class="btnRegister" value="Postuler">
                                <input type="hidden" name="idOffre" value="<?= $offreDetails['idOffre'] ?>">
                            </div>
                            <fieldset class="col-md-12">
                                <!--DESCRIPTION POSTE-->
                                <legend class="legend">Description du poste</legend>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <p> <?= $offreDetails['description'] ?></p>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="col-md-12">
                                <!--COMPETENCE-->
                                <legend class="legend">Competence</legend>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6">
                                        <p> <?= $offreDetails['competence'] ?></p>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>