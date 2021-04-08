<?php

    class Transaccion{

        public $Id;
        public $Monto;
        public $Description;
       
       

        public function __construct($id, $monto, $description)
        {
            $this->Id = $id;
            $this->Monto = $monto;
            $this->Description = $description;
      
            
        }




    }




?>