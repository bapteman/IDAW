<?php
session_start();
    // Retrieve the 'nom' parameter from the URL
    $nom = $_GET['nom'];
    $id = $_GET['id'];
    // Call the API to fetch the data using the 'nom' parameter
    $url = 'http://localhost/IDAW/Projet/API/contient.php?id_aliment=' . $id;
    $data = file_get_contents($url);
    $result = json_decode($data, true);
    $nutriments = array("Protéines (g/100 g)", "Glucides (g/100 g)", "Lipides (g/100 g)", "Sucres (g/100 g)", "Fructose (g/100 g)", "Galactose (g/100 g)", "Glucose (g/100 g)", "Lactose (g/100 g)", "Maltose (g/100 g)", "Saccharose (g/100 g)");
?>
, 
<!DOCTYPE html>
<html lang="en">
<?php
    
    require_once("template_header.php");
    require_once('template_sidebar.php');
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

    <title>SB Admin 2 - Nutriments</title>

    <!-- Custom fonts for this template -->
    <link href="bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $nom; ?></h1>
                    <p class="mb-4">Nutriments</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <!-- Add a new section to display the data in a table -->
                        <div class="container">
                            <h2>Contenu de l'aliment "<?php echo $nom ?>"</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nutriment</th>
                                        <th>Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) { 
                                        for ($i = 0; $i < sizeof($nutriments); $i++) {?>
                                            <tr>
                                            <td><?php echo $nutriments[$i]; ?></td>
                                            <td><?php echo $row[$i]['quantité']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>






