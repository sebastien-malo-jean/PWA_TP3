{{ include('layouts/header.php', {title:'Edition'.recette.nom})}}

<div class="container">
    <h3>Modifier la recette</h3>

    <form method="POST">
        <input type="hidden" name="id" value="{{recette.id}}">
        <label>Nom de la recette :</label>
        <input type="text" name="nom" value="{{ inputs.nom }}">
        {% if errors.nom is defined %}
        <span class="error">{{ errors.nom }}</span>
        {% endif %}

        <label>Description :
            <textarea name="description">{{ inputs.description }}</textarea>
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
                <option value="">Sélectionnez une catégorie</option>
                {%for categorie in categories %}
                <option value="{{categorie.id}}" {% if(categorie.id == inputs.categorie_id) %} selected {% endif %}>
                    {{categorie.nom}}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.categorie_id is defined %}
        <span class="error">{{ errors.categorie_id }}</span>
        {% endif %}

        <input type="submit" value="Sauvegarder les modifications" class="btn">
    </form>
</div>

{{ include('layouts/footer.php')}}