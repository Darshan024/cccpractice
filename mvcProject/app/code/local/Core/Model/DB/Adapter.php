<?php
class Core_Model_DB_Adapter
{
    public $config = [
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "database" => "",
    ];
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect(
                $this->config['host'],
                $this->config['user'],
                $this->config['password'],
                $this->config['database'],
            );
        }
    }
    public function fetchAll($query)
    {

    }
    public function fetchPairs($query)
    {

    }
    public function fetchOne($query)
    {

    }
    public function fetchRow($query)
    {

    }
    public function insert($query)
    {

    }
    public function update($query)
    {

    }
    public function delete($query)
    {

    }
    public function query($query)
    {

    }
}
?>