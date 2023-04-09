<?php
session_start();
require_once ('templates/template_header.php');
?>
<h2>choisissez votre aliment</h2>

<div class="input-group">
    <input type="text" id="search" class="form-control bg-light border-0 small" placeholder="Search...">
    <div class="input-group-append">
        
    </div>
</div>
<div id = "divqté">
    <input type="number" id="quantité" placeholder = "quantité (100g = 1, defaut : 1)" class="form-control bg-light small"> 
</div>
<div id = "divDateConso">
    <input type="date" id="dateConso" placeholder = "date de consommation" class="form-control bg-light small"> 
</div>

<a class="btn btn-primary btn-icon-split" id="searchButton" onclick="functionSearch()">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Ajouter le repas</span>
                                    </a>
            <ul id="suggestions"></ul>
            <script>
               $.ajax({
                    url: "<?php echo(API_URL_BASE)?>/aliments.php",
                    type: 'GET',
                    dataType: 'json',
                    success: function(array) {
                        const searchInput = document.getElementById('search');
                        const suggestionsList = document.getElementById('suggestions');
                        searchInput.addEventListener('input', () => {
                            const inputValue = searchInput.value.toLowerCase();
                            const suggestions = array['data'].filter(item => item['nom'].toLowerCase().includes(inputValue));

                            suggestionsList.innerHTML = '';

                            if (inputValue.length > 0) {
                                suggestions.forEach(item => {
                                    const li = document.createElement('li');
                                    li.innerText = item['nom'];
                                    suggestionsList.appendChild(li);
                                });
                            }
                        });

                        suggestionsList.addEventListener('click', event => {
                            if (event.target.tagName === 'LI') {
                                searchInput.value = event.target.innerText;
                                suggestionsList.innerHTML = '';
                            }
                        });
                    }
                });
                function functionSearch(){
                    var nom = document.getElementById('search').value;
                    var qté = document.getElementById('quantité').value;
                    var dateConso = document.getElementById('dateConso').value
                    const date = new Date(dateConso); // Create a Date object from the string
                    const formattedDate = date.toISOString().slice(0, 10); // Format the date as YYYY-MM-DD                 
                    alert(dateConso);
                    if(qté == null || qté == undefined || qté == 0){
                        qté=1;
                    }alert(qté)
                    if(dateConso=null){
                        alert ('veuillez entrer une date de consommation');
                    }else{
                        $.ajax({
                            url: "<?php echo(API_URL_BASE)?>/aliments.php?nom="+nom,
                            type: 'GET',
                            dataType: 'json',
                            success: function(array) {
                                console.log(array);
                                    $.ajax({
                                        url: "<?php echo(API_URL_BASE)?>/consomme",

                                        method: "POST",


                                        dataType: "json",
                                        data:
                                        {
                                            "id_alim": array['data'][0]['id'],
                                            "id_user": <?php echo $_SESSION['user'];?>,
                                            "quantité": qté,
                                            "date_consommation": formattedDate,
                                        },
                                    });
                                    alert("repas ajouté")
                            },
                        });
                        alert("done");
                    }
                    window.location.reload();
                }
               

            </script>
<?php
require_once ('templates/template_footer.php');
?>