<?php

class Themes extends DB
{
    private string $name;
    
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    
    public static function getTheme(int $id): ?Themes
    {
        $theme = new Themes();
        $request = $theme->prepare("select * from themes where id=:id");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Themes');
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
        $request = $db->prepare("select * from themes");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);        
    }
    public static function listPosts($id): array
    {
        $theme = new Themes;
        $request = $theme->prepare("select * from posts where id_theme=:id_theme");
        $request->bindValue(":id_theme", $id);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    function save(): bool
    {
        try {
            $this->beginTransaction();
            $request = $this->prepare("update themes set name=:name where id=:id");
            $request->bindValue(":id", $this->id);
            $request->bindValue(":name", $this->name);
            $request->execute();

            if ($request->rowCount() == 0) {
                $request = $this->prepare("insert into themes (name) values (:name)");
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
