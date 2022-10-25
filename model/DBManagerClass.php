<?php
spl_autoload_register(function ($class) {
    include "{$class}.php";
});

class DBManager
{
    public $db;

    function __construct()
    {
        $configIni = parse_ini_file('config.ini');

        $host     = $configIni['db_host'];
        $user     = $configIni['db_user'];
        $pass     = $configIni['db_password'];
        $dbname   = $configIni['db_name'];

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::MYSQL_ATTR_DIRECT_QUERY => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die("Database connection Error <br>" . $e->getMessage());
        }
    }

    // Login
    public function Login($username, $password)
    {
        $query     = $this->db->prepare("SELECT * FROM user where username = ?");
        $query->execute(array($username));
        $Loginuser = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $Loginuser['password'])) {
            return $Loginuser;
        }
    }

    //Register
    function registerUser(user $user)
    {
        $query = $this->db->prepare("INSERT INTO user VALUES(DEFAULT, DEFAULT, ?, ?, ?, ?)");
        $query->execute(array(
            $user->getUsername(),
            password_hash($user->getPassword(), PASSWORD_DEFAULT),
            $user->getFirstName(),
            $user->getLastName(),
        ));
    }

    //Get User By ID
    function getCustomer($id)
    {
        $query = $this->db->prepare("SELECT * FROM `user` WHERE id = ?");
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $user = new user($data);

        return $user;
    }
}
