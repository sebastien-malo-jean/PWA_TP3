<?php
namespace App\Providers;
use App\Providers\View;

class Auth {
    static public function session(){
        if(isset($_SESSION['finger_print']) and $_SESSION['finger_print']===md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
            return true;
        }else{
            return view::redirect('login');
        }
    }

    static public function privilege($id){
        if($_SESSION['privilege_id']===$id){
            return true;
        }else{
            return view::redirect('login');
        }
    }
}