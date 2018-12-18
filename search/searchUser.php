<?php
class Search{
    public function currentUser()
    {
     $getvalue=$_GET['searchValue'];
      $_SESSION['value']=$getvalue;
      
      $serVa = preg_replace("/[^0-9]/", '', $getvalue);
      
      
      
       
       include '../DbConnection.php';
       $col=$db->searchTable;
       $circuitID = 'null';
       $description;
       $dbName='null';
       $serviceBlock;
       $assignedBy;
       $assignDate;
       $remarks;
       $assign="Add Additional";
       $table1  = "<tbody>";
      $cursor=$col->find();
    foreach ($cursor as $doc)
    {
        $cir = $doc["circuitID"];
        $serVa_db = preg_replace("/[^0-9]/", '', $cir);
       
        
        
        if($doc["serviceBlockAddress"]==$getvalue  || $serVa_db==$serVa  )
       {
            
           $serviceBlock=$doc["serviceBlockAddress"];
           $circuitID=$doc["circuitID"];
           $description=$doc["description"];
           $dbName=$doc["dbName"];
           $col_se=$db->$dbName;
         
           $splitedip2 = explode('/', $dbName);
           $servi_no_ser = $splitedip2[1];
           $splitedip3 = explode('-', $servi_no_ser);
           $servi_no = $splitedip3[0];
           $service = $splitedip3[1];
   
           $servi = $serviceBlock.'/'.$servi_no;
  
           $cursor_search=$col_se->find();
           foreach ($cursor_search as $doc1)
           {
                if($doc1["serviceBlockAddress"]==$servi)
                {
                    $assignedBy=$doc1["assignedBy"];
                    $assignDate=$doc1["assignedDate"];
                    $remarks=$doc1["remarks"];
                    $table1 .="<tr>";
                    $table1.="<td>".$servi."</td>";
                    //$table1.="<td>".$service."</td>";
                    $table1.="<td>".$circuitID."</td>";
                    $table1.="<td>".$description."</td>";
                    $table1.="<td>".$assignDate."</td>";
                    $table1.="<td>".$assignedBy."</td>";
                    $table1.="<td>".$remarks."</td>";
                    $userrole=$_SESSION['role'];
            if($userrole=="Admin" || $userrole=="Editor")
             {
                $table1.="<td>"."<a href='../additonal/addtionalIpAddressAssignment.php?name=$dbName' class='btn btn-success btn-xs'>"."<i class='fa fa-plus'>"."</i>". $assign."</a>"."</td>";
             }
                    $table1 .="</tr>";
                }
            }
   
        
       }
       else
        {
           $host=$doc["hostIp"];
           //$count = count($host);
           
           foreach($host as $ip)
           {
                if($ip==$getvalue)
                {     
                    $serviceBlock=$doc["serviceBlockAddress"];
                    $circuitID=$doc["circuitID"];
                    $description=$doc["description"];
                    $dbName=$doc["dbName"];
          
                    $col_se=$db->$dbName;       
   
                    $splitedip2 = explode('/', $dbName);
                    $servi_no_ser = $splitedip2[1];
                    $splitedip3 = explode('-', $servi_no_ser);
                    $servi_no = $splitedip3[0];
                    $service = $splitedip3[1];
   
                   $servi = $serviceBlock.'/'.$servi_no;
   
                   $cursor_search=$col_se->find();
                   foreach ($cursor_search as $doc1)
                   {
                        if($doc1["serviceBlockAddress"]==$servi)
                        {
                            $assignedBy=$doc1["assignedBy"];
                            $assignDate=$doc1["assignedDate"];
                            $remarks=$doc1["remarks"];
                            $table1 .="<tr>";
                            $table1.="<td>".$servi."</td>";
                           // $table1.="<td>".$service."</td>";
                            $table1.="<td>".$circuitID."</td>";
                            $table1.="<td>".$description."</td>";
                            $table1.="<td>".$assignDate."</td>";
                            $table1.="<td>".$assignedBy."</td>";
                            $table1.="<td>".$remarks."</td>";
                            $userrole=$_SESSION['role'];
            if($userrole=="Admin" || $userrole=="Editor")
             {
                $table1.="<td>"."<a href='../additonal/addtionalIpAddressAssignment.php?name=$dbName' class='btn btn-success btn-xs'>"."<i class='fa fa-plus'>"."</i>". $assign."</a>"."</td>";
             }
                            $table1 .="</tr>";
                        }
                    } 
                }   
            }
       }
    }
    
    $_SESSION['circuitID']=$circuitID;
    
    if($dbName == "null")
    {       $servi='null';
           $circuitID='null';
           $description='null';
            $assignedBy='null';
           $assignDate='null';
           $remarks='null';
           $service='null';
           
           $table1 .="<tr>";
           $table1.="<td>".$servi."</td>";
          // $table1.="<td>".$service."</td>";
           $table1.="<td>".$circuitID."</td>";
           $table1.="<td>".$description."</td>";
           $table1.="<td>".$assignDate."</td>";
           $table1.="<td>".$assignedBy."</td>";
           $table1.="<td>".$remarks."</td>";
           $userrole=$_SESSION['role'];
             if($userrole=="Admin" || $userrole=="Editor")
             {
                $table1.="<td>"."<a href='#' class='btn btn-success btn-xs'>"."<i class='fa fa-plus'>"."</i>". $assign."</a>"."</td>";
             }
           $table1 .="</tr>";
          
    }
 
    echo $table1;
    }
    
    public function previousUser()
    {
       $getValue =$_GET['searchValue'];
       include '../DbConnection.php';
      
       $serviceBlock_de='null';
       $circuitID_de='null';
       $description_de;
       $assignedBy_de;
       $assignDate_de;
       $remarks_de;
       $deleteDate_de;
       $serviceBlock;
       $service_de = null;
       $subnetBit;
        $serVa_de = preg_replace("/[^0-9]/", '', $getValue);

   $table  = "<tbody>";
   $col_se_de=$db->deletedServiceBlock;
   $cursor_search_de=$col_se_de->find();
      foreach ($cursor_search_de as $doc)
    {
          $serVa_de_db = preg_replace("/[^0-9]/", '', $doc["circuitID"]);
            if($doc["serviceBlockAddress"]==$getValue || $serVa_de_db==$serVa_de )
       {
           $serviceBlock_de=$doc["serviceBlockAddress"];
           $service_de=$doc["service"];
           $circuitID_de=$doc["circuitID"];
           $description_de=$doc["description"];
           $assignedBy_de=$doc["assignedBy"];
           $assignDate_de=$doc["assignedDate"];
           $remarks_de=$doc["remarks"];
           $deleteDate_de=$doc["deletedDate"];
           
           $col_ser = $db->services;

            $cursor_se=$col_ser->find();
            foreach ($cursor_se as $doc1)
            {
                if($doc1["service"]==$service_de )
                {
                    $subnetBit=$doc1["serviceSubnetBit"];
                }
                
            }
            $serviceBlo = $serviceBlock_de.'/'.$subnetBit;
           
        
           $table .="<tr>";
           $table.="<td>".$serviceBlo."</td>";
           //$table.="<td>".$service_de."</td>";
            $table.="<td>".$circuitID_de."</td>";
           $table.="<td>".$description_de."</td>";
           $table.="<td>".$assignDate_de."</td>";
           $table.="<td>".$deleteDate_de."</td>";
          // $table.="<td>".$assignedBy_de."</td>";
           $table.="<td>".$remarks_de."</td>";
           $table .="</tr>"; 
           
           
       }
         else
        {
           $host=$doc["hostIp"];
           
           foreach($host as $ip)
           {
                if($ip==$getValue)
                {     
                    $serviceBlock_de=$doc["serviceBlockAddress"];
                     $service_de=$doc["service"];
                    $circuitID_de=$doc["circuitID"];
           $description_de=$doc["description"];
           $assignedBy_de=$doc["assignedBy"];
           $assignDate_de=$doc["assignedDate"];
           $remarks_de=$doc["remarks"];
           $deleteDate_de=$doc["deletedDate"];
           
           $col_ser = $db->services;
            $cursor_se=$col_ser->find();
            foreach ($cursor_se as $doc1)
            {
                if($doc1["service"]==$service_de )
                {
                    $subnetBit=$doc1["serviceSubnetBit"];
                }
                
            }
            $serviceBlo = $serviceBlock_de.'/'.$subnetBit;
        
           $table .="<tr>";
           $table.="<td>".$serviceBlo."</td>";
          // $table.="<td>".$service_de."</td>";
            $table.="<td>".$circuitID_de."</td>";
           $table.="<td>".$description_de."</td>";
           $table.="<td>".$assignDate_de."</td>";
           $table.="<td>".$deleteDate_de."</td>";
           //$table.="<td>".$assignedBy_de."</td>";
           $table.="<td>".$remarks_de."</td>";
           $table .="</tr>"; 
         
                   
                   
                }  
                 
            }
            
       }
       
   }
    if($circuitID_de == "null" ||$serviceBlock_de == "null")
       {
           $service_de='null';
           $description_de='null';
           $assignedBy_de='null';
           $assignDate_de='null';
           $remarks_de='null';
           $deleteDate_de='null';
        
           $table .="<tr>";
           $table.="<td>".$serviceBlock_de."</td>";
         //  $table.="<td>".$service_de."</td>";
            $table.="<td>".$circuitID_de."</td>";
           $table.="<td>".$description_de."</td>";
           $table.="<td>".$assignDate_de."</td>";
           $table.="<td>".$deleteDate_de."</td>";
           //$table.="<td>".$assignedBy_de."</td>";
           $table.="<td>".$remarks_de."</td>";
           $table .="</tr>"; 
           
       }
   
   echo $table; 
    }
}

    

