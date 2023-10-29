<?php 

namespace App;

class Connexion{

    public $db,$password,$user,$host;

    public function __construct($credentials)
    {
        $this->db = $credentials['db'];
        $this->password = $credentials['password'];
        $this->host = $credentials['host'];
        $this->user = $credentials['user'];
    }

    public function connect(&$access)
    {

        try {
            $access = new \mysqli($this->host,$this->user,$this->password,$this->db);
        } catch (\Throwable $th) {
            return [
                'status' => $th->getCode(),
                'message' => $th->getMessage()
            ];
        }

    }

    public function logout(&$access)
    {
        $access->close();
    }

}