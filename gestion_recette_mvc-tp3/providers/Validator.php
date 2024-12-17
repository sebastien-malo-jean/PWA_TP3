<?php
namespace App\Providers;

class Validator {

    private $errors = [];
    private $key;
    private $value;
    private $name;

    public function field($key, $value, $name=null){
        $this->key = $key;
        $this->value = $value;
        if($name == null){
            $this->name = ucfirst($key);
        }else{
            $this->name = ucfirst($name);
        }
        return $this;
    }

    public function required(){
        if(empty($this->value)){
            $this->errors[$this->key]="$this->name est requis.";
        }
        return $this;
    }

    public function max($length){
        if(strlen($this->value) > $length){
            $this->errors[$this->key]="$this->name doit au moins avoir $length caractères.";
        }
        return $this;
    }

    public function min($length){
        if(strlen($this->value) < $length){
            $this->errors[$this->key]="$this->name doit être égal ou supérieur à $length caractères.";
        }
        return $this;
    }

    public function number(){
        if(!empty($this->value) && !is_numeric($this->value)){
            $this->errors[$this->key]="$this->name doit être un nombre.";
        }
        return $this;
    }

        public function unique($model){
        $model = "App\\Models\\$model";
        $model = new $model;
        $unique = $model->unique($this->key, $this->value);
        if($unique){
            $this->errors[$this->key]="$this->name must be unique.";
        }
        return $this;
    }

    public function isSuccess(){
        if(empty($this->errors)) 
        return true;
    }

    public function getErrors(){
        if(!$this->isSuccess())
        return $this->errors;
    }

}