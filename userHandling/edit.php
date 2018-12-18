<?php
$userId=$_GET['userid'];
$_SESSION['userId']=$userId;
class Edit
{
  public function fill_userid()
  {
      $userId=$_GET['userid'];
      echo "<input type='text' id='userid' required='required' name='userid' class='form-control col-md-7 col-xs-12' readonly='true' value=".$userId.">";
  }
  
  public function fill_username()
  {
      include '../DbConnection.php';
      $userId=$_GET['userid'];
      $col=$db->user;
        $cursor=$col->find();
        foreach($cursor as $document)
        {
            $username=$document["name"];
            if($document["usrid"]==$userId)
            {
                 echo "<input type='text' id='username' required='required' name='username' class='form-control col-md-7 col-xs-12' readonly='true' value=".$username.">";
            }
        }
  }
  
  public function load_role_combobox()
  {
      $plan = array('Admin','Editor','Standard User');
        foreach ($plan as $id)
        {
           echo "<option value='".$id."'>".$id."</option>"; 
        }
  }
  
  public function fill_role()
  {
      include '../DbConnection.php';
      $userId=$_GET['userid'];
      $col=$db->user;
        $cursor=$col->find();
        foreach($cursor as $document)
        {
            if($document["usrid"]==$userId)
            {
            $role=$document["role"];
             echo "<option value='".$role."' selected='selected' disabled='disabled'>".$role."</option>";
            }
        }
  }
}

