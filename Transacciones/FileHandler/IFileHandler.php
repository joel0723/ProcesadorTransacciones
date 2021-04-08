<?php

    interface IFileHanlder
    {
        public function SaveFile($value);
        public function ReadFile();
        function CreateDirectory($path); 

    }

?>