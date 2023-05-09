<?php 
class TodoList {
    private $id; 
    private $title; 
    private $discription;
    private $important; 


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this -> id = $id;
    }
    public function geTtitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this -> title = $title;
    }
    public function getDescription(){
        return $this->discription;
    }
    public function setDescription($discription){
        $this -> discription = $discription;
    }
    public function getImportant(){
        return $this->important ? "Yes" : "No";
    }
    public function setImportant($important){
        $this -> important = $important;
    }
};

?>