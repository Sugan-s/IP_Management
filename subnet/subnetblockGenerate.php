<?php
class SubnetBlock{
    public function subnetIpDetails()
    {
        // session_start();
            $userrole=$_SESSION['role'];                    
                                $assign="Assign";
                                $delete="Delete";
                                $serviceType;
                                //$add="Add";
                                $edit="Edit";
                                include '../DbConnection.php';

                                   // geting value from url
                                   $key = "encryptkey1943";
                                   $MainIp = $_GET['subnetId'];
//                                   $data = base64_decode($mIp);
//                                   
//                                   $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
//                                   $MainIp = rtrim(
//                                                         mcrypt_decrypt(
//                                                         MCRYPT_RIJNDAEL_128,
//                                                         hash('sha256', $key, true),
//                                                         substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
//                                                         MCRYPT_MODE_CBC,
//                                                         $iv
//                                                      ),
//                                                    "\0"
//                                                    );
                                   
                                   //$MainIp=base64_decode('JHRhYmxlYm5hbWU=');
                                  // echo $MainIp;
                                   $subnetIp = $_GET['value'];
//                                   echo $subnetIp_encrypt;
//                                   echo $data;
//                                   exit();
                                   
//                                   $data1 = base64_decode($subnetIp_encrypt);
//                                   $iv1 = substr($data1, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
//                                   $subnetIp = rtrim(
//                                                         mcrypt_decrypt(
//                                                         MCRYPT_RIJNDAEL_128,
//                                                         hash('sha256', $key, true),
//                                                         substr($data1, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
//                                                         MCRYPT_MODE_CBC,
//                                                         $iv1
//                                                      ),
//                                                    "\0"
//                                                    );
                                   //echo $subnetIp." ".$MainIp;
                                   //$subnetIp=base64_decode('$sIp');
                                   $_SESSION['MainIp']=$MainIp;
                                   $_SESSION['subnetIp']=$subnetIp;
                                       $table  = "<tbody>";
                                        $col = $db->$MainIp;
                                        $splitedip = explode('.', $MainIp);
                                        $lastVale = explode('/', $splitedip[3]);
                                        $subnetAddress = $splitedip[0].'.'.$splitedip[1].'.'.$subnetIp.'.'.$lastVale[0].'/24';
                                        $cursor=$col->find();
                                        //echo $MainIp;
                                       foreach ($cursor as $doc)
                                         {
                                            if($doc["subnetworkAddress"]==$subnetIp)
                                            {
                                               $subnetworkAddress= $subnetAddress;
                                               $serviceType=$doc["serviceType"];
                                               $status=$doc["status"];
                                               $assignDate=$doc["assignDate"];
                                               $assignBy=$doc["assignBy"];
                                               $remarks=$doc["remarks"];
                                               $_SESSION['servicetype']=$serviceType;
                            // auto generate table code here
                            $table="<tr>";   
                            $table.="<td>".$subnetworkAddress."</td>";
                            $table.="<td>".$serviceType."</td>";
                          
                            $table.="<td>".$assignDate."</td>";
                            $table.="<td>".$assignBy."</td>";
                            $table.="<td>".$remarks."</td>";
                            $table.="<td>".$status."</td>";
                            //$table.="<td>"."<a href='../service/assignServices.php?subnetworkAddress=$subnetworkAddress' class='btn btn-primary btn-xs'>"."<i class='fa fa-folder'>"."</i>". $assign."</a>"."</td>";
                            $userrole=$_SESSION['role'];
                            if($userrole=="Admin" || $userrole=="Editor")
                            {
                                if($serviceType=="FREE")
                                {
                                    $table.="<td>"."<a href='../service/assignServices.php?subnetworkAddress=$subnetworkAddress' class='btn btn-success btn-xs'>"."<i class='fa fa-plus'>"."</i>". $assign."</a>"."</td>";
                                    $table.="<td>"."<a href='#' class='btn btn-danger btn-xs'>"."<i class='fa fa-trash-o'>"."</i>". $delete."</a>"."</td>";
                                }
                                 else {
                                     $table.="<td>"."<a href='#' class='btn btn-success btn-xs'>"."<i class='fa fa-plus'>"."</i>". $assign."</a>"."</td>";
                                      $table.="<td>"."<a href='deleteSubnet.php?subnetworkAddress=$subnetworkAddress&serviceType=$serviceType' class='btn btn-danger btn-xs'>"."<i class='fa fa-trash-o'>"."</i>". $delete."</a>"."</td>";
                                 }
                                 if($serviceType=="FREE")
                                {
                                 $table.="<td>"."<a href='#' class='btn btn-info btn-xs'>"."<i class='fa fa-pencil'>"."</i>". $edit."</a>"."</td>";
                                }
                                else {
                                    $table.="<td>"."<a href='../service/updateAssignedServices.php?subnetworkAddress=$subnetworkAddress' class='btn btn-info btn-xs'>"."<i class='fa fa-pencil'>"."</i>". $edit."</a>"."</td>";
                                }
                            } 
              }
                            
                            $table.="</tr>";
                                               
                                          }
                                          
                                         
                                      
                                       
                                     echo $table; 
                                     
    }
}