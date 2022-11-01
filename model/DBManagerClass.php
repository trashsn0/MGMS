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

    // Login User
    public function Login($username, $password)
    {
        $query     = $this->db->prepare("CALL GetUserByUsername(?)");
        $query->execute(array($username));
        $Loginuser = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $Loginuser['password'])) {
            return $Loginuser;
        }
    }

    // Register User
    function registerUser(user $user)
    {
        $query = "CALL RegisterUser(?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $user->getAccessLevel(), PDO::PARAM_INT);
        $stmt->bindParam(2, $user->getUsername(), PDO::PARAM_STR);
        $stmt->bindParam(3, $user->getPassword(), PDO::PARAM_STR);
        $stmt->bindParam(4, $user->getFirstName(), PDO::PARAM_STR);
        $stmt->bindParam(5, $user->getLastName(), PDO::PARAM_STR);
        $stmt->bindParam(6, $return_value, PDO::PARAM_STR, 4000);
        $stmt->execute();


        return $return_value;

        // if ($return_value == 0) {
        //     return true;
        // } elseif ($return_value == 1) {
        //     return false;
        // } else {
        //     return false;
        // }

        // $checkUsernameQuery = "SELECT * FROM user WHERE username = :user;";
        // $stmt = $this->db->prepare($checkUsernameQuery);
        // $stmt->execute(array(':user' => $user->getUsername()));
        // $result = !!$stmt->fetch(PDO::FETCH_ASSOC);

        // if (!$result) { // Create User

        //     $query = $this->db->prepare("INSERT INTO user VALUES(DEFAULT, ?, ?, ?, ?, ?)");

        //     $query->execute(array(
        //         $user->getAccessLevel(),
        //         $user->getUsername(),
        //         password_hash($user->getPassword(), PASSWORD_DEFAULT),
        //         $user->getFirstName(),
        //         $user->getLastName(),
        //     ));
        //     return true;
        // } else { // Username already exists
        //     return false;
        // }
    }

    // Get User By ID
    function getUserById($id)
    {
        $query = $this->db->prepare("CALL GetUserById(?)");
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data == null) {
            $user = null;
        } else {
            $user = new user($data);
        }
        return $user;
    }

    // Wildcard search query
    function searchUser($keyword)
    {
        $query = $this->db->prepare("SELECT * FROM `user` WHERE id LIKE ? OR username LIKE ? OR firstName LIKE ? OR lastName LIKE ?");
        $query->execute(array(/*"%" . */$keyword/* . "%"*/, "%" . $keyword . "%", "%" . $keyword . "%"));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
