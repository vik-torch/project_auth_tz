<?php

namespace App\AuthUser;

class Authentification
{
    public static function set_session($data) {
        session_start();
        $_SESSION['uid'] = $data->id;
        return $_SESSION['uid'];
    }

    public static function end_session() {
        session_start();
        session_unset();
    }
}
