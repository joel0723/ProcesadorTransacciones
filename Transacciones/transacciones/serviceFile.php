<?php

class ServiceFile
{
    private $FileHandler;
    private $utilities;
    private $directory;
    private $filename;

    public function __construct($isRoot = false)
    {
        $subdirectory = ($isRoot)? "transacciones/" : "";

        $this->directory = "{$subdirectory}data";
        $this->filename = "estudiantes";
        $this->FileHandler = new JsonFileHandler($this->directory, $this->filename);
        $this->utilities = new Utilities();
    }


    public function Add($item)
    {
        $estudiantes = $this->GetList();

        if (count($estudiantes) == 0) {

            $item->Id = 1;
        } else {

            $lastElement = $this->utilities->getLastElement($estudiantes);

            $item->Id = $lastElement->Id + 1;
        }

      

        array_push($estudiantes, $item);

        #setcookie($this->cookieName,json_encode($estudiantes) , $this->getCookieTime(), "/");
        $this->FileHandler->SaveFile($estudiantes);
    }


    public function GetList()
    {

        $estudiantes = $this->FileHandler->ReadFile();

        if($estudiantes === null)
        {
            return array();
        }

        return(array) $estudiantes;
    }

    public function GetById($id)
    {
        $estudiantes = $this->GetList();

        $estudiantes = $this->utilities->searchProperty($estudiantes, "Id", $id);

        return $estudiantes[0];
    }


    public function Edit($item)
    {
        $estudiantes = $this->GetList();

        $index = $this->utilities->getIndexElement($estudiantes, "Id", $item->Id);
        

        if($index !== null){
            $estudiantes[$index] = $item;
            #setcookie($this->cookieName, json_encode($estudiantes), $this->getCookieTime(), "/");
            $this->FileHandler->SaveFile($estudiantes);

        }
    }

    public function Delete($item)
    {
        $estudiantes = $this->GetList();

        $index = $this->utilities->getIndexElement($estudiantes, "Id", $item);

        if (isset($index)) {

            unset($estudiantes[$index]);

           # setcookie($this->cookieName, json_encode($estudiantes), $this->getCookieTime(), "/");
           $this->FileHandler->SaveFile($estudiantes);
        }
    }


}
