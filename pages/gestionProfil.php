<div class="card">
    <div class="card-header">
        <span class="h4">Gestion Profils</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom Profil</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeProfil as $key => $profil) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $profil['nomProfil'] ?></td>
                        <td>
                            <!--Supprimer-->
                            <a href="" class=" btn btn-sm btn-danger"><i class="fas fa-trash text-white"></i></a>
                            <!--Modifier-->
                            <button class="btn btn-sm btn-info"><i class="fas fa-edit text-white"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title " id="exampleModalLabel">Ajout Offre</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <label for="" class="h4">Nom Profil</label>
                    <input id="poste" type="text" class="form-control" name="nomProfil">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" name="ajoutProfil" class="btn btn-primary">Enregistrer </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const poste = document.getElementById("poste");
    // const description = document.getElementByNameId("description");
    const competence = document.getElementByName("competence");
    const ajout = document.getElementByName("ajoutOffre");
    poVa = poste.value.trim();
    if (poVa == "") {
        alert("niceeee");
    }
</script>