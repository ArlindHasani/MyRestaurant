<?php
require_once('../Databaza/db.php');

if (!isset($_SESSION)) {
    session_start();
}

class userCRUD extends dbCon
{
    private $userID;
    private $userName;
    private $userPassword;
    private $userEmail;
    private $userPhone;
    private $accessLevel;
    private $dbConn;

    public function __construct($userID = '',$userName = '', $userPassword = '', $userEmail = '', $userPhone = '', $accessLevel = '')
    {   
        $this->userID = $userID;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->userEmail = $userEmail;
        $this->userPhone = $userPhone;
        $this->accessLevel = $accessLevel;

        $this->dbConn = $this->connDB();
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function getUserPhone()
    {
        return $this->userPhone;
    }

    public function setUserPhone($userPhone)
    {
        $this->userPhone = $userPhone;
    }

    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    public function setAcessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;
    }

    public function addUSer()
    {
        try{
            $sql = "INSERT INTO `users`(`userName`,`userPassword`, `userEmail`, `userPhone`, `accessLevel`) VALUES (?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userName, $this->userPassword, $this->userEmail, $this->userPhone, "user"]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function adminAddUSer()
    {
        try{
            $sql = "INSERT INTO `users`(`userName`,`userPassword`, `userEmail`, `userPhone`, `accessLevel`) VALUES (?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userName, $this->userPassword, $this->userEmail, $this->userPhone, $this->accessLevel]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteUser()
    {
        try{
            $sql= 'DELETE FROM users WHERE userID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);
        }catch(Exeception $e){
            return $e->getMessage();
        }
    }

    public function checkUserEmail()
    {
        try {
            $sql = 'SELECT userEmail from users WHERE userEmail = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userEmail]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkPassword()
    {
        try {
            $sql = 'SELECT * from users WHERE userEmail = ? and userPassword = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userEmail, $this->userPassword]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkUserInfo($userID)
    {
        try{
            $sql = 'SELECT * from users WHERE userID = :userID';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([':userID'=>$this->userID=$userID]);
            $rezultati =$stm->fetch(PDO::FETCH_ASSOC);
            return $rezultati;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateUserInfo()
    {
        try{
            $sql = 'UPDATE users SET userName = ?, userPassword = ?, userEmail = ?, userPhone = ? WHERE userID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userName, $this->userPassword,$this->userEmail,$this->userPhone, $this->userID]);
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateUserInfoAdmin()
    {
        try{
            $sql = 'UPDATE users SET userPassword = ?, accessLevel = ? WHERE userID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userPassword,$this->accessLevel,$this->userID]);
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function countAllUsers(){
        try{
            $sql = 'SELECT COUNT(*) AS all_users FROM users';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $allUsers =$stm->fetch(PDO::FETCH_ASSOC);
            return $allUsers;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function readAllUsers(){
        try{
            $sql = 'SELECT * FROM users';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $users = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}