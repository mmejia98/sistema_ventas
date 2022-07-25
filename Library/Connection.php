<?php

class Connection{
    public function __construct(){
        $this->db = new QueryManager("root", "", "sistema_ventas");
    }
}

?>