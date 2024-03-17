<?php
class Post
{
    public $id;
    public $title;
    public $content;

    function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query("select * from posts");
        foreach ($req->fetchAll() as $item) {
            $list[] = new Post($item["id"], $item["title"], $item["content"]);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->query("select * from posts where id = $id");
        // $req->execute(array("id" => $id));
        $item = $req->fetch();
        if (isset ($item["id"])) {
            return new Post($item["id"], $item["title"], $item["content"]);
        } else {
            return null;
        }
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("delete from posts where id = $id");
        if ($req->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function update($id, $title, $content)
    {
        $db = DB::getInstance();
        // $req = $db->query("UPDATE posts SET title = `$title`, content = `$content` WHERE id = $id");
        // Chuẩn bị câu lệnh SQL với tham số liên kết
        $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $db->prepare($sql);

        // Gán giá trị cho các tham số liên kết
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);

        // Thực thi câu lệnh SQL đã chuẩn bị
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
