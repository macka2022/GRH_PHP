<div class="card col-md-6 offset-3 mt-4">
    <div class="card-header">
        <h2 class="text-center text-success">Authentification</h2>
    </div>
    <div class="card-body">
        <div <?= isset($errorText) ? "" : 'hidden' ?> class="row alert alert-danger">
            <?= isset($errorText) ? $errorText : "" ?>
        </div>
        <form method="POST">
            <label for="">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="login">
            <label for="">Mot de passe</label>
            <input type="password" class="form-control" name="mdp">
            <button type="submit" class="btn-sm btn-success text-white fw-bold float-end mt-2" name="connexion">Se Connecter</button>
            <a  class="btn-sm btn-warning text-white fw-bold float-start mt-2" href="?page=inscription">creer un compte</a>
        </form>
    </div>
</div>

<!-- creer un compte  -->