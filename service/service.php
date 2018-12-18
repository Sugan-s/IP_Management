<?php
           
             try{
                 
                 }
                 catch(MongoConnectionException $connectionException){
                    print $connectionException;
                    exit;
                 }
    
class Service{
    public function serviceCategory_load_combo()
    {
                 try{
                 include '../DbConnection.php';
                $collections=$db->services;
                $cursor=$collections->find();
                    foreach ($cursor as $doc)
                    {
                         $category_type=$doc["service"];
                         echo "<option value='".$category_type."'>".$category_type."</option>";
                         
                    }
                echo "</select>";
                 }
                 catch(MongoConnectionException $connectionException){
                    print $connectionException;
                    exit;
                 }

    }
    public function cancelBtn()
    {
        $key = "encryptkey1943";
         $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        $cancel="Cancel";
        $canelbutton ="<a href='../subnet/subnetblock.php?subnetId=$sessionMainIp&value=$sessionsubnetIp'>";
        $canelbutton .="<button class='btn btn-primary' type='button'>".$cancel."</button>";
        $canelbutton .="</a>";
        echo $canelbutton;
    }
    public function getMainIp()
    {
        $key = "encryptkey1943";
         $sessionMainIp_encrypt=$_SESSION['MainIp'];
         $data = base64_decode($sessionMainIp_encrypt);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
                                   $sessionMainIp_decrypt = rtrim(
                                                         mcrypt_decrypt(
                                                         MCRYPT_RIJNDAEL_128,
                                                         hash('sha256', $key, true),
                                                         substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                                                         MCRYPT_MODE_CBC,
                                                         $iv
                                                      ),
                                                    "\0"
                                                    );
    
        return $sessionMainIp_decrypt;
    }
    public function getSubnetIp()
    {
        $key = "encryptkey1943";
        $sessionsubnetIp_encrypt=$_SESSION['subnetIp'];
        $data = base64_decode($sessionsubnetIp_encrypt);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
        $sessionsubnetIp_decrypt = rtrim(
                                                         mcrypt_decrypt(
                                                         MCRYPT_RIJNDAEL_128,
                                                         hash('sha256', $key, true),
                                                         substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                                                         MCRYPT_MODE_CBC,
                                                         $iv
                                                      ),
                                                    "\0"
                                                    );
        return $sessionsubnetIp_decrypt;
    }
    public function fill_ipaddress()
    {
         $ipAddress = $_GET['subnetworkAddress'];
         $_SESSION['SubnetworkAddress']=$ipAddress;
         echo "<input type='text' id='subnetworkAddress' required='required' name='subnetworkAddress' class='form-control col-md-7 col-xs-12' readonly='true' value=".$ipAddress.">";
    }
    public function fill_combo()
    {
        $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        include '../DbConnection.php';
                $collections=$db->$sessionMainIp;
                $cursor=$collections->find();
         foreach ($cursor as $doc)
                    {
                        if($doc["subnetworkAddress"]==$sessionsubnetIp)
                        {
                            $category_type=$doc["serviceType"];
                            if($category_type=="FREE")
                            {
                                 echo "<select class='form-control col-md-7 col-xs-12' name='service' id='service' onchange='getText(this)'> ";
                            }
                            else
                            {
                                 echo "<select class='form-control col-md-7 col-xs-12' name='service' id='service' onchange='getText(this)' readonly='true' value='getText(this)' disabled> ";
                            }
                            echo "<option value='".$category_type."' selected='selected'>".$category_type."</option>";
                        }
                    }
    }
    
     public function fill_date()
    {
         $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        include '../DbConnection.php';
                $collections=$db->$sessionMainIp;
                $cursor=$collections->find();
         foreach ($cursor as $doc)
                    {
                        if($doc["subnetworkAddress"]==$sessionsubnetIp)
                        {
                         echo "<input type='text' required='required' name='assignDate' class='form-control col-md-7 col-xs-12'  placeholder=".$doc["assignDate"].">";
                        }
                    }
    }
    public function fill_by()
    {
        $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        $user=$_SESSION["name"];
        include '../DbConnection.php';
                $collections=$db->$sessionMainIp;
                $cursor=$collections->find();
         foreach ($cursor as $doc)
                    {
                        if($doc["subnetworkAddress"]==$sessionsubnetIp)
                        {
                            echo "<input type='text' id='assignedBy' required='required' name='assignedBy' class='form-control col-md-7 col-xs-12' readonly='true' value=".$user.">";
                        }
                    }
    }
    
    public function fill_remarks()
    {
        $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        include '../DbConnection.php';
                $collections=$db->$sessionMainIp;
                $cursor=$collections->find();
         foreach ($cursor as $doc)
                    {
                        if($doc["subnetworkAddress"]==$sessionsubnetIp)
                        {
                         echo "<input type='text' id='remarks' name='remarks' class='form-control col-md-7 col-xs-12' placeholder=".$doc["remarks"].">";
                        }
                    }
    }
    
    public function fill_status()
    {
        $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        include '../DbConnection.php';
                $collections=$db->$sessionMainIp;
                $cursor=$collections->find();
         foreach ($cursor as $doc)
                    {
                        if($doc["subnetworkAddress"]==$sessionsubnetIp)
                        {
                            $status=$doc["status"];
                         echo "<option value='".$status."' selected='selected' disabled='disabled'>".$status."</option>";
                        }
                    }
    }
    
    public function load_combo_status()
    {
        $plan = array('NONE','RESERVE','BLOCK');
        foreach ($plan as $id)
        {
           echo "<option value='".$id."'>".$id."</option>"; 
        }
    }
}

                            