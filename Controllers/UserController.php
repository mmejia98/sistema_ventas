<?php

class UserController extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function Register(){
        $roles = $this->role->GetRoles();
        $model1 = Session::getSession("model1");
        $model2 = Session::getSession("model2");
        if($model1 != null || $model2 != null){
            $array1 = unserialize($model1);
            $array2 = unserialize($model2);
            if($array1 != null && $array2 != null){
                $model1 = $this->TUser($array1);
                $model2 = $this->TUser($array2);
                $rol = array(array("Role" => $model1->Role));
                $i = 1;
                foreach($roles as $key => $value){
                    if($model1->Role != $value["Role"]){
                        $rol[$i] = array("Role" => $value["Role"]);
                        $i++;   
                    }
                }
                $this->view->Render($this, "register", $model1, $model2, $rol);
            }else{
                $this->view->Render($this, "register", null, null, $roles);
            }
        }else{
            $this->view->Render($this, "register", null, null, $roles);
        }
        
    }

    public function AddUser(){
        $execute = true;
        $nid = "";
        $name = "";
        $lastname = "";
        $email = "";
        $password = "";
        $phone = "";
        $direction = "";
        $user = "";
        $role = "";
        $image = null;
        if(empty($_POST["nid"])){
            $nid = "Ingrese el numero de identidad";
            $execute = false;
        }
        if(empty($_POST["name"])){
            $name = "Ingrese el nombre";
            $execute = false;
        }
        if(empty($_POST["lastname"])){
            $lastname = "Ingrese el apellido";
            $execute = false;
        }
        if(empty($_POST["email"])){
            $email = "Ingrese el email";
            $execute = false;
        }else{
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                $email = "Ingrese un email valido";
                $execute = false;
            }
        }
        if(empty($_POST["password"])){
            $password = "Ingrese el password";
            $execute = false;
        }
        if(empty($_POST["direction"])){
            $direction = "Ingrese la dirección";
            $execute = false;
        }
        if(empty($_POST["phone"])){
            $phone = "Ingrese el telefono";
            $execute = false;
        }
        if(empty($_POST["user"])){
            $user = "Ingrese el tipo de usuario";
            $execute = false;
        }
        if("Seleccione un rol" == $_POST["role"]){
            $role = "Seleccione un rol";
            $execute = false;
        }
        $img = file_get_contents(URL.RQ.VIEWS."images/default.png");
        $image = base64_encode($img);
        if(isset($_FILES['file'])){
            $archivo = $_FILES['file']["tmp_name"];
            if($archivo != null){
                $contents = file_get_contents($archivo);
                $image = base64_encode($contents);
            }else{
                $model1 = Session::getSession("model1");
                if($model1 != null){
                    $array1 = unserialize($model1);
                    $image = $array1["Image"];
                }else{
                    $img = file_get_contents(URL.RQ.VIEWS."images/default.png");
                    $image = base64_encode($img);
                }
            }
        }
        
        $model1 = array(
            "NID" => $_POST["nid"],
            "Name" => $_POST["name"],
            "LastName" => $_POST["lastname"],
            "Email" => $_POST["email"],
            "Password" => $_POST["password"],
            "Phone" => $_POST["phone"],
            "Direction" => $_POST["direction"],
            "User" => $_POST["user"],
            "Role" => $_POST["role"],
            "Image" => $image
        );
        Session::setSession('model1', serialize($model1));
        if($execute){
            $value = $this->model->AddUser($this->TUser($model1));
            if(is_bool($value)){
                Session::setSession('model1', "");
                Session::setSession('model2', "");
                header('Location: User');
            }else{
                Session::setSession('model2', serialize(array(
                    "Role" => $value,
                )));
                header('Location: Register');
            }
        }else{
            Session::setSession('model2', serialize(array(
                "NID" => $nid,
                "Name" => $name,
                "LastName" => $lastname,
                "Email" => $email,
                "Password" => $password,
                "Phone" => $phone,
                "Direction" => $direction,  
                "User" => $user,
                "Role" => $role
            )));
            header('Location: Register');  
        }   
    }
    public function User(){
        $this->view->Render($this, "user", null, null, null);
    }

    public function Cancel(){
        Session::setSession('model1', "");
        Session::setSession('model2', "");
        header('Location: Register');
    }
}

?>