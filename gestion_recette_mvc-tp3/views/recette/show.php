{{ include('layouts/header.php', {title:'Détails de la recette'})}}
<div class="container">
    <h3>Détails de la recette</h3>

    <label>Nom de la recette :</label>
    <input type="text" name="nom" value="{{ recette.nom }}" readonly>

    <label>Description :</label>
    <textarea name="description" readonly>{{ recette.description }}</textarea>

    <label>Temps de préparation (min) :</label>
    <input type="number" name="temps_preparation" value="{{recette.temps_preparation}}" readonly>

    <label>Temps de cuisson (min) :</label>
    <input type="number" name="temps_cuisson" value="{{recette.temps_cuisson}}" readonly>

    <label>Catégorie :</label>
    <input type="text" name="categorie" value="{{recette.categorie_nom}}" readonly>



    <div class="actions">
        {% if session.privilege_id == 1 %}
        <a class="btn-primary" href="{{base}}/recette/edit?id={{ recette.id }}" class="btn">Éditer</a>
        <form action="{{base}}/recette/delete" method="post" style="display:inline;"
            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">
            <input type="hidden" name="id" value="{{ recette.id }}">
            <button type="submit" class="btn red">Supprimer</button>
        </form>
        {% endif %}
    </div>
</div>

{{ include('layouts/footer.php')}}