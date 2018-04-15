<?php
abstract class Model{
    
    protected $db;
    public $lang;
    public $val;
    public $currency;
    public $currency_symbol;
    
    public function __construct(){
        $this->db = new DataBase("localhost", "root", "", "show_master", "+4:00");
    }
    
    public function __call($name, $value){
        return false;
    }

    public function getPages($id = "") {
        $where = "WHERE `id` IS NOT NULL";

        if(!empty($id)){
            $where .= " AND `id`='$id'";
        }
       
        $news = $this->db->query("SELECT *, `title_".$this->lang."` AS `title`, `descr_".$this->lang."` AS `descr` FROM `pages` $where  ORDER BY `id` ASC");
        
        if(!empty($id)) {
            return $news->fetch_assoc();
        }else{
            return $news->fetch_all(MYSQLI_ASSOC);
        }

    }
    
    public function getLabServices($id = "") {
        $where = "WHERE `id` IS NOT NULL";

        if(!empty($id)){
            $where .= " AND `id`='$id'";
        }
       
        $select = $this->db->query("SELECT *, `title_".$this->lang."` AS `title`, `descr_".$this->lang."` AS `descr` FROM `lab_services` $where  ORDER BY `id` ASC");
        
        if(!empty($id)) {
            return $select->fetch_assoc();
        }else{
            return $select->fetch_all(MYSQLI_ASSOC);
        }

    }

    public function gettext() {
       
        $text = $this->db->query("SELECT *, `about_descr_".$this->lang."` AS `about_descr`, `address_".$this->lang."` AS `address` FROM `text`");
         return $text->fetch_assoc();

    }
    
    public function getContacts(){
        return $this->db->query("SELECT * FROM `contacts`")->fetch_assoc();
    }
 
    public function getPhoto($group = "", $parent = "", $count = ""){
        $where = "";
        $limit = "";
        if(!empty($group)){
            $where .= "WHERE `group`='$group'";
        }
        if(!empty($parent)){
            $where .= " AND `parent`='$parent'";
        }
        if(!empty($count)){
            $limit = "limit $count";
        }
        if($count == 1){
            return $this->db->query("SELECT * FROM `photo` $where ORDER BY `sort` ASC, `photoID` ASC $limit")->fetch_assoc();
        }else{
            return $this->db->query("SELECT * FROM `photo` $where ORDER BY `sort` ASC, `photoID` ASC $limit")->fetch_all(MYSQLI_ASSOC);
        }
    }

}
?>