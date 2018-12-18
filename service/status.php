<?php
           
             try{
                 
                 }
                 catch(MongoConnectionException $connectionException){
                    print $connectionException;
                    exit;
                 }
    
class Status{
    public function cancelBtn()
    {
         $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        $cancel="Cancel";
        $canelbutton ="<a href='../subnet/subnetblock.php?subnetId=$sessionMainIp&value=$sessionsubnetIp'>";
        $canelbutton .="<button class='btn btn-primary' type='button'>".$cancel."</button>";
        $canelbutton .="</a>";
        echo $canelbutton;
    }
    public function fill_ipaddress()
    {
         $ipAddress = $_GET['subnetworkAddress'];
         $_SESSION['SubnetworkAddress']=$ipAddress;
         echo "<input type='text' id='subnetworkAddress' required='required' name='subnetworkAddress' class='form-control col-md-7 col-xs-12' readonly='true' value=".$ipAddress.">";
    }
    public function fill_service()
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
                            echo "<input type='text' id='service' required='required' name='service' class='form-control col-md-7 col-xs-12' readonly='true' value=".$category_type.">";
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
        $user=$_SESSION["name"];
        echo "<input type='text' id='assignedBy' required='required' name='assignedBy' class='form-control col-md-7 col-xs-12' readonly='true' value=".$user.">";
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
                         //echo "<input type='text' id='status' name='status' class='form-control col-md-7 col-xs-12' placeholder=".$doc["status"].">";
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

                            

