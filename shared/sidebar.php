<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">mettre a jour cv </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- enctype="multipart/form-data" -->
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="">Fichier</label>
                    <!-- accept=".pdf" pour prendre les fichier d'extension pdf -->
                    <input required type="file" accept=".pdf" name="cv" class="form-control" id="cv" onchange="verifPdf()">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="majCV"> Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

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



<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link" href="http://localhost/glese/?page=accueil">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Accueil
                    </a>
                    <a class="nav-link" href="?page=listeOffre">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Liste des offres
                    </a>
                    <a <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil'] == 'RH' ? "" : 'hidden' ?> class="nav-link" href="?page=tabBord">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Tableau de bord
                    </a>

                    <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomProfil'] == 'RH' || $_SESSION['user']['nomProfil'] == 'admin') ? "" : 'hidden' ?> class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Parametres
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil'] == 'RH' ? "" : 'hidden' ?> class="nav-link" href="?page=gestionOffre">Gestion des offres</a>
                            <a <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil'] == 'admin' ? "" : 'hidden' ?> class="nav-link" href="?page=gestionProfiles">Gestion des profil</a>
                        </nav>
                    </div>



                    <a <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil'] == 'candidat' ? "" : 'hidden' ?> class="nav-link" href="?page=mesCandidatures">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Mes Candidatures
                    </a>
                    <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomProfil'] == 'RH' || $_SESSION['user']['nomProfil'] == 'admin') ? "" : 'hidden' ?> class="nav-link" href="?page=gestionEmploye">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Gestion des employes
                    </a>

                    <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomProfil'] == 'candidat') ? "" : 'hidden' ?> class="nav-link" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div> -->
                        Mettre a jour cv
                    </a>

                </div>
            </div>

        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">