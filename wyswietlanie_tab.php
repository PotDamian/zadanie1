<?php
    include_once('logowanie.php');
    include_once('sesja.php');

    class Db {

    private $stmt;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'mysql';
    private $dbh;
    private $error;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
//         
    }

    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

//        public function bind($param, $value, $type = null) {
//            if (is_null($type)) {
//                switch (true) {
//                    case is_int($value):
//                        $type = PDO::PARAM_INT;
//                        break;
//                    case is_bool($value):
//                        $type = PDO::PARAM_BOOL;
//                        break;
//                    case is_null($value):
//                        $type = PDO::PARAM_NULL;
//                        break;
//                    default:
//                        $type = PDO::PARAM_STR;
//                }   
//            }
//            $this->stmt->bindValue($param, $value, $type);
//        }
//
    public function execute() {
        return $this->stmt->execute();
    }

    public function resultset() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function displaying() {
        echo '<table border=2> ';
        foreach ($this->resultset() as $row) {
            echo "<tr><td>" . $row['Imie'] . "</td><td>" . $row['Nazwisko'] . "</td></tr>";
        }
        echo '</tr></table>';
    }

    public function check_what_is_clicked() {

        $sort= isset($_GET['sort']);
        $search = isset($_GET['search']);
        

        if ($sort == 'sort') {
            $this->sort_asc();
            $this->displaying();
        } elseif (!empty($search) && isset($search) && $search !== null && $search !== '') {
            $this->search();
           
        } elseif (empty($search) && !isset($search)) {
            $this->empty_tab();
        } else {
          
            $this->view_all();
            $this->displaying();
        }
    }

    public function view_all() {

        $this->query("SELECT * FROM osoby");
    }

    public function sort_asc() {
        $this->query("SELECT * FROM osoby ORDER BY Imie ASC");
    }

    public function search() {
        $search = trim($_GET['search']);
        if (!empty($search)) {
            $this->query("SELECT * FROM osoby WHERE Imie LIKE '$search%' ");
             $this->displaying();
        } else {
            $this->empty_tab();
              
        }
    }

    public function empty_tab() {
        echo 'wpisz coś'."<br>";
    }

}
