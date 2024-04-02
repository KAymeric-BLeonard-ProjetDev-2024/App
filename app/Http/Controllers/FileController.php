<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    private $mainGo;
    private $testFile;
    private $userFile;

    public function __construct($args,$user,$file){
        $this->mainGo = "package main\nimport (\n\"fmt\"\n\"piscine\"\n)\nfunc main() {\n$args\n}\n";

        $path = dirname($_SERVER['SCRIPT_FILENAME']). "\..\storage\app\pools\golang\piscine";
        $this->testFile = $path . "\main\\$user-$file";
        $this->userFile = $path . "-test\main\\$user-$file";

    }

    public function editMainGo(){
        file_put_contents($this->testFile, $this->mainGo);
        file_put_contents($this->userFile, $this->mainGo);
    }

    public function deleteMainGo(){
        unlink($this->testFile);
        unlink($this->userFile);
    }

    public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }
}
