<div class="card">
    <div class="card-header">
        <span class="h4">Gestion des profiles</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeProfiles as $key => $prof) { ?>
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $prof['nomProfil'] ?></td>
                        <td>
                            <i class="fas fa-trash text-white"></i>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout profile </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <label for="">Nom profil</label>
                    <input type="text" name="nom" class="form-control" id="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="addProfil"> Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>