<?php
  function authenticate(){
    if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
         include 'connection.php';
          $pdo = new PDO($dsn, $user, $pass, $opt);
          try {
              $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :user');
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          $stmt->execute(['user' => $_SESSION['user']]);
          $user = $stmt->fetch();
          $row_count = $stmt->rowCount();
          //print_r($user);
          
          $pass = md5($user['password']);
          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
           return $user;      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
       return $user;
  }



function authenticate_admin(){
    if(isset($_SESSION['administrator'], $_SESSION['loged_primitives']))
      {
         include 'connection.php';
          $pdo = new PDO($dsn, $user, $pass, $opt);
          try {
              $stmt = $pdo->prepare('SELECT * FROM administrator_super_user WHERE email = :user');
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          $stmt->execute(['user' => $_SESSION['administrator']]);
          $administrator = $stmt->fetch();
          $row_count = $stmt->rowCount();
          //print_r($user);
          
          $pass = md5($administrator['password']);
          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
           return $administrator;      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
       return $administrator;
  }

  function fetch_single($table, $id){
      include 'connection.php';
      $pdo = new PDO($dsn, $user, $pass, $opt);
      try {
          $stmt = $pdo->prepare('SELECT * FROM '.$table.' WHERE id = :id');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();      
  }


  function upload_multiple($dir, $array, $id){
      $count = count($array['images']['name']);
      //echo $count;
        include 'resize_image.php';
        for ($i=0; $i < $count; $i++) { 
            $file = date("U").$array['images']['name'][$i];
            if($array['images']['name'][$i]!=""){
              
                move_uploaded_file($array['images']['tmp_name'][$i], $dir."/".$file);            
                $file_src = $dir."/".$file;             
                $resizedFile = $dir."/thumb/".$file;
                $resizedFile2 = $dir."/opt/".$file;
                smart_resize_image($file_src , null, 550 , 400 , false , $resizedFile , false , false ,80 ); 
                smart_resize_image($file_src , null, 600 , 0 , true , $resizedFile2 , false , false ,80 );   

                $uploaded = $file;
                $data_array = "car_id";
                $files_array = array("file"=>$uploaded);
                insert_data_with_files("car_id", "car_images", "", $files_array);
            }
            else{
              continue;
            }
      }
      //echo "images_uploaded";
  }

   function pdo_update($array_list, $table, $condition)
   {
        include 'connection.php';
        $array = explode(",", $array_list);
        $data = "";
        foreach ($array as $value) {
          $data.="`".$value."`='".$_REQUEST[$value]."',";
        }
        $data = rtrim($data, ",");
        $pdo = new PDO($dsn, $user, $pass, $opt);
        //echo $data;
        try {
            $stmt = $pdo->prepare('UPDATE '.$table.' SET '.$data.' WHERE user = :user');
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
       return $stmt->execute(['user' => $_SESSION['user']]);

   }

   function get_data_all_unformated($list, $table, $condition, $limit)
    {

       include 'connection.php';
       $pdo = new PDO($dsn, $user, $pass, $opt);
      // echo 'SELECT '.$list.' FROM `'.$table.'` '.$condition.' ORDER BY date DESC LIMIT '.$limit;
       try {
            $stmt = $pdo->prepare('SELECT '.$list.' FROM `'.$table.'` '.$condition.' ORDER BY date DESC LIMIT '.$limit);
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();
        $user = $stmt->fetchAll();
        return $user;
    }

    function get_data_all($list, $table, $condition)
    {

       include 'connection.php';
       $pdo = new PDO($dsn, $user, $pass, $opt);
       try {
            $stmt = $pdo->prepare('SELECT '.$list.' FROM `'.$table.'` ORDER BY date DESC');
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();
        $user = $stmt->fetchAll();


        $keys = array_keys($user[0]);
        echo '<thead><tr>';
        foreach ($keys as $value) {
          echo '<th style="text-transform:capitalize">'.$value.'</th>';
        }
        echo '<th>Actions</th></tr></thead>';

        return $user;
    }

   function clean($data)
    {
        $data = str_replace("'", "", $data);
        $data = str_replace("`", "", $data);
        $data = str_replace("\"", "", $data);
        $data = str_replace("SELECT *", "", $data);
        $data = str_replace("OR", "", $data);
        return $data;
    }

    function upload_file_single($file, $dir, $required, $location){
      $filename = "";
      //print_r($_FILES);
      if($required=="required"){ if($_FILES[$file]['error']>0) { header('Location:'.$location."?choice=error&value=Please Attach Image File");   } else{ $filename = date("U").$_FILES[$file]['name'];} }
      else { if($_FILES[$file]['error']>0) {  $filename = "";  }  else{   $filename = date("U").$_FILES[$file]['name']; }  }

        //$file = date("U").$_FILES[$file]
        move_uploaded_file($_FILES[$file]['tmp_name'], $dir."/".$filename);
        include 'resize_image.php';
        $file_src = $dir."/".$filename;
        $resizedFile = $dir."/thumb/".$filename;
        $resizedFile2 = $dir."/opt/".$filename;
        smart_resize_image($file_src , null, 550 , 400 , false , $resizedFile , false , false ,80 ); 
        smart_resize_image($file_src , null, 600 , 0 , true , $resizedFile2 , false , false ,80 );   

        return $filename;
  
    } //function ends here



     function insert_data_with_files($array_list, $table, $except, $files_array){
      include 'connection.php';
      


       $pdo = new PDO($dsn, $user, $pass, $opt);
       $array = explode(",", $array_list);
       
       //arrayrequest lists
       $key_list = "";
       $value_list = array();
      foreach ($array as $value) {
        $key_list.="`".$value."`,";
        $value_list[]= "'".clean($_REQUEST[$value])."' ";
      }
      $key_list = rtrim($key_list, ",");      
      $value_list = implode(",", $value_list);


      //file lists in insert
      $file_key_list = "";
      $file_value_list=array();
      
      foreach ($files_array as $key=>$value) {
        $file_key_list.="`".$key."`,";
        $file_value_list[]= "'".clean($value)."' ";
      }
      $file_key_list = rtrim($file_key_list, ",");      
      $file_value_list = implode(",", $file_value_list);
      



      $cols = $key_list.",".$file_key_list;
      $values = $value_list.",".$file_value_list;

      //echo "INSERT INTO `$table` ($cols) VALUES ($values)";
      $result = $pdo->exec("INSERT INTO `$table` ($cols) VALUES ($values)");
      return $pdo->lastInsertId();
    }
    
    function redirectTo($page,$success,$value){
      header('Location:'.$page.'?choice='.$success.'&value='.$value);
    }


    function insert_data($array_list, $table, $except){
      include 'connection.php';
       $pdo = new PDO($dsn, $user, $pass, $opt);
       $array = explode(",", $array_list);
       $key_list = "";
       $value_list = array();
      foreach ($array as $value) {
        $key_list.="`".$value."`,";
        $value_list[]= "'".clean($_REQUEST[$value])."' ";
      }
      
      $key_list = rtrim($key_list, ",");      
      $value_list = implode(",", $value_list);
      $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      return $pdo->lastInsertId();
    }

    function see_status($data){
      if(isset($_REQUEST['choice'])){
         if($data['choice']=="success")
        { echo '<div  style="padding:10px;color:#fff;background-color:#444;text-transform:capitalize">'.$data['value'].'</div><br/>'; }
        else { echo '<div  style="padding:10px;color:#fff;background-color:#900;text-transform:capitalize">'.$data['value'].'</div><br/>';   }
      }
    }

     function see_status2($data){
      if(isset($_REQUEST['choice'])){
         if($data['choice']=="success")
        { echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>'.$data['value'].'</strong>
                                </div>'; }
        else { echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>'.$data['value'].'</strong>
                                </div>';   }
      }
    }

    function view($table){
      header('Location:view_'.$table.'.php?choice=success&value='.$table.' Value Added Successfully');
    }


    function fetch_rows($array, $highlighted, $image_reference, $table){
      $count = count($array);

      $highlighted = explode(",", $highlighted);
      include 'connection.php';
       $pdo = new PDO($dsn, $user, $pass, $opt);
      

      $i=0;
      echo '<tr>';
      foreach ($array as $key => $value) {
        $high = "";
        if($key=="desc"){  $value = substr(strip_tags($value), 0,80);  }
        if($key=="testimonial"){  $value = substr(strip_tags($value), 0,80);  }
        if($key=="description"){  $value = substr(strip_tags($value), 0,80);  }
        if($image_reference>0){
          if($i==$image_reference){
            $dri =explode(".",  $value);
            $format = end($dri);
            if($format=="svg" || $format=="SVG"){
              $value = '<img src="../'.$table.'/'.$value.'" style="width:60px" />';
            }else
            {
              $value = '<img src="../'.$table.'/opt/'.$value.'" style="width:60px" />';
            }
            
          }
        }
        if(in_array($i, $highlighted)){ $high = 'style="background-color:green;color:#fff;padding:5px;border-radius:4px;"'; }
        echo '<td><span '.$high.'>'.$value.'</span></td>';
        $i++;
      }
      echo '<td><a href="view_'.$table.'_data.php?id='.base64_encode($array['id']).'&table='.base64_encode($table).'"><button  class="btn btn-xs btn-success"><i class="fa fa-fw fa-eye"></i>View </button></a>
                <a href="delete.php?id='.base64_encode($array['id']).'&table='.base64_encode($table).'" onclick="return confirm(\'Are You Sure You Want to Delete This?\');"><button  class="btn btn-xs btn-danger"><i class="fa fa-fw fa-times"></i>Delete</button></a>
                <a href="add_'.$table.'.php?id='.base64_encode($array['id']).'&value='.base64_encode("update").'"> <button  class="btn btn-xs btn-info"><i class="fa fa-fw fa-home"></i>Update</button></a> </td>';
      echo '</tr>';
    }

     function fetch_rows_delete($array, $highlighted, $image_reference, $table){
      $count = count($array);

      $highlighted = explode(",", $highlighted);
      include 'connection.php';
       $pdo = new PDO($dsn, $user, $pass, $opt);
      

      $i=0;
      echo '<tr>';
      foreach ($array as $key => $value) {
        $high = "";
        if($key=="desc"){  $value = substr(strip_tags($value), 0,80);  }
        if($key=="testimonial"){  $value = substr(strip_tags($value), 0,80);  }
        if($key=="description"){  $value = substr(strip_tags($value), 0,80);  }
        if($image_reference>0){
          if($i==$image_reference){
            $value = '<img src="../'.$table.'/opt/'.$value.'" style="width:60px" />';
          }
        }
        if(in_array($i, $highlighted)){ $high = 'style="background-color:green;color:#fff;padding:5px;border-radius:4px;"'; }
        echo '<td><span '.$high.'>'.$value.'</span></td>';
        $i++;
      }
      echo '<td>
                <a href="delete.php?id='.base64_encode($array['id']).'&table='.base64_encode($table).'" onclick="return confirm(\'Are You Sure You Want to Delete This?\');"><button  class="btn btn-xs btn-danger"><i class="fa fa-fw fa-times"></i>Delete</button></a>
                </td>';
      echo '</tr>';
    }

    function delete_entry($id, $table){
        include 'connection.php';
          $pdo = new PDO($dsn, $user, $pass, $opt);
          try {
            $stmt = $pdo->prepare('DELETE FROM  '.$table.'  WHERE id = :id');
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                return ($ex->getMessage());
            }
           return $stmt->execute(['id' => $id]);
          
    }



    function mailto($to, $data_array)
    {
        $subject = "Contact Enquiry From carbuzz.in";
        $headers= "From: Contact Enquiry<website@carbuzz.in>\r\n";
        $headers.= "Reply-To: Contact Department <shreyansh@carbuzz.in>\r\n";
        $headers.= "X-Mailer: PHP/" . phpversion()."\r\n";
        $headers.= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
        
        $data = "The Details are : <br/>";
        foreach($data_array as $key=> $marty){
            $data.="<b>$key : </b>".$marty."<br/>";
        }
        mail($to, $subject, $data, $headers);
        
    }
    

?>