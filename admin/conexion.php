<?php
class Conect_MySql
{    var $id = "";
    var $query_count = 0;
    function BD()
    {
        $this->cn = mysqli_connect("localhost", "root", "", "netbot_chatbrisana");
        $this->cn->set_charset("utf8");

    }
    function consulta($sql)
    {
        return mysqli_query($this->cn, $sql);
    }
    function execute($query)
    {
        $this->id = mysqli_query($this->cn, $query);
        if (!$this->id) {
            $error1 = mysqli_error($this->cn);
            die("ERROR: error DB.<br> No Se Puede Ejecutar La Consulta:<br> $query <br>MySql Tipo De Error: $error1");
            exit;
        }
        $this->query_count++;
        return $this->id;
    }
    function login($usuario)
    {
        $replaus = str_replace("'", "\'", $usuario);
        $res = $this->execute("SELECT * FROM cousuario WHERE  u_email='" . $replaus . "' and u_estado = 1");
        return $res;
    }
    public function fetch_row($id = "")
    {
        if ($id == "") {
            $id = $this->id;
        }
        $result = mysqli_fetch_array($id);
        return $result;
    }
    public function get_num_rows()
    {
        return mysqli_num_rows($this->id);
    }
    public function close_db()
    {
        return mysqli_close($this->cn);
    }
    public function __construct()
    {
        $this->BD();
    }

}

?>