<?php
class PrintDataTable{
    
    public function load_printData()
    {
        $sessionMainIp=$_SESSION['MainIp'];
        $sessionsubnetIp=$_SESSION['subnetIp'];
        include '../DbConnection.php';
        
        $serviceType;
        $subnetBitForLowerLevel="FREE";
        $col = $db->$sessionMainIp;
        $col_services = $db->services;

        $splitedip = explode('.', $sessionMainIp);
        $lastVale = explode('/', $splitedip[3]);

        $subnetAddress = $splitedip[0].'.'.$splitedip[1].'.'.$sessionsubnetIp.'.'.$lastVale[0];
                                       
        $cursor=$col->find();
        foreach ($cursor as $doc)
        {
            if($doc["subnetworkAddress"]==$sessionsubnetIp)
            {
                                               //$subnetworkAddress= $subnetAddress;
                $serviceType=$doc["serviceType"];
                                             //  break;
                                                                        
            }
        }
                                       
        $cursor1=$col_services->find();
        foreach ($cursor1 as $doc1)
        {
            $ser=$doc1["service"];
                                           
                                           
            if ( (strcmp( $ser, $serviceType ) )== 0  )
            {
                                               
                $subnetBitForLowerLevel=$doc1["serviceSubnetBit"];
                if($serviceType=="FREE")
                {
                    echo $subnetBitForLowerLevel;
                }
                                                                      
            }
        }
           
        
        $dbName = $subnetAddress.'/'.$subnetBitForLowerLevel.'-'.$serviceType;
        $collection=$db->$dbName;
                                               
        $cursor2=$collection->find();
        $table  = "<tbody>";
        foreach ($cursor2 as $doc2)
        {
            $serviceBlockAddress=$doc2["serviceBlockAddress"];
            $circuitid=$doc2["circuitID"];
            $description=$doc2["description"];
            $assignBy=$doc2["assignedBy"];
            $assignDate=$doc2["assignedDate"];
            $remarks=$doc2["remarks"];
                                                   
            $table="<tr>";   
            $table.="<td>".$serviceBlockAddress."</td>";
            $table.="<td>".$circuitid."</td>";
                          
            $table.="<td>".$description."</td>";
            $table.="<td>".$assignBy."</td>";
            $table.="<td>".$assignDate."</td>";
            $table.="<td>".$remarks."</td>";
                            //$table.="<td>"."<a href='../service/assignServices.php?subnetworkAddress=$subnetworkAddress' class='btn btn-primary btn-xs'>"."<i class='fa fa-folder'>"."</i>". $assign."</a>"."</td>";
            
            $table.="</tr>";
            echo  $table;             
        }
    }
}

