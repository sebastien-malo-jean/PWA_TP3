<?php
namespace App\Models;
use App\Models\CRUD;

class RecetteIngredient extends CRUD{

    protected $table = "recette_has_ingredient";
    protected $primaryKey = "id";
    protected $fillable = ['nom', 'description', 'instructions', 'temps_preparation', 'temps_cuisson', 'categorie_id'];
}