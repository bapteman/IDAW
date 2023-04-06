<?php
session_start();
require_once ('template_header.php');
?>
<h2>choisissez votre aliment</h2>

<div class="input-group">
    <input type="text" id="search" class="form-control bg-light border-0 small" placeholder="Search...">
    <div class="input-group-append">
        <button class="btn btn-primary" type="button" onclick="functionSearch()">
            <i class="fas fa-search fa-sm"></i>
        </button>
    </div>
</div>
            <ul id="suggestions"></ul>
            <script>
               $.ajax({
                    url: "http://localhost/IDAW/Projet/API/aliments.php",
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
                    alert($('#search').value);
                }
               

            </script>
<?php
require_once ('template_footer.php');
?>