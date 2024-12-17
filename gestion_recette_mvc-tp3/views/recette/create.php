{{ include('layouts/header.php', {title:'Création de recette'})}}
<div class="container">
    <form method="post">
        <h3>Créer une recette</h3>
        <label>Nom de la recette :
            <input type="text" name="nom" value="{{ inputs.nom }}">
        </label>
        {% if errors.nom is defined %}
        <span class="error">{{ errors.nom }}</span>
        {% endif %}
        <label>Description :
            <input type="text" name="description" value="{{ inputs.description }}">
        </label>
        {% if errors.description is defined %}
        <span class="error">{{ errors.description }}</span>
        {% endif %}
        <label>Temps de préparation (min) :
            <input type="number" name="temps_preparation" value="{{ inputs.temps_preparation }}">
        </label>
        {% if errors.temps_preparation is defined %}
        <span class="error">{{ errors.temps_preparation }}</span>
        {% endif %}
        <label>Temps de cuisson (min) :
            <input type="number" name="temps_cuisson" value="{{ inputs.temps_cuisson }}">
        </label>
        {% if errors.temps_cuisson is defined %}
        <span class="error">{{ errors.temps_cuisson }}</span>
        {% endif %}
        <label>Catégorie :
            <select name="categorie_id">
                <option value="">Sélectionner une catégorie</option>
                {%for categorie in categories %}
                <option value="{{categorie.id}}" {% if(categorie.id == inputs.categorie_id) %} selected {% endif %}>
                    {{categorie.nom}}</option>
                {% endfor %}
            </select>
        </label>
        <input type="submit" value="Créer la recette">
    </form>


</div>

{{ include('layouts/footer.php')}}