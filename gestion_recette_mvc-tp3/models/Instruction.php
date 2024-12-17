<?php
namespace App\Models;
use App\Models\CRUD;

class Instruction extends CRUD{

    protected $table = "instruction";
    protected $primaryKey = "id";
    protected $fillable = ['etapes', 'description', 'recette_id'];
}