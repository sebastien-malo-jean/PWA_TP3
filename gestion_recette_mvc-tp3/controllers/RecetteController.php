<?php
namespace App\Controllers;

use App\Models\Categorie;
use App\Models\Recette;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class RecetteController {
        public function __construct(){
        Auth::session();
    }
    public function index() {
    $recette = new Recette;
    $recettes = $recette->select();

    $categorie = new Categorie;
    $categories = $categorie->select();

    $userName = $_SESSION['user_name'] ?? 'Invité';

    $categorieMap = [];
    foreach ($categories as $cat) {
        $categorieMap[$cat['id']] = $cat['nom'];
    }

    foreach ($recettes as &$rec) {
        $rec['categorie_nom'] = $categorieMap[$rec['categorie_id']];
    }

    return View::render('recette/index', ['recettes' => $recettes]);
    }


    public function show($data = []) {
    if (isset($data['id']) && $data['id'] != null) {
        $recette = new Recette;
        $selectId = $recette->selectId($data['id']);

        $categorie = new Categorie;
        $categories = $categorie->select();

        $categorieMap = [];
        foreach ($categories as $cat) {
            $categorieMap[$cat['id']] = $cat['nom'];
        }

        if ($selectId) {
            $selectId['categorie_nom'] = $categorieMap[$selectId['categorie_id']] ?? 'Inconnue';

            return View::render('recette/show', ['recette' => $selectId]);
        } else {
            return View::render('error', ['msg' => 'ne trouve pas cette recette']);
        }
    }
    return View::render('error', ['msg' => 'aucun ID trouvé']);
    }

    public function create(){
        $categorie = new Categorie;
        $categories = $categorie->select('nom');

        return View::render('recette/create', ['categories'=>$categories]);
    }

    public function store($data){
       $validator = new Validator;
       $validator->field('nom', $data['nom'], 'Le nom')->min(2)->max(50)->required();
       $validator->field('description', $data['description'], 'La description')->min(5)->max(255)->required();
       $validator->field('temps_preparation', $data['temps_preparation'], 'Le temps de préparation')->required();
       $validator->field('temps_cuisson', $data['temps_cuisson'], "Le temps de cuisson")->required()->number();
        $validator->field('categorie_id', $data['categorie_id'])->required()->number();
       
       if($validator->isSuccess()){
            $recette = new Recette;
            $insert = $recette->insert($data); 
    
            if($insert){
                return View::redirect('recettes');
            }else{
                return View::render('error');
            }
       }else{
        $errors = $validator->getErrors();
        $categorie = new Categorie();
        $categories = $categorie->select('nom');

        return View::render('recette/create', ['errors'=>$errors, 'inputs'=>$data, 'categories'=>$categories]);
       }

    }

    public function edit($data =[]){
    if(isset($data['id']) && $data['id']!=null){
        $recette = new Recette;
        $selectId = $recette->selectId($data['id']);
        if($selectId){
            $categorie = new Categorie;
            $categories = $categorie->select('nom');
            return View::render('recette/edit', ['categories'=>$categories, 'inputs'=>$selectId]);
        }
    }
    return View::render('error');
    }

    public function update($data = [], $get = []) {
    if (isset($get['id']) && $get['id'] != null) {
        $validator = new Validator;
        $validator->field('nom', $data['nom'], 'Le nom')->min(2)->max(50)->required();
        $validator->field('description', $data['description'], 'La description')->min(5)->max(255)->required();
        $validator->field('temps_preparation', $data['temps_preparation'], 'Le temps de préparation')->required();
        $validator->field('temps_cuisson', $data['temps_cuisson'], "Le temps de cuisson")->required()->number();
        $validator->field('categorie_id', $data['categorie_id'])->required()->number();

        if ($validator->isSuccess()) {
            $recette = new Recette;
            
            if (!$recette->selectId($get['id'])) {
                return View::render('error', ['msg' => 'Recette introuvable.']);
            }
            $update = $recette->update($data, $get['id']);

            if ($update) {
                return View::redirect('recette/show?id=' . $get['id']);
            } else {
                return View::render('error', ['msg' => 'Erreur lors de la mise à jour.']);
            }
        } else {
            $categorie = new Categorie;
            $categories = $categorie->select();

            return View::render('recette/edit', [
                'errors' => $validator->getErrors(),
                'inputs' => $data,
                'categories' => $categories
            ]);
        }
    }
    return View::render('error', ['msg' => 'ID invalide.']);
    }

    public function delete($data){
        $recette = new Recette;
        $delete = $recette->delete($data['id']);
        if($delete){
            return View::redirect('recettes');
        }
        return View::render('error');
    }
}