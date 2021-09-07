<?php 
 include './DataBase-Connection.php';

 class Connections{
 	private $dbms;
 	public function __construct(){
 		$OBJ=new Connection();
 		$this->dbms=$OBJ->DataBase_Conn();
 	}
    public function email_validation($s){
            $data=$s;
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
         if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return false;
         }
         else{
               return true;
         }
   }

   public function Register($name,$email,$password,$phone){
         $rows=$this->dbms->query("SELECT email,phone FROM user_register WHERE email='$email' OR phone='$phone'");
         if(mysqli_num_rows($rows)>0){
           return "Email Already Exist";

         }
         else{
             $password=md5($password);
               if($this->dbms->query("INSERT INTO user_register(name,email,password,phone) VALUES('$name','$email','$password','$phone')")){
                        header('location:Login.php');
                  }
         }

   }

   public function Login($email,$password)
   {
      $password=md5($password);
      $rows=$this->dbms->query("SELECT user_id,email,password FROM user_register WHERE email='$email' AND password='$password'");
      if($rows->num_rows > 0){
         $num=$rows->fetch_assoc();
          $_SESSION['log_in']=TRUE;
          $_SESSION['user_id']=$num['user_id'];
         header('location:Home.php');
      }
      else{
         return false;
      }
   }

   public function plan_check($id){
        $rows=$this->dbms->query("SELECT * FROM user_plan WHERE user_id='$id'");
         if($rows->num_rows>0){
            return $rows;
         }
         else{
            return FALSE;
         }
   }
   public function Add_Plan($array= array()){
      $person_name='';
      $user_id=$_SESSION['user_id'];
      $title=$array['title'];
      $init_budget=$_SESSION['initial_budget'];
      $from_date=$array['from_date'];
      $to_date=$array['to_date'];
      $no_of_people=$_SESSION['no_of_people'];
      for($i=1;$i<=$no_of_people;$i++){
         if($i>1 && $i<=$no_of_people){
            $person_name.=',';
         }
         $person_name.=$array['Person'.$i];
      }
      if($this->dbms->query("INSERT INTO user_plan(user_id,Plan_title,initial_budget,from_date,to_date,no_of_people,Person_Name,rem_amount) VALUES('$user_id','$title','$init_budget','$from_date','$to_date','$no_of_people','$person_name','$init_budget')"))
      {
         header('location:Home.php');
      }
      else{
         return FALSE;
      }
   }

    public function Add_Expense($array= array()){
      $title=$array['title'];
      $date=$array['date'];
      $amount=$array['amount'];
      $name=$array['name'];
      $s_no=$_SESSION['s_no'];
      $new_amount=$_SESSION['rem_amount']-$array['amount'];

      function GetImageExtension($imagetype){
               if(empty($imagetype)) return false;
               switch($imagetype){
               case 'image/bmp': return '.bmp';
               case 'image/gif': return '.gif';
               case 'image/jpeg': return '.jpg';
               case 'image/png': return '.png';
               default: return false;
               }
         }


            $file_name=$_FILES["file_upload"]["name"];;
            $temp_name=$_FILES["file_upload"]["tmp_name"];
            $imgtype=$_FILES["file_upload"]["type"];
            $ext= GetImageExtension($imgtype);
            $imagename=date("d-m-Y")."-".time().$ext;
            $target_path = "img/".$imagename;
      if(move_uploaded_file($temp_name, $target_path)){
            
            if($this->dbms->query("INSERT INTO expense_user(user_s_no,title,date,amount,name,bill) VALUES('$s_no','$title','$date','$amount','$name','$file_name')"))
            {
               if($this->dbms->query("UPDATE user_plan SET rem_amount=$new_amount WHERE s_no='$s_no'")){
                  header('location:Home.php');   
               }
               
            }
            else{
               return FALSE;
            }
      }else{
          if($this->dbms->query("INSERT INTO expense_user(user_s_no,title,date,amount,name) VALUES('$s_no','$title','$date','$amount','$name')"))
            {
               if($this->dbms->query("UPDATE user_plan SET rem_amount=$new_amount WHERE s_no='$s_no'")){
                  $previous_page = $_SESSION['current_page'];
                  header("location:$previous_page");   
               }
               
            }
            else{
               return FALSE;
            }
      }
   }

   public function Expense_Distribution($s_no){
       $row=$this->dbms->query("SELECT amount,name FROM expense_user WHERE user_s_no='$s_no';");
       if($row->num_rows>0){
         return $row;
       }  
       else{
         return false;
       }
   }

   public function fetch_expense($s_no){
      $row=$this->dbms->query("SELECT * FROM user_plan WHERE s_no='$s_no'");
      if($row->num_rows>0){
         return $row;
      }
      else{
         return False;
      }
   }
   public function fetch_each_expense($s_no){
      $row=$this->dbms->query("SELECT * FROM expense_user WHERE user_s_no='$s_no'");
      if($row->num_rows>0){
         return $row;
      }
      else{
         return False;
      }
   }
 }

?>