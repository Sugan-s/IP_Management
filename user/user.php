<?php
/* 
 * fill the assign user form
 */
class User{
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
         $serviceipAddress = $_GET['serviceblockipaddress'];
         $_SESSION['serviceBlockIpAddress']=$serviceipAddress;
         echo "<input type='text' id='serviceIpAddress' required='required' name='serviceIpAddress' class='form-control col-md-7 col-xs-12' readonly='true' value=".$serviceipAddress.">";
    }
    
    public function getDbname()
    {
       $dbname=$_GET['name'];
        include '../DbConnection.php';
        $collections=$db->$dbname;
        $cursor=$collections->find();
       return $cursor;
    }
    
     public function fill_circuitId()
    {
         $serviceblockipaddress=$_SESSION['serviceBlockIpAddress'];
         $cursor2= $this->getDbname();
         foreach ($cursor2 as $doc)
                    {
                        if($doc["serviceBlockAddress"]==$serviceblockipaddress)
                        {
                         echo "<input type='text' required='required' name='circuitId' class='form-control col-md-7 col-xs-12' placeholder=".$doc["circuitID"].">";
                        }
                    }
    }
    public function fill_description()
    {
        $serviceblockipaddress=$_SESSION['serviceBlockIpAddress'];
        $cursor2= $this->getDbname();
         foreach ($cursor2 as $doc)
                    {
                        if($doc["serviceBlockAddress"]==$serviceblockipaddress)
                        {
                         echo "<input type='text' id='description' required='required' name='description' class='form-control col-md-7 col-xs-12' placeholder=".$doc["description"].">";
                        }
                    }
    }
     public function fill_date()
    {
         $serviceblockipaddress=$_SESSION['serviceBlockIpAddress'];
          $cursor2= $this->getDbname();
         foreach ($cursor2 as $doc)
                    {
                        if($doc["serviceBlockAddress"]==$serviceblockipaddress)
                        {
                         echo "<input type='text' required='required' name='assignedDate' class='form-control col-md-7 col-xs-12' placeholder=".$doc["assignedDate"].">";
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
        $serviceblockipaddress=$_SESSION['serviceBlockIpAddress'];
         $cursor2= $this->getDbname();
         foreach ($cursor2 as $doc)
                    {
                        if($doc["serviceBlockAddress"]==$serviceblockipaddress)
                        {
                         echo "<input type='text' id='remarks' required='required' name='remarks' class='form-control col-md-7 col-xs-12' placeholder=".$doc["remarks"].">";
                        }
                    }
    }
}

                             