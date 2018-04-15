<?php 
class Admin extends Model{
    
    public $user_cnt;
    
    public function __construct(){
        parent::__construct();
        $this->user_cnt = new User();
    }
    
    // Sign
    
    public function login(){
        if(empty($_POST['login']) || empty($_POST['password'])){
            unset($_SESSION['admin']);
            return false;
        }
        $admins = $this->db->query("SELECT * FROM `admin` WHERE `email`='".$_POST['login']."' AND `password`='".$_POST['password']."'");
        if($admins->num_rows == 1){
            $_SESSION['admin'] = $admins->fetch_assoc();
            echo json_encode([
                "error" => false,
                "location" => [
                    "href" => false,
                    "hash" => false,
                    "reload" => true
                ]
            ]);
            return false;
        }else{
            unset($_SESSION['admin']);
            echo json_encode([
                "error" => [
                    "field" => ["password", "email"],
                    "message" => '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Սխալ մոտքանուն կամ գաղտնաբառ!</div>'
                ],
                "location" => false
            ]);
            return false;
        }
    }
    
    public function logOut(){
        unset($_SESSION['admin']);
    }

    // User
    
    // Add 
    public function addNews(){
            $this->db->query("INSERT INTO `news`(`title_am`, `title_en`, `title_ru`,`descr_am`, `descr_en`, `descr_ru`, `date`)VALUES('".$_POST['title_am']."', '".$_POST['title_en']."', '".$_POST['title_ru']."', '".$_POST['descr_am']."', '".$_POST['descr_en']."', '".$_POST['descr_ru']."', NOW())");
    }
    
    public function addSpecialists(){
            $this->db->query("INSERT INTO `specialists`(`name_am`, `name_en`, `name_ru`,`descr_am`, `descr_en`, `descr_ru`)VALUES('".$_POST['name_am']."', '".$_POST['name_en']."', '".$_POST['name_ru']."', '".$_POST['descr_am']."', '".$_POST['descr_en']."', '".$_POST['descr_ru']."')");
    }
    
    public function addtext(){
            $this->db->query("INSERT INTO `text`(`about_descr_am`, `about_descr_en`, `about_descr_ru`, `address_am`, `address_en`, `address_ru`, `phone1`, `phone2`,  `email`)VALUES('".$_POST['descr_am']."', '".$_POST['descr_en']."', '".$_POST['descr_ru']."', '".$_POST['address_am']."', '".$_POST['address_en']."', '".$_POST['address_ru']."', '".$_POST['phone1']."', '".$_POST['phone2']."', '".$_POST['email']."')");
    }
    
    public function addLabServices(){
            $this->db->query("INSERT INTO `lab_services`(`title_am`, `title_en`, `title_ru`,`descr_am`, `descr_en`, `descr_ru`)VALUES('".$_POST['title_am']."', '".$_POST['title_en']."', '".$_POST['title_ru']."', '".$_POST['descr_am']."', '".$_POST['descr_en']."', '".$_POST['descr_ru']."')");
    }
    
    public function addMedServices(){
            $this->db->query("INSERT INTO `med_services`(`title_am`, `title_en`, `title_ru`,`descr_am`, `descr_en`, `descr_ru`)VALUES('".$_POST['title_am']."', '".$_POST['title_en']."', '".$_POST['title_ru']."', '".$_POST['descr_am']."', '".$_POST['descr_en']."', '".$_POST['descr_ru']."')");
    }
    // Remove 

    public function removeSpecialists() {
        $this->db->query("DELETE FROM `specialists` WHERE `id`='".$_POST['id']."'");
    }
     public function removenews(){
        $this->db->query("DELETE FROM `news` WHERE `id`='".$_POST['id']."'");
    }
    
    public function removelab_services(){
        $this->db->query("DELETE FROM `lab_services` WHERE `id`='".$_POST['id']."'");
    }
    
    public function removemed_services(){
        $this->db->query("DELETE FROM `med_services` WHERE `id`='".$_POST['id']."'");
    }

    
    // Change database table field
    
