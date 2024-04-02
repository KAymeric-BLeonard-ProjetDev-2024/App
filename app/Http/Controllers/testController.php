<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function __construct($command, $testCommand, $pool, $mainFile){
        $this->command = $command . " ";
        $this->pool = $pool;
        $this->mainFile = $mainFile;
        $this->testCommand = $testCommand . " ";
    }

    private $command;
    private $testCommand;
    private $pool;
    private $mainFile;
    private $corect_result;
    private $user_result;


    public function RegularTest($user, $path, $file, $args=null){
        $url = "https://raw.githubusercontent.com/$user/User-repo-test/main$path/$file";
        $userfile = file_get_contents($url);
        $userFilePath = dirname($_SERVER['SCRIPT_FILENAME']). "\..\storage\app\pools\\$this->pool\piscine-test\\$user-$file";
        $correctionFilePath = dirname($_SERVER['SCRIPT_FILENAME']). "\..\storage\app\pools\\$this->pool\piscine$path\\$file";
        
        file_put_contents($userFilePath, $userfile);

        if ($args){
            $files = new FileController($args, $user, $this->mainFile);
            $files->editMainGo();
            $this->corect_result = shell_exec($this->command . $files->testFile);
            $this->user_result = shell_exec($this->testCommand . $files->userFile);
            $files->deleteMainGo();
        } else {
            $this->corect_result = shell_exec($this->command . $correctionFilePath);
            $this->user_result = shell_exec($this->testCommand . $userFilePath);
        }

        unlink($userFilePath);
        
        return $this->corect_result == $this->user_result;
    }
}
