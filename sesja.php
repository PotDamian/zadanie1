<?php

include_once('logowanie.php');

class Sesja {

    public function __construct() {
        session_start();
        $this->set_var_session();
        $this->for_not_logged();

//        $this->user_logg_in();
    }

    public function set_var_session() {
        if (isset($_SESSION['some_var'])) {
            echo "Zalogowany jako: " . $_SESSION['some_var'];
        } else {
            echo "nie udalo się pobrać nazwe uzytkownika[loginu]";
        }
    }

    public function clean_session() {

        session_start();
        session_unset();
        header('Location: index.php');
    }

    public function logout() {
        $this->clean_session();
    }

    public function for_not_logged() {
        if (!isset($_SESSION['logged_in'])) {
            header('Location: ../index.php');
            exit();
        }
    }   

}
