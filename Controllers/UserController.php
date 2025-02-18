<?php

require_once "Models/userModel.php";


    class UserController extends BaseController
    {
    private $users;


    public function __construct()
    {
        $this->users = new UserModel();
    }
    public function index(){
        $result = $this->users->getUsers();
        $this->view('users/usersDisplay', ['users' => $result]);

    }

    /**
     * Displays the create product form.
     */
    public function create()
    {
        $this->view('/users/create');
    }

    public function store()
    {
        $name = $_POST['username'];
        $userEmail = $_POST['email'];
        $password = $_POST['passwordd'];
        $passwordEnypt = password_hash($password, PASSWORD_BCRYPT);
        $userRole = $_POST['role'];

        $this->users->addUser(null, $name, $userEmail, $passwordEnypt, $userRole);
        $this->redirect('/user');
    }


    public function destroy($id)
    {
        $this->users->deleteUser($id);
        $this->redirect('/user');
    }

}
?>