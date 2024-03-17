<?php
require_once ("controllers/base_controller.php");
require_once ("models/post.php");

class PostsController extends BaseController
{
    function __construct()
    {
        $this->folder = "posts";
    }

    public function index()
    {
        $posts = Post::all();
        $data = array("posts" => $posts);
        $this->render("index", $data);
    }

    public function showPost()
    {
        $post = Post::find($_GET["id"]);
        $data = array("post" => $post);
        $this->render("show", $data);
    }

    public function deletePost()
    {
        $post = Post::delete($_GET["id"]);
        if ($post) {
            $data = array("post" => "delete success");
        } else {
            $data = array("post" => "delete fail");
        }
        $this->render("delete", $data);

    }

    public function updatePost()
    {
        $post = Post::find($_GET["id"]);
        $data = array("post" => $post);
        $this->render("update", $data);
    }
    public function processUpdatePost()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Lấy dữ liệu từ biểu mẫu
            $title = $_POST["title"];
            $content = $_POST["content"];

            // ID của bài đăng cần cập nhật
            $postId = $_GET["id"];
        }
        $post = Post::update($postId, $title, $content);
        if ($post) {
            echo "Dữ liệu đã được cập nhật thành công.";
        } else {
            echo "Không tìm thấy bài đăng để cập nhật hoặc có lỗi xảy ra.";
        }
    }
}