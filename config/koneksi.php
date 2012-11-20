
<?php
        
class Koneksi{
        var $host ='127.0.0.1';
        var $user ='root';
        var $pass ='';
        var $db ='e_asruta';
     
        function _connect(){
            $connect = mysql_connect($this->host, $this->user, $this->pass);
            if($connect) {
			$pilihdb= mysql_select_db($this->db);                             
        }
        
        function _disconnect(){
            $close = mysql_close();
        }      
}