    public function changeField(){
        if(!empty($_POST['table_name']) && !empty($_POST['field_name']) && !empty($_POST['id_name']) && !empty($_POST['id_value'])){
            $table_name = ltrim($_POST['table_name']);
            $field_name = ltrim($_POST['field_name']);
            $field_value = ltrim($_POST['field_value']);
            $id_name = ltrim($_POST['id_name']);
            $id_value = ltrim($_POST['id_value']);

            $this->db->query("UPDATE `$table_name` SET `$field_name`='$field_value' WHERE `$id_name`='$id_value'");
        }
    }
    
    public function imageUpload(){  
        $dir = 'public/gallery/pages/';
        $filename = $_FILES['file']['name'];
        $path = $dir.$filename;
        $link = '/public/gallery/pages/'.$filename;
        $_FILES['file']['type'] = strtolower($_FILES['file']['type']);
        if ($_FILES['file']['type'] == 'image/png' 
        || $_FILES['file']['type'] == 'image/jpg' 
        || $_FILES['file']['type'] == 'image/gif' 
        || $_FILES['file']['type'] == 'image/jpeg'){	
            copy($_FILES['file']['tmp_name'], $path);
            //echo stripslashes(json_encode(array('filelink' => $link)));
            exit;
        }
    }
    
    public function imageGetJson(){
        /*
        $dir = "public/gallery/pages/";
        $list = "[";
        foreach(array_diff(scandir($dir), array(".", "..", "")) as $file){
            if(is_file($dir.$file)){
                $list .= '{"thumb":"/'.$dir.$file.'", "image":"/'.$dir.$file.'", "title":"Image 1", "folder": "Folder 1"},';
            }
        }
        $list .= "{}]";
        echo $list;
        */
    }
    
    public function changeCss(){
        if(!empty($_POST["desc"])){
            $backup = file_get_contents("public/css/main.css");
            file_put_contents("public/css/main.css.backup", $backup);
            file_put_contents("public/css/main.css", $_POST["desc"]);
        }
    }
    
    // Photo
    
    public function addPhoto(){
        $group = $_POST['cat'];
        //if($group=='news'){
            if($_POST['act']=='change'){
                $res = $this->db->query("SELECT * FROM `photo` WHERE `group`='".$_POST['group']."' AND `parent`='".$_POST['parent']."'");
                while($row = $res->fetch_assoc()){
                    unlink("public/gallery/$group/large/".$row['photoID'].".jpg");
                    unlink("public/gallery/$group/middle/".$row['photoID'].".jpg");
                    unlink("public/gallery/$group/small/".$row['photoID'].".jpg");
                }
                $this->db->query("DELETE FROM `photo` WHERE `group`='".$_POST['group']."' AND `parent`='".$_POST['parent']."'");
            }
            foreach ($_FILES["file"]["error"] as $key => $error) {
                $this->db->query("INSERT INTO `photo` (`group`, `parent`, `sort`) VALUES ('".$_POST['group']."', '".$_POST['parent']."', '1')");
                $name = $this->db->insert_id.".jpg";

				addImage($_FILES['file']['tmp_name'][$key], "public/gallery/$group/large/".$name, 1400, 1400, 'resize', true);
                addImage($_FILES['file']['tmp_name'][$key], "public/gallery/$group/middle/".$name, 720, 720, 'crop', true);
                addImage("public/gallery/$group/large/".$name, "public/gallery/$group/small/".$name, 400, 400, 'crop', false);
            }
        //}
    }
    
    public function removePhoto(){
        $group = $_POST['cat'];
        //if($group=='news'){
            $this->db->query("DELETE FROM `photo` WHERE `photoID`='".$_POST['photoID']."'");
            unlink("public/gallery/$group/large/".$_POST['photoID'].".jpg");
            unlink("public/gallery/$group/middle/".$_POST['photoID'].".jpg");
            unlink("public/gallery/$group/small/".$_POST['photoID'].".jpg");
        //}
    }
    
    // Sortable
}