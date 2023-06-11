<?php

/*
    Définition de l'objet Posts
    Posts dérive de DB mais ceci ne sera réellement 
    utile que pour les méthodes dynamiques
*/
include_once("db.php");
class Posts extends DB
{
    private string $title = "";
    private string $content = "";
    private int $id_theme = -1;
    private int $id_user = -1;

    public static function getIdByName($title): int
    {
        $db = new db();
        $request = $db->prepare("select * from posts where title=:title");
        $request->bindValue(":title", $title);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_OBJ);      
        if ($result) {
           return $result->id; 
        } else {
            return false;
        } 
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content)
    {
        $this->content = $content;
    }
    public function getTheme(): Themes
    {
        return Themes::getTheme($this->id_theme);
    }
    public function setTheme(Themes $theme)
    {
        return $this->id_theme = $theme->getId();
    }
    public function getUser(): Users
    {
        return Users::getUser($this->id_user);
    }
    public function setUser(Users $user)
    {
        return $this->id_user = $user->getId();
    }
    public static function getPost($id): Posts
    {
        $post = new Posts();
        $request = $post->prepare("select * from posts where id=:id");
        $request->setFetchMode(PDO::FETCH_CLASS, 'Posts');
        $request->bindValue(":id", $id);
        $request->execute();
        $result =  $request->fetch();
        if ($result) {
            return $result;
        } else {
            return $post;
        }
    }
     function save()
    {
        try {
            var_dump('jigfjij');
            $this->beginTransaction();
            $request = $this->prepare("update posts set title=:title, content=:content, id_theme=:id_theme, id_user=:id_user where id=:id");
            $request->bindValue(":id", $this->id);
            $request->bindValue(":title", $this->title);
            $request->bindValue(":content", $this->content);
            $request->bindValue(":id_theme", $this->id_theme);
            $request->bindValue(":id_user", $this->id_user);
            $request->execute();

            if ($request->rowCount() == 0) {
                var_dump('hjhjhjjh');

                $request = $this->prepare("insert into posts (title, content, id_theme, id_user) values (:title, :content, :id_theme, :id_user)");
                $request->bindValue(":title", $this->title);
                $request->bindValue(":content", $this->content);
                $request->bindValue(":id_theme", $this->id_theme);
                $request->bindValue(":id_user", $this->id_user);
                $request->execute();
                $id = $this->lastInsertId();
                if ($id == 0) {
                    var_dump('coucouc');
                    return false;
                } else {
                    $this->id = $id;
                }
            }
            $this->commit();
            return true;
        } catch (Exception $e) {
            var_dump($e);

            $this->rollBack();
            return false;
        }
    }
}
