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
        $query = $this->db->prepare("CALL GetUserByUsername(?)");
        $query->execute(array($username));
        $Loginuser = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $Loginuser['password'])) {
            return $Loginuser;
        }
    }

    // Register User
    function registerUser(user $user)
    {
        $accessLevel = $user->getAccessLevel();
        $username = $user->getUsername();
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();

        $stmt = $this->db->prepare("CALL RegisterUser(:accessLevel, :username, :password, :firstName, :lastName, @output)");
        $stmt->bindParam(':accessLevel', $accessLevel);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);

        // call the stored procedure
        $stmt->execute();

        // fetch the output
        $output = $this->db->query("select @output")->fetch(PDO::FETCH_COLUMN);

        if ($output == 1) { // Account Created
            return true;
        } elseif ($output == 0) { // Username already taken
            return false;
        } else { // It shouldnt go here
            return false;
        }
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

    // Get all teachers
    function getAllTeachers()
    {
        $query = $this->db->prepare("CALL GetAllTeachers");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Create Course
    function createCourse(course $course)
    {
        $teacherId = $course->getTeacherId();
        $courseName = $course->getCourseName();
        $startDate = $course->getStartDate();
        $endDate = $course->getEndDate();

        $query = $this->db->prepare("CALL CreateCourse(?, ?, ?, ?)");

        $query->bindParam(1, $teacherId);
        $query->bindParam(2, $courseName);
        $query->bindParam(3, $startDate);
        $query->bindParam(4, $endDate);

        $query->execute();
    }

    // Wildcard user search query
    // function searchUser($keyword)
    // {
    //     $query = $this->db->prepare("SELECT * FROM `user` WHERE id LIKE ? OR username LIKE ? OR firstName LIKE ? OR lastName LIKE ?");
    //     $query->execute(array(/*"%" . */$keyword/* . "%"*/, "%" . $keyword . "%", "%" . $keyword . "%"));
    //     $results = $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $results;
    // }
}
