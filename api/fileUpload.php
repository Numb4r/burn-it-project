<?php


require_once '../cfg/userfnc.php';
require_once '../objects/users.php';
require_once '../objects/log.php';

UserIsLoggedIn();

$CurrentUser = GetCurrentUserInfo();

class File
{
    public $Name;
    public $Size;
    public $Filetype;
    public $TemporaryLocation;
    public $Valid;

    function __construct($name, $size, $tmplocation)
    {
        $this->Name = $name;
        $this->Size = $size;
        $this->Filetype = pathinfo($this->Name, PATHINFO_EXTENSION);
        $this->TemporaryLocation = $tmplocation;
        $this->Valid = true;

        if ($size > 5242880) {
            $this->Valid = false;
        }

        if ($this->Filetype != "jpg" && $this->Filetype != "png" && $this->Filetype != "jpeg"
            && $this->Filetype != "gif"
        ) {
            $this->Valid = false;
        }

    }
}

$CurrentFile = new File($_FILES["arquivo"]["name"], $_FILES["arquivo"]["size"], $_FILES["arquivo"]["tmp_name"]);

if ($CurrentFile->Valid) {

    $Filepath = '../imgs/avatars/' . $CurrentUser->ID . '/';


    mkdir($Filepath,0777, true);


    move_uploaded_file($CurrentFile->TemporaryLocation, $Filepath . "avatar." . $CurrentFile->Filetype);
    $CurrentUser->ChangeImage($Filepath . "avatar." . $CurrentFile->Filetype);
}