<?php
session_start();
require_once ('templates/template_header.php');
?>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<title>SB Admin 2 - Tables</title>

<!-- Custom fonts for this template -->
<link href="bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template -->
<link href="bootstrap/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                <p class="mb-4">Repas </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Liste des repas de l'utilisateur <?php echo $_SESSION['login']?></h6>
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
                                                ajax: "<?php echo(API_URL_BASE)?>/consomme.php?id_user=<?php echo $_SESSION['user']?>",
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
                                                ]
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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php
require_once("templates/template_footer.php");
?>