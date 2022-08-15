<?php

    class User_model extends Connection{
        public function __construct(){
            parent::__construct();
        }
        
        public function AddUser($model){
            try{
                $this->db->pdo->beginTransaction();
                $where = " WHERE Email=:Email";
                $response = $this->db->Select1("Email", "tuser", $where, array('Email' => $model->Email));
                if(is_array($response)){
                    $response = $response['results'];
                    if(count($response) == 0){
                        $model->Is_active = true;
                        $model->State = true;
                        $model->Date = date("Y-m-d");
                        $model->Password = password_hash($model->Password, PASSWORD_DEFAULT);
                        $query = "INSERT INTO tuser (NID, Name, LastName, Email, Password, Phone, Direction, User, Role, Image, Is_active, State, Date) VALUES (:NID, :Name, :LastName, :Email, :Password, :Phone, :Direction, :User, :Role, :Image, :Is_active, :State, :Date)";
                        $sth = $this->db->pdo->prepare($query);
                        $sth->execute((array)$model);
                        $this->db->pdo->commit();
                    }else{
                        return "El email ya esta registrado";
                    }
                }else{
                    return $response;
                }      
                return true;
            }catch(\Throwable $th){
                $this->db->pdo->rollBack();
                return $th->getMessage();
            }
        }
    }

?>