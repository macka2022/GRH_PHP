<!-- Modal -->

<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout employé </h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" enctype="multipart/form-data">
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
        <input type="text" name="adresse" class="form-control" id="">
        <label for="">login</label>
        <input type="text" name="login" class="form-control" id="">
        <label for="">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" id="">
        <label for="">joindre fichier</label>
        <input type="file" name="cv" class="form-control" id="cv" required accept=".pdf" onchange="verifPdf()">
        <label for="">Profil</label>
        <select name="idProfil" id="" class="form-control">
            <?php foreach ($listeProfiles as $P) {
                if (strtolower($P['nomProfil']) == 'candidat') {
            ?>
                    <option value="<?= $P['idProfil'] ?>"> <?= $P['nomProfil'] ?> </option>

            <?php }
            } ?>
        </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" name="addCandidat"> Enregistrer</button>
    </div>
</form>

<script>
    function verifPdf() {
        let file = document.getElementById('cv');
        if (file.value != "") {
            // split pour separer le fichier avec des points
            let tab = file.value.split(".");
            // tab.length-1 pour prendre le dernier element de tab
            let extension = tab[tab.length - 1];
            if (extension != 'pdf') {
                file.value = "";
                alert("fichier non pris en charge ");
            }
        }

    }
</script>