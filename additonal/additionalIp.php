<?php
class AdditionalIp{
    public function cancel_btn()
    {
        $sessiongetvalue=$_SESSION['value'];
        $cancel="Cancel";
        $canelbutton ="<a href='../search/search.php?searchValue=$sessiongetvalue'>";
        $canelbutton .="<button class='btn btn-primary' type='button'>".$cancel."</button>";
        $canelbutton .="</a>";
        echo $canelbutton;
    }
    
    public function getService()
    {
        $getservice=$_GET['name'];
        $splitedName = explode('-', $getservice);
        $returnservice=$splitedName[1];
        return $returnservice;
        
    }
    public function getServiceSubnet()
    {
        $getservice=$_GET['name'];
        $splited1 = explode('/', $getservice);
        $servi_no_ser = $splited1[1];
        $splited2 = explode('-', $servi_no_ser);
        $servi_no = $splited2[0];
        
        //merge
        $sessiongetvalue=$_SESSION['value'];
        $value=$sessiongetvalue.'/'.$servi_no;
        return $value;
        
    }
    public function load_combobox()
    {
          try{
                 include '../DbConnection.php';
                $collections=$db->services;
                $cursor=$collections->find();
                $getdbname= $this->getService();
                    foreach ($cursor as $doc)
                    {
                        $category_type=$doc["service"];
                        if($category_type==$getdbname)
                        {
                         echo "<option value='".$category_type."' selected='selected'>".$category_type."</option>";
                        }
                        echo "<option value='".$category_type."'>".$category_type."</option>";
                    }
                
                 }
                 catch(MongoConnectionException $connectionException){
                    print $connectionException;
                    exit;
                 }
    }
    
    public function fill_circuitID()
    {
        $searchvalue= $this->getServiceSubnet();
       
        $sessiongetvalue=$_SESSION['value'];
       // $sessionCircuitID = $_SESSION['circuitID'];
        $serVa_ci = preg_replace("/[^0-9]/", '', $sessiongetvalue);
        $flag=1;
        $cir_di;
        
       // $sessiongetserviceaddress=$_SESSION['serviceaddress'];
        include '../DbConnection.php';
        $getDBname=$_GET['name'];
        $collections=$db->$getDBname;
        $cursor=$collections->find();
        foreach ($cursor as $doc)
        {
            $serviceBlockAddress=$doc['serviceBlockAddress'];
            $circuitID= preg_replace("/[^0-9]/", '', $doc['circuitID']);
            if($searchvalue==$serviceBlockAddress || $serVa_ci==$circuitID)
            {
                      
                        $cir_di = $doc['circuitID'];
                       $flag = 0;
                       
            }
            else
            {
                $host=$doc['hostIp'];
                
                foreach($host as $ip)
                {
                    if($ip==$sessiongetvalue)
                    {   
                        $cir_di = $doc['circuitID'];
                        //echo "<input type='text' id='circuitId' required='required' name='circuitId' class='form-control col-md-7 col-xs-12' readonly='true' value=".$doc['circuitID'].">";
                        $flag = 0;
                    }  
                 
                }
            }
             
        }
        if($flag == 0)
        {
            echo "<input type='text' id='circuitId' required='required' name='circuitId' class='form-control col-md-7 col-xs-12' readonly='true' value=".$cir_di.">";
                        
            
        }
    }
    
    public function fill_description()
    {
        $searchvalue= $this->getServiceSubnet();
        $sessiongetvalue=$_SESSION['value'];
        //$sessionCircuitID = $_SESSION['circuitID'];
         $serVa_ci = preg_replace("/[^0-9]/", '', $sessiongetvalue);
        include '../DbConnection.php';
        $getDBname=$_GET['name'];
        $collections=$db->$getDBname;
        $cursor=$collections->find();
        $flag=1;
        $description;
        foreach ($cursor as $doc)
        {
            $serviceBlockAddress=$doc['serviceBlockAddress'];
             $circuitID= preg_replace("/[^0-9]/", '', $doc['circuitID']);
            if($searchvalue==$serviceBlockAddress || $serVa_ci==$circuitID)
            {
            $description=$doc['description'];
           // echo "<input type='text' id='description' required='required' name='description' class='form-control col-md-7 col-xs-12' readonly='true' value=".$description.">";
            $flag=0;
            }
            else
            {
                $host=$doc['hostIp'];
                
                foreach($host as $ip)
                {
                    if($ip==$sessiongetvalue)
                    {   
                        $description=$doc['description'];
                        //echo "<input type='text' id='description' required='required' name='description' class='form-control col-md-7 col-xs-12' readonly='true' value=".$description.">";
                        $flag = 0;
                    }  
                 
                }
            }
        }
        if($flag==0)
        {
            $des = str_replace(' ', '_', $description);
            echo "<input type='text' id='description'  required='required' name='description' class='form-control col-md-7 col-xs-12' readonly='true' value=".$des.">";
            
        }
    }
    
    public function fill_by()
    {
          $user=$_SESSION["name"];
          echo "<input type='text' id='assignedBy' required='required' name='assignedBy' class='form-control col-md-7 col-xs-12' readonly='true' value=".$user.">";

    }
}
