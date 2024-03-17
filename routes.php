<?php
$controllers = array(
    "pages" => ["home", "error"],
    "posts" => ["index", "showPost", 'deletePost', 'updatePost', "processUpdatePost"]
); // các controllers trong hệ thống và các action có thể gọi ra từ controller đó

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'home';
    $action = "error";
}

// nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once ("controllers/" . $controller . "_controller.php");

//tạo ra tên controller class từ các giá trị lấy được từ url sau đó gọi ra để hiển thị trả về cho người dùng
$class = str_replace("_", "", ucwords($controller, "_")) . "Controller";
$controller = new $class;
$controller->$action();
