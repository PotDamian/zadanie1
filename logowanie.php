
<?php

//error_reporting(E_ALL | E_NOTICE);
//ini_set('display_errors', '1');

class Logowanie {

    public $check_login_correct= false;
    public $check_pass_correct = false;

    public function valid_login_name() {
        $username = isset($_POST['username']) ? $_POST['username'] : '';


        $login_name = 'fe0b714aaecbd5c8961994c655d18a0d';

        if (md5($username) === $login_name) {
            $this->check_login_correct= true;
        } elseif (md5($username) !== $login_name && !empty($username)) {
            $this->check_login_correct= false;
            $this->wrong_login();

            //    var_dump($this->check_login_correct);
        }
    }

    public function valid_password_name() {

        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $password_name = '207023ccb44feb4d7dadca005ce29a64';
        if (md5($password) === $password_name) {
            $this->check_pass_correct = true;
        } elseif (md5($password) !== $password_name && !empty($password)) {
            $this->check_pass_correct = false;
            $this->wrong_pass();
            //        } elseif (md5($password) !== $passwrod_name && !empty($password)) {
            //            echo "błedne haslo";
            //        } elseif (md5($password) == null) {
            //            echo "nie podales hasla";
            //        }
        }
    }

    public function login_in() {
        header("Location: widok_po_zalogowaniu.php");
    }

    public function wrong_login() {
        echo "zły login ";
    }

    public function wrong_pass() {
        echo "zle haslo";
    }

    public function login_in_if_correct() {
        $this->valid_login_name();
        $this->valid_password_name();
        if ($this->check_pass_correct && $this->check_login_correct) {
            $this->login_in();
            $username = $_POST['username']; //
            session_start();
            $_SESSION['some_var'] = $username; //
            $_SESSION['logged_in'] = true;
        }
    }

}
