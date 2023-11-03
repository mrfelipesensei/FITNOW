<?php
namespace App\Session;
class Login{

    #Método responsável por verificar se o usuário está logado
    public static function isLogged(){
        return false;
    }

    #Método que obriga o usuário a estar logado para acessar
    public static function requireLogin(){
        if (!self::isLogged()) {
            header('location: ../login.php');
            exit;
        }
    }

    #Método que obriga o usuário a estar deslogado do sistema
    public static function requireLogout(){
        if (self::isLogged()) {
            header('location: ./index.html');
            exit;
        }
    }

}