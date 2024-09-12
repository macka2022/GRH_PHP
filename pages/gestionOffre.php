<div class="card">
    <div class="card-header">
        <span class="h4">Gestion des offres</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModa">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Poste</th>
                    <th>Type offre</th>
                    <th>Date creation</th>
                    <th>Date publication</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeOffre as $key => $off) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $off['poste'] ?></td>
                        <td><?= $off['type'] ?></td>
                        <td><?= $off['date'] ?></td>
                        <td><?= $off['datePublication'] ?></td>
                        <td>
                            <a href="?idOffre=<?= $off['idOffre'] ?>&etat=1" class="btn btn-sm btn-success" <?= $off['etatOffre'] == 1 ? 'hidden' : "" ?>>
                                Publier
                            </a>
                            <a href="?idOffre=<?= $off['idOffre'] ?>&etat=0" class="btn btn-sm btn-dark" <?= $off['etatOffre'] == 0 ? 'hidden' : "" ?>>
                                Desactiver
                            </a>
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash text-white"></i>
                            </button>
                            <button class="btn btn-sm btn-info">
                                <i class="fas fa-info-circle text-white"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Offre </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <label for="">Poste</label>
                    <input type="text" name="poste" class="form-control" id="">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    <label for="">Competence</label>
                    <textarea name="competence" id="" cols="30" rows="5" class="form-control"></textarea>
                    <label for="">Type</label>
                    <select name="type" id="" class="form-control">
                        <option value="emploi">Emploi</option>
                        <option value="stage">Stage</option>
                    </select>
                    <div class="mt-2">
                        <input type="checkbox" name="etat"> Publier
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="addOff"> Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function loadOffre(id) {

        $.ajax({
            url: "http://localhost/glese/public/json/offre.php?action=findId&id=" + id,
            dataType: "json",
            method: "GET",
            success: function(resultat) {
                if (resultat != "0") {
                    $("#idOffre").val(resultat.idOffre);
                    $("#poste").val(resultat.poste);
                    $("#competence").val(resultat.competence);
                    $("#description").val(resultat.description);
                    $("#type").val(resultat.type);
                    let cocher = resultat.etatOffre == 1 ? true : false;
                    $("#etat").prop("checked", cocher);
                }
            }
        });
    }
</script>