<?php

$labels = [];
$data = [];
$bg = [];

function randomHexColor()
{
    return '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
}
?>
<div class="card">
    <div class="card-header">
        <span class="h4">Tableau de bord</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</button>
    </div>
<div style="margin-top:20px">
    <a href="?page=candidatRefuser" class="btn btn-white" style="width:170px;border-radius:10px;border:2px solid red">Refuser</a>
    <a href="?page=candidatAccepter" class="btn btn-white" style="width:170px;border-radius:10px;border:2px solid orange">Accepter</a>
    <a href="?page=candidatAttente" class="btn btn-white" style="width:170px ;border-radius:10px;border:2px solid black">Attente</a>
   
    
</div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>

                    <center><span class="h4">Liste des offres postulées</span></center>

                </tr>
            </thead>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Poste</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Nombre des candidats</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($listeOffrePostuler as $key => $can)  {
                    array_push($labels,$can['poste']);
                    array_push($data,$can['nb']);
                  
                    
                    array_push($bg,randomHexColor());
                    ?>
               
                    <tr>
                        <td> <?= $key + 1 ?> </td>
                        <td><?= $can['poste'] ?></td>
                        <td><?= $can['date'] ?></td>
                        <td><?= $can['type'] ?></td>
                        <td><?= $can['nb'] ?></td>
                        <td>
                            <a href="?page=infoOffre&idOffre=<?= $can['idOffreF'] ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-info-circle text-white"></i>
                                
                            </a>
                        </td>
        
                    </tr>
                <?php } ?>
            </tbody>
            </table>


            <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Static Des candidats Par Projet
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted text-center">Modifier il ya  <?= date('d-m-Y:H') ?> PM</div>
                     </div>
                </div>
    </div>
</div>


 

<script>
        Chart.defaults.global.defaultFontFamily = '-apple-system, system-ui, BlinkMacSystemFont,"Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
    alert("Aidez moi");
    console.log("Vous etes qui");
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode ($labels); ?>,
                datasets: [{ 
                    data: <?php echo json_encode ($data) ; ?>, 
                    backgroundColor: <?php echo json_encode ($bg); ?>,
                }],
            },
        });
       

</script>