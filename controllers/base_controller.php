<?php
class BaseController
{
    protected $folder; // biến có giá trị là thư mục nào đó trong thư mục views, chứa các file view template của phần đang truy cập

    //hàm hiển thị kết quả trả ra cho người dùng
    function render($file, $data = array())
    {
        // kiểm tra file gọi đến có tồn tại hay không
        $view_file = "views/" . $this->folder . "/" . $file . ".php";
        if (is_file($view_file)) {
            // nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
            extract($data);
            // sau đó lưu giá trị trả về sau khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thi ra luôn ở trình duyệt
            ob_start();
            require_once ($view_file);
            $content = ob_get_clean();
            // sau khi đã có kết quả được liệu vào biến content, gọi ra template chung của hệ thống để hiện thị ra cho người dùng.
            require_once ("views/layouts/application.php");
        } else {
            //nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi
            header("Location: index.php?controller=pages&action=error");
        }
    }
}