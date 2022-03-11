<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        echo "kfc";
    }

    public function login()
    {
        $data = [
            'action' => isset($_POST['login']) ? $_POST['login'] : 'gg',
            'name' => isset($_POST['name']) ? $_POST['name'] : 'gg',
            'password' => isset($_POST['password']) ? $_POST['password'] : 'gg',
            'url' => "pages/blog"
        ];

        $this->view('login', $data);
        if ($data['action'] == 'login') {
            $result= $this->userModel->checkUser($data);
            echo $result;
        }
    }

    public function signup()
    {

        $data = [
            'action' => isset($_POST['insert']) ? $_POST['insert'] : 'gg',
            'name' => isset($_POST['name']) ? $_POST['name'] : 'gg',
            'email' => isset($_POST['email']) ? $_POST['email'] : 'gg',
            'password' => isset($_POST['password']) ? $_POST['password'] : 'gg',
            'Cpassword' => isset($_POST['Cpassword']) ? $_POST['Cpassword'] : 'gg',

        ];



        $this->view('signup', $data);

        if ($data['password'] != $data['Cpassword']) {
            echo "Password not match";
        } else if ($data['action'] == "insert") {
            $this->userModel->insertUser($data);
        }
    }
}
