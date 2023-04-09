
<?php
    require_once ('templates/template_header.php');
?>

    <!-- Page Wrapper -->
    <script>
        window.onload = function() {
        $.ajax({
            url: "<?php echo(API_URL_BASE)?>/consomme.php?id_user=<?php echo($_SESSION['user'])?>",
            type: 'GET',
            dataType: 'json',
            success: function(array) {
                var lastWeekArray = [];
                var currentDate = new Date();
                var oneWeekAgoDate = new Date(currentDate.getTime() - (7 * 24 * 60 * 60 * 1000)); 
                array["data"].forEach(function(item) {
                    var consommationDate = new Date(item.date_consommation);
                    if (consommationDate.getTime() >= oneWeekAgoDate && consommationDate.getTime() <= currentDate) {
                        lastWeekArray.push(item);
                    }
                });
            var promises = lastWeekArray.map(function(item) {
                return new Promise(function(resolve, reject) {
                $.ajax({
                    url: "<?php echo(API_URL_BASE)?>/contient.php?id_aliment="+item.id_alim,
                    type: 'GET',
                    dataType: 'json',
                    cache:false,
                    success: function(array) {
                    var proteine = 0;
                    var glucide = 0;
                    var lipide = 0;
                    var sucres = 0;
                    array['data'].forEach(function(item2) {
                        if(item2.id_nut==141){
                        proteine += (item2.quantité*item.quantité);
                        } else if(item2.id_nut==142){
                        glucide += (item2.quantité*item.quantité);
                        } else if(item2.id_nut==143){
                        lipide += (item2.quantité*item.quantité);
                        } else if(item2.id_nut==144){
                        sucres += (item2.quantité*item.quantité);
                        }
                    });
                    resolve({proteine: proteine, glucide: glucide, lipide: lipide, sucres: sucres});
                    },
                    error: function(error) {
                    reject(error);
                    }
                });
                });
            });

            Promise.all(promises).then(function(results) {
                var totalProteine = 0;
                var totalGlucide = 0;
                var totalLipide = 0;
                var totalSucres = 0;
                results.forEach(function(result) {
                totalProteine += result.proteine;
                totalGlucide += result.glucide;
                totalLipide += result.lipide;
                totalSucres += result.sucres;
                });
                document.getElementById('proteine').innerText = totalProteine + " g";
                document.getElementById('glucide').innerText = totalGlucide + " g";
                document.getElementById('lipide').innerText = totalLipide + " g";
                document.getElementById('sucre').innerText = totalSucres + " g";
            })
                    }
                    });
                };
    </script>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between" id="titre_cartes">
                        <h3>Total des repas des 7 derniers jours</h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                protéines</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="proteine"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                glucides</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="glucide"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">lipides
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="lipide"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                sucres</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="sucre"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                            <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">3 derniers repas de l'utilisateur <?php echo $_SESSION['login']?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Aliment</th>
                                        <th>quantité</th>
                                        <th>date du repas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                               
                                
                            </table>
                            <script>
                                    var table = $('#dataTable').DataTable({
                                        ajax:"<?php echo(API_URL_BASE)?>/consomme.php?id_user=<?php echo $_SESSION['user']?>",
                                        order: [[3, 'desc']],
                                                dataSrc: '',
                                                dom: 'Bfrtip',
                                                columns: [
                                                    { "data":"id_alim" },
                                                    { "data":"nom" },
                                                    { "data":"quantité" },
                                                    { "data":"date_consommation" },
                                                    {
                                                        "render": function (data, type, row, meta) {
                                                            return "<button type='button' class='infos btn btn-info btn-icon-split' nom = '" + row.nom + "' id = '" + row.id_alim + "'>infos sur l'aliment</button>";
                                                        }

                                                    }, 
                                                ],
                                                "paging": true,
                                                pageLength : 3,
                                            });                                            
                                            $(document).on("click", ".infos", infos);
                                            function infos() {
                                                var id = $(event.target).attr('id');
                                                var nom = $(event.target).attr('nom');
                                                window.location.href = 'nutriments.php?nom=' + nom + '&id=' + id;
                                            }
                                    </script>  
                        </div>
                    </div>
                </div>
                <style>
                    .pagination {visibility:hidden;}
                    #dataTable_info {visibility:hidden;}
                    #dataTable_filter {visibility:hidden;}
                    #titre_cartes{margin-bottom:0}
                </style>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
require_once ('templates/template_footer.php');
?>