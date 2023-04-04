<?php
    require_once('template_header.php');
?>

<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <table class="table" id="table">
            <thead>
            <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                </tr>
            </thead>
            <tbody id="studentsTableBody">
            </tbody>
        </table>
        
        <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
        <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
        <script>
        let table;
        $(document).ready(function () {
            initTable();
        })
        function initTable() {
            table = $('#table').DataTable({
            ajax: "http://localhost/IDAW/Projet/API/users.php",
            dataSrc: '',
            dom: 'Bfrtip',
            columns: [
                { "data": "id" },
                { "data": "login" },
            ]
        });
    };
    </script>                              
    </div>
</div>

<?php
    require_once('template_footer.php');
?>