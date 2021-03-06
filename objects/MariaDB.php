<?php

/**
 * Created by IntelliJ IDEA.
 * User: marco
 * Date: 19/07/2016
 * Time: 15:12
 */

class QueryResponse
{
    public $Success;
    public $Error;
    public $Value;
    public $SQLString;

    public function __construct($value, $sqlstr = "", $error = "")
    {
        if ($value === false) {
            $this->Success = false;
        } else {
            $this->Success = true;
        }

        $this->Value = $value;
        $this->SQLString = $sqlstr;
        $this->Error = $error;
    }
}

class SQLSyntax
{
    public $Value;
    public $Syntax;

    public function __construct($s)
    {
        $this->Syntax = $s;

        $this->Base();
    }

    public function Query(){
        return MariaDB::Query($this->Value);
    }

    public function JoinSyntaxItem($Syntaxitem)
    {
        $Syntaxitem[0] .= " ";
        if(is_array($Syntaxitem[1])) {
            foreach ($Syntaxitem[1] as $key => $value) {
                if ($key < 1) {
                    $Syntaxitem[0] .= $value;
                } else {
                    $Syntaxitem[0] .= "," . $value;
                }
            }
        }else{
            $Syntaxitem[0] .= $Syntaxitem[1];
        }
        return $Syntaxitem[0] .= " ";
    }

    public function Base()
    {
        foreach ($this->Syntax as &$value) {
            $this->Value .= $this->JoinSyntaxItem($value);
        }
    }
}

class MariaDB
{
    public static $host = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "burnit";


    /**
     * @return mysqli
     */
    private static function Open()
    {
        $conn = new mysqli(self::$host, self::$username, self::$password, self::$database);

        if ($conn->connect_error) {
            die("MariaDB Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    /**
     * @param $querystring
     * @return QueryResponse
     */
    public static function Query($querystring)
    {
        $conn = self::Open();

        $conn->set_charset("utf8");
        $connQuery = $conn->query($querystring);
        return new QueryResponse($connQuery, $querystring, print_r($conn->error_list,true));
    }

    /**
     * @param $table
     * @param $columns
     * @return QueryResponse
     */
    public static function Select($table, $columns)
    {
        $SQLSyntax = new SQLSyntax(array(array("SELECT", $columns), array("FROM", array($table))));
        return self::Query($SQLSyntax->Value);
    }

    /**
     * @param $table
     * @param $columns
     * @return QueryResponse
     */
    public static function Update($table, $columns)
    {
        $SQLSyntax = new SQLSyntax(array(
            array("UPDATE", $table),
            array("SET", $columns),
            array("WHERE", "ID=1")));
        return self::Query($SQLSyntax->Value);
    }
}
