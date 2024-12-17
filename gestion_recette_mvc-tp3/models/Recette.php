<?php
namespace App\Models;
use App\Models\CRUD;

class Recette extends CRUD{

    protected $table = "recette";
    protected $primaryKey = "id";
    protected $fillable = ['nom', 'description', 'instructions', 'temps_preparation', 'temps_cuisson', 'categorie_id'];
}