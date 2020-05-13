<?php
$filepath=realpath(dirname(__FILE__)); 
include_once ($filepath.'/session.php');
include_once ($filepath.'/database.php');
include_once ($filepath.'/format.php');
class Client
{   private $db;
    private $fm;
	function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}


	public function addClient($name,$vatNo,$location,$landNo,$email,$poNo)
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );
        $querycheck="select * from client where landNo='$landNo'";
        $resultCheck=$this->db->select($querycheck);
        if($resultCheck!=true)
        {
            $query = "INSERT INTO client(name,vatNo,location,landNo,email,poNo,date) VALUES('$name','$vatNo','$location','$landNo','$email','$poNo',NOW())";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "client Inserted";
                return $msg;
            } else {
                $msg = "client Not Inserted";
                return $msg;
            }
        }else
        {
            $msg = "client Not Inserted Check Landline No ALreadly Exits";
            return $msg;
        }

    }
    public function updateClient($id,$name,$vatNo,$location,$landNo,$email,$poNo)
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );

            $query = "update client set name='$name',vatNo='$vatNo',location='$location',landNo='$landNo',email='$email',poNo='$poNo' where id='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "client Updated";
                return $msg;
            } else {
                $msg = "client Not Updated";
                return $msg;
            }


    }

      public function getAllEmplayee()
    {
        $query="select * from client";
        $result=$this->db->select($query);
        return $result;
    }
      public function getAllClientById($Id)
    {
        $query="select * from client where id='$Id'";
        $result=$this->db->select($query);
        return $result;
    }

	public function delete($id)
    {
        $query="delete from client where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }


}