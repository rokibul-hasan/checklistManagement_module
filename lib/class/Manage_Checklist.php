<?php
namespace Checklist;

use Checklist\Config;

use PDO;

class Manage_Checklist{
	
	public $title="sample";
	public $category_id="";
	public $status="";
        public $id="";
        public $created_by="";
        public $modified_by="";
        public $deleted_by="";
        public $created;
        public $modified;
        public $conn="";
        public $data='';

        public function __construct(){           
           /*
            * database connection using PDO
            */
            try{                
                $this->conn=new PDO("mysql:host=localhost;dbname=infinity",'root','123456**--');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (Exception $ex) {
                   echo 'ERROR: ' . $e->getMessage();
            }
	}
        
        public function insert($table='',$data){
            try{
               
                $stmt=$this->conn->prepare("INSERT INTO ".$table." (title,category_id,created_by,created) VALUES (:title,:category_id,:created_by,:created)");
                $time=date("Y-m-d H:i:s");
                $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
                $stmt->bindParam(':category_id', $_POST['category_id'], PDO::PARAM_STR);
                $stmt->bindParam(':created_by', $_POST['created_by'], PDO::PARAM_STR);
                $stmt->bindParam(':created', $time, PDO::PARAM_STR);
                $stmt->execute();
                
                
            } catch (Exception $ex) {
                   echo 'ERROR: ' . $e->getMessage();
            }
            
        }
        
        public function update($id,$data){
            try{
                
                $sql ="UPDATE checklists SET "
                        . "title=:title,"
                        . "category_id=:category_id,"
                        . "modified=NOW(),"
                        . "modified_by=:modified_by "
                        . "WHERE id=:id";
                $stmt=$this->conn->prepare($sql);
                $stmt->bindParam(':title',$_POST['title'], PDO::PARAM_STR);
                $stmt->bindParam(':category_id', $_POST['category_id'], PDO::PARAM_STR);
                $stmt->bindParam(':modified_by', $_POST['modified_by'], PDO::PARAM_STR);
                //$stmt->bindParam(':modified', strtotime (date ("Y-m-d H:i:s")), PDO::PARAM_STR);
                $stmt->bindParam(':id',$_POST['id'], PDO::PARAM_INT);
                $stmt->execute();
                
            } catch (Exception $ex) {
                echo 'ERROR: '.$e->getMessage();
            }
        }
        
        public function delete($id){
            try{
                $query="DELETE FROM checklists WHERE id='$id'";
                $this->conn->query($query);
                return true;
            } catch (Exception $ex) {
                echo '<script>alert(ERROR:'.$e->getMessage().');</script>';
                
            }
        }
        

        
        public function view($table='',$id=''){
            try{
                    if($id){
                    $query="SELECT * FROM $table WHERE id='$id'";
                    $this->data = $this->conn->query($query);
                    foreach($this->data as $row){
                        $data[] = $row;
                    }
                    
                    if(empty($data)){
                        return '';
                    }else{
                        return $data;
                    }
                }

                if($id==''){
                    $query="SELECT * FROM $table";
                    $this->data = $this->conn->query($query);
                    foreach($this->data as $row){
                        $data[] = $row;
                    }
                    
                    if(empty($data)){
                        return '';
                    }else{
                        return $data;
                    }
                }
            
                
            } catch (Exception $ex) {
                echo 'ERROR: ' . $e->getMessage();
            }
            
        }
        public function viewCategoryByChecklist($id){
            try{
                $query="SELECT categories.category_name,checklists.category_id FROM categories LEFT JOIN checklists ON categories.id=checklists.category_id WHERE checklists.id=$id";
                $this->data = $this->conn->query($query);
                foreach($this->data as $row){
                        $data[] = $row;
                    }
                    
                    if(empty($data)){
                        return '';
                    }else{
                        return $data;
                    }
            } catch (Exception $ex) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }
       
        public function countChecklistByCategory(){
            try{
                $query="select categories.category_name as category, count(checklists.title) as item from categories left join checklists on categories.id=checklists.category_id group by categories.category_name";
                $this->data = $this->conn->query($query);
                foreach($this->data as $row){
                        $data[] = $row;
                    }
                    
                    if(empty($data)){
                        return '';
                    }else{
                        return $data;
                    }
            } catch (Exception $ex) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }
        
        
        public function viewByCategory($table='',$id=''){
            try{
                    if($id){
                    $query="SELECT * FROM $table WHERE category_id='$id'";
                    $this->data = $this->conn->query($query);
                    foreach($this->data as $row){
                        $data[] = $row;
                    }
                    
                    if(empty($data)){
                        return '';
                    }else{
                        return $data;
                    }
                }
/*
                if($id==''){
                    $query="SELECT * FROM $table";
                    $this->data = $this->conn->query($query);
                    foreach($this->data as $row){
                        $data[] = $row;
                    }
                    
                    if(empty($data)){
                        return '';
                    }else{
                        return $data;
                    }
                }
            
              */  
            } catch (Exception $ex) {
                echo 'ERROR: ' . $e->getMessage();
            }
            
        }

}
