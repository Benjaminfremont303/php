<?php

/**
 * Groups set et get de la class
 */
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
        return $this->description;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    /**
     * getGroups
     *
     * @param  mixed $id obtenir le groupe par id
     * @return Groups
     */
    /**
     * listAll
     *
     * @return array lister les groupes
     */
    public static function listAll(): array
    {
        $db = new db();
        $request = $db->prepare("SELECT name, description, id FROM `Groups`");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * listGroupByID
     *
     * @param  mixed $name lister groupe par nom
     * @return array
     */
    public static function listGroupByName($name): array
    {
        $groups = new Groups;
        $request = $groups->prepare("SELECT * from `Groups` where name=:name");
        $request->bindValue(":name", $name);
        $request->execute();
        return $request->fetchAll();
    }
    /**
     * listUserByGroups
     *
     * @param  mixed $name lister les utilisateurs du groupe
     * @return array
     */
    public static function listUserByGroups($name): array
    {
        $group = new Groups;
        $request = $group->prepare("SELECT u.username
        FROM users u
        JOIN usersgroups ug ON u.Id = ug.Id_users
        JOIN `groups` g ON g.Id = ug.Id_groups
        WHERE g.name = :name");

        $request->bindValue(":name", $name);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    public static function listGroupById($id): Groups
    {
        $group = new db();
        $request = $group->prepare("select * from `Groups` where Id=:id");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Groups');
        $request->bindValue(":id", $id);
        $request->execute();
        $result =  $request->fetch();
        if ($result) {
            return $result;
        } else {
            return new groups;
        }
    }
    /**
     * save
     *
     * @return bool sauvegarder ou mettre à jour
     */
    function save(): bool
    {
        try {
            $this->beginTransaction();
            $request = $this->prepare("update `Groups` set name=:name, description=:description where id=:id");
            $request->bindValue(":id", $this->id);
            $request->bindValue(":name", $this->name);
            $request->bindValue(":description", $this->description);
            $request->execute();

            if ($request->rowCount() == 0) {
                $request = $this->prepare("insert into `Groups` (name, description) values (:name, :description)");
                $request->bindValue(":description", $this->description);
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

    // suppression 
    function delete()
    {
        $request = $this->prepare("delete from `groups` where id=:id");
        $request->bindValue(":id", $this->id, PDO::PARAM_STR);
        $request->execute();
    }
}
