<?php
include_once "db.php";
/**
 * Users
 */
class Users extends DB
{
    protected string $prenom = "";
    protected string $email = "";
    protected string $password = "";

    /**
     * getUser
     *
     * @param  mixed $id
     * @return Users
     */
    public static function getUser(int $id): ?Users
    {
        $user = new Users();
        $request = $user->prepare("select * from users where id=:id");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $request->bindValue(":id", $id);
        $request->execute();
        $result =  $request->fetch();
        if ($result) {
            return $result;
        } else {
            return $user;
        }
    }
    /**
     * getByEmail
     *
     * @param  mixed $email
     * @return Users
     */
    public static function getByEmail(string $email): ?Users
    {
        $user = new Users();
        $request = $user->prepare("select * from users where email=:email");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $request->bindValue(":email", $email);
        $request->execute();
        $result =  $request->fetch();
        if ($result) {
            return $result;
        } else {
            return $user;
        }
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return Users
     */
    public static function delete(int $id): ?Users
    {
        $user = new Users();
        $request = $user->prepare("delete from users where id=:id");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $request->bindValue(":id", $id);
        $request->execute();
        $result =  $request->fetch();
        if ($result) {
            return $result;
        } else {
            return $user;
        }
    }
    /**
     * listAll
     *
     * @return array
     */
    public static function listAll(): array
    {
        $db = new DB();
        $request = $db->prepare("select * from users");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_CLASS, "Users");
    }
    public static function getGroupByUsers($id)
    {
        $group = new Users();
        $request = $group->prepare("SELECT users.* FROM users
        INNER JOIN usersgroups on users.id=usersgroups.id_users
        inner join groups on usersgroups.id_groups=tgroups.id
        WHERE tgroups.id=:id");
        $request->bindParam(":id", $id, PDO::PARAM_INT);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_CLASS, "Users");
    }
    /**
     * listPosts
     *
     * @return array
     */
    public function listPosts(): array
    {
        $request = $this->prepare("select * from posts where id_theme=:id_theme");
        $request->bindValue(":id_theme", $this->id);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_CLASS, "Posts");
    }
    /**
     * Connexion
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return void
     */
    public static function Connexion($email, $password)
    {
        $conn = new Users();
        $query = $conn->prepare("SELECT * FROM users  WHERE email = :email");
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        $result = $query->fetch();
        return (password_verify($password, $result->password));
    }
    /**
     * initialisationPass
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return void
     */
    public static function initialisationPass($email, $password)
    {
        $conn = new Users();
        $mail_recup_exist = $conn->prepare("SELECT * FROM users  WHERE email = :email");
        $mail_recup_exist->bindValue(':email', $email, PDO::PARAM_STR);
        $mail_recup_exist->execute();
        $mail_recup_exist = $mail_recup_exist->rowCount();
        if ($mail_recup_exist == 1) {
            $hashedPassword = password_hash($conn->password, PASSWORD_DEFAULT);
            $recup_insert = $conn->prepare('UPDATE users SET password =? WHERE email = ?');
            $recup_insert->execute(array($hashedPassword, $email));
        } else {

            $recup_insert = $conn->prepare('INSERT INTO users(email,password) VALUES (?, ?)');
            $recup_insert->execute(array($password, $email));
        }
    }
    /**
     * save
     *
     * @return bool
     */
    function save(): bool
    {
        try {
            $this->beginTransaction();
            $request = $this->prepare("update users set email=:email where id=:id");
            $request->bindValue(":id", $this->id);
            $request->bindValue(":email", $this->email);
            $request->execute();

            if ($request->rowCount() == 0) {
                $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
                $request = $this->prepare("insert into users (email, password) values (:email, :password)");
                $request->bindValue(":email", $this->email);
                $request->bindValue(":password", $hashedPassword);
                $request->execute();
                $id = $this->lastInsertId();
                if ($id == 0) {
                    $this->rollBack();
                    return false;
                } else {
                    $this->id = $id;
                }
            }
        } catch (Exception $e) {
            $this->rollBack();
            return false;
        }
        $this->commit();
        return true;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
}
