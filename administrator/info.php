<?php session_start();
   include 'connection.php';
   include 'function.php';
   include 'pdo_class_data.php';
   $pdo_auth = authenticate_admin();
   $pdo = new PDO($dsn, $user, $pass, $opt);	

   $data = get_data_id("support", $_REQUEST['support_id']);
   //print_r($data);
?>

<form action="answer_handle.php" method="POST">
  <div class="form-group">
      <label><b>Asked Question : <?php echo $data['question']; ?></b></label>
    </div>
    <div class="form-group">
      <label><b>Description : <?php echo $data['description']; ?></b></label>
    </div>
    <div style="padding: 10px;"></div>

    <div class="form-group">
      <label>Write Reply Answer</label>
      <textarea class="form-control input" name="answer" rows="5" style="" placeholder="Enter Answer"><?php echo $data['ans']; ?></textarea>
      <input type="hidden" name="support_id" value="<?php echo $data['id']; ?>">
    </div>

     <div class="form-group">
      <button class="btn btn-info">Submit Answer</button>
    </div>

  </div>
</form>