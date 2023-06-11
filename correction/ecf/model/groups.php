<?php

class Groups extends DB
{
    private string $name;
    private string $description;
    
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getDescription(): string
    {
        return $this->name;
    }
    public function setDescription(string $description)
    {
        $this->name = $description;
    }
    
    public static function getGroups(int $id): ?Groups
    {
        $theme = new Groups();
        $request = $theme->prepare("select * from Groups where id=:id");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Groups');
        $request->bindValue(":id", $id);
        $request->execute();
        $result =  $request->fetch();
        if ($result) {
            return $result;
        } else {
            return $theme;
        }
    }
    public static function listAll(): array
    {
        $db = new db();
        $request = $db->prepare("SELECT name, description, id FROM `Groups`");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);        
    }
    public static function listGroupByID($name): array
    {
        $groups = new Groups;
        $request = $groups->prepare("SELECT name, description from `Groups` where name=:name");
        $request->bindValue(":name", $name);
        $request->execute();
        return $request->fetchAll();
    }
    public static function listUserByGroups($name): array
    {
        $group = new groups;
        $request = $group->prepare
        ("SELECT u.username
        FROM users u
        JOIN usersgroups ug ON u.Id = ug.Id_users
        JOIN `groups` g ON g.Id = ug.Id_groups
        WHERE g.name = :name");

        $request->bindValue(":name", $name);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    function save(): bool
    {
        try {
            $this->beginTransaction();
            $request = $this->prepare("update Groups set name=:name where id=:id");
            $request->bindValue(":id", $this->id);
            $request->bindValue(":name", $this->name);
            $request->execute();

            if ($request->rowCount() == 0) {
                $request = $this->prepare("insert into Groups (name) values (:name)");
                $request->bindValue(":name", $this->name);
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
}
