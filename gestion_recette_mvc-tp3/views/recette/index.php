{{ include('layouts/header.php', {title:'Recettes'})}}
<div class="container">
    <h2>Recettes</h2>
    <table class="recipe-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Temps de préparation</th>
                <th>Temps de cuisson</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            {% for recette in recettes %}
            <tr>
                <td><a href="{{base}}/recette/show?id={{recette.id}}">{{recette.nom}}</a></td>
                <td>{{recette.description}}</td>
                <td>{{recette.temps_preparation}} min.</td>
                <td>{{recette.temps_cuisson}} min.</td>
                <td>{{recette.categorie_nom}}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
    {% if session.privilege_id == 1 %}
    <a href="{{base}}/recette/create" class="btn-primary newRecepies">Nouvelle recette</a>
    {% endif %}
    {{ include('layouts/footer.php')}}
</div>