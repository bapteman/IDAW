<!DOCTYPE html>
<html lang="en">
<?php 
    require_once('config.php');
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Projet IDAW Register</title>

    <!-- Custom fonts for this template-->
    <link href="bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" onSubmit = "onFormSubmit()">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Prenom"
                                            placeholder="Prenom">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="Nom"
                                            placeholder="Nom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="niveau">niveau d'activité : </label>
                                        <select name="niveau" id="niveau" class="form-control">
                                            <option value = "faible"> faible </option>
                                            <option value = "moyen"> moyen </option>
                                            <option value = "élevé"> élevé </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="sexe">sexe : </label>
                                        <select name="sexe" id="sexe" class="form-control">
                                            <option value = "homme"> homme </option>
                                            <option value = "femme"> femme </option>
                                            <option value = "none" selected> non précisé </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="Login"
                                        placeholder="login">
                                </div>
                                <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="Password" placeholder="Password">                    
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="Date"
                                        placeholder="Date de naissance">
                                </div> 
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        function onFormSubmit(){
            event.preventDefault();
            let nom = $('#Nom').val()
            let prenom = $('#Prenom').val()
            let dateNaissance = $('#Date').val()
            const date = new Date(dateNaissance); // Create a Date object from the string
            const formattedDate = date.toISOString().slice(0, 10); // Format the date as YYYY-MM-DD
            let login = $('#Login').val()
            let niveau = $('#niveau').val()
            let sexe = $('#sexe').val()
            let pwd = $('#Password').val()
            $.ajax({
                url: "<?php echo(API_URL_BASE)?>/users",

                method: "POST",


                dataType: "json",
                data:
                {
                    "nom": nom,
                    "login": login,
                    "mdp" : pwd,
                    "niveau" : niveau,
                    "sexe" : sexe,
                    "prenom" : prenom,
                    "date" : formattedDate
                },
            }).done(function (response) {
                alert("done");
                    document.location.href='login.php';

                })


                .fail(function (error) {
                    alert("erreur de login/mot de passe ");
                })


                .always(function () {
                })
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="bootstrap/js/sb-admin-2.min.js"></script>

</body>

</html>