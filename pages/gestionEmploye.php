<div class="card">
    <div class="card-header">
        <span class="h4">Gestion des employes</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleMo">Ajouter</button>
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
                    <th>Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeUsers as $key => $U) { ?>
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $U['prenom'] ?></td>
                        <td><?= $U['nom'] ?></td>
                        <td><?= $U['email'] ?></td>
                        <td><?= $U['login'] ?></td>
                        <td><?= $U['tel'] ?></td>
                        <td><?= $U['nomProfil'] ?></td>
                        <td>
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
<div class="modal fade" id="exampleMo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout employé </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="">
                    <label for="">Nom</label>
                    <input type="text" name="nom" class="form-control" id="">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                    <label for="">Telephone</label>
                    <input type="tel" name="tel" class="form-control" id="">
                    <label for="">Adresse</label>
                    <input type="text" name="adress" class="form-control" id="">
                    <label for="">login</label>
                    <input type="text" name="login" class="form-control" id="">
                    <label for="">Mot de passe</label>
                    <input type="password" name="mdp" class="form-control" id="">
                    <label for="">Profil</label>
                    <select name="idProfil" id="" class="form-control">
                        <?php foreach ($listeProfiles as $P) { ?>
                            <option value="<?= $P['idProfil'] ?>"><?= $P['nomProfil'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="addUsers"> Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>