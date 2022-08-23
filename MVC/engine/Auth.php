<?php


namespace app\engine;

use app\engine\App;
class Auth
{
    public static function Auth($login, $pass)
    {
        $user = App::call()->userRepository->getOneWhere('login', $login);
        if (password_verify($pass, $user->pass) && !empty($user)) {
            $_SESSION['admin'] = $user->login;
            $_SESSION['role'] = $user->role;
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['admin'])) {
            return $_SESSION['role']== 1;
        } else {
            return false;
        }
    }
}