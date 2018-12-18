<?php
class ServiceBlockTable{
    
    public function load_serviceTable()
    {
        $delete="Delete";
        $edit="Edit";
        $type="";
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
                                                   $type="FREE";
                                               }
                                                   
                                                    //exit();
                                          }
                                       }
                                        $table  = "<tbody>";
                                        if($type=="FREE")
                                                   {
                                                        $message="No data available for FREE blocks";
                                                       $table.="<tbody>";
                                                        $table="<tr>";  
                                                        $table.="<td colspan='8' align='center'>".$message."</td>";
                                                       //echo $type;
                                                         $table.="</tr>";  
                                                       $table.="</tbody>";
                                                       
                                                        echo $table;
                                                        
                                                   }
                                                else
                                                 {
                                               $dbName = $subnetAddress.'/'.$subnetBitForLowerLevel.'-'.$serviceType;
                                               $collection=$db->$dbName;
                                               //echo $dbName;
                                               $cursor2=$collection->find();
                                              
                                               
                                               foreach ($cursor2 as $doc2)
                                               {
                                                   //echo $type;
                                                  $serviceBlockAddress=$doc2["serviceBlockAddress"];
                                                   $circuitid=$doc2["circuitID"];
                                                   $description=$doc2["description"];
                                                   $assignBy=$doc2["assignedBy"];
                                                   $assignDate=$doc2["assignedDate"];
                                                   $remarks=$doc2["remarks"];
                                                    // auto generate table code here
                                                   
                                                  

                                                      $table="<tr>";   
                            $table.="<td>".$serviceBlockAddress."</td>";
                            $table.="<td>".$circuitid."</td>";
                            $table.="<td>".$description."</td>";
                            $table.="<td>".$assignBy."</td>";
                            $table.="<td>".$assignDate."</td>";
                            $table.="<td>".$remarks."</td>";
                            //$table.="<td>"."<a href='../service/assignServices.php?subnetworkAddress=$subnetworkAddress' class='btn btn-primary btn-xs'>"."<i class='fa fa-folder'>"."</i>". $assign."</a>"."</td>";
                            $userrole=$_SESSION['role'];
                            if($userrole=="Admin" || $userrole=="Editor")
                            {
                                if($circuitid=="null")
                                {
                                    $table.="<td>"."<a href='../user/assignUser.php?serviceblockipaddress=$serviceBlockAddress&name=$dbName' class='btn btn-info btn-xs'>"."<i class='fa fa-pencil'>"."</i>". $edit."</a>"."</td>";
                                    $table.="<td>"."<a href='#' class='btn btn-danger btn-xs'>"."<i class='fa fa-trash-o'>"."</i>". $delete."</a>"."</td>";
                                    
                                }
                                else{
                                    $table.="<td>"."<a href='../user/assignUser.php?serviceblockipaddress=$serviceBlockAddress&name=$dbName' class='btn btn-info btn-xs'>"."<i class='fa fa-pencil'>"."</i>". $edit."</a>"."</td>";
                            $table.="<td>"."<a href='../user/deleteUser.php?serviceblockipaddress=$serviceBlockAddress&name=$dbName' class='btn btn-danger btn-xs'>"."<i class='fa fa-trash-o'>"."</i>". $delete."</a>"."</td>";
                            
                                }
                            }
                            
                            $table.="</tr>";
                            echo  $table; 
                                                 }
                           
                                            
                                               }
    }
}