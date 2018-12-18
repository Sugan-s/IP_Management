<?php
class Load_home{
    
    public function MainIp_Table()
    {
                    include '../DbConnection.php';
                 $data  = "<table class='table table-bordered table-striped table-sm table-hover table-responsive' style='overflow-x:auto;' name='catagory' id='catagory' >";
          try{
              $mainip_col=$db->mainIp;
              $mainip_ob=$mainip_col->find();
              $count=0;
              foreach ($mainip_ob as $doc)
              {
                $data .= "<h3>".$doc["networkAddress"]."/".$doc["subnetBit"]."</h3>";
                $data .= "<tbody>";
                $data .="<tr >";
                  $tbname=$doc["networkAddress"]."/".$doc["subnetBit"];
                     $col = $db->$tbname;
                $cursor = $col->find();
                $count=0;
                     foreach($cursor as $document){
                         if($count %16 == 0){
                               $data .="<tr >";}
                            $subnetid=$document["subnetworkAddress"];
                            $service=$document["serviceType"];
                            $status=$document["status"];
                            if(($status=="BLOCK" || $status=="RESERVE" ))
                            {
                                $hovermessage=$service."--"."[".$status."]";
                            }
                            else 
                                {
                                 $hovermessage=$service;
                                }
                            $userrole=$_SESSION['role'];
                                if(($status=="BLOCK" || $status=="RESERVE" )&& ($userrole=="Standard User" || $userrole=="Editor"))
                                {
                                    
                                    $data .= "<th type='button'  title=$hovermessage class='theButton' style='width:100px;'  id='$tbname' bgcolor=".$document["serviceColor"].">"."<a href='#'>". $document["subnetworkAddress"] ."</a>"."</th>";
                                }
                             else{
                                 $data .= "<th type='button' title=$hovermessage class='table-responsive' style='width:100px;'  id='$tbname' bgcolor=".$document["serviceColor"].">"."<a href='../subnet/subnetblock.php?subnetId=$tbname&value=$subnetid'>". $document["subnetworkAddress"] ."</a>"."</th>";
                                 
                             }
                            
                           $count++;
                     }
                       $data .= "</tr>";
                       $data .= "</tr>";
                     $data .= "</tbody>";
                    $data .= "</table>";
                  $data  .= "<table class='table table-bordered table-striped table-sm table-hover table-responsive' style='overflow-x:auto;' name='catagory' id='catagory' >";
              }
        echo $data;
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
    }
    
    public function CategoryTable()
    {
        include '../DbConnection.php';
        //$category="CATEGORY";
       // $colors="COLORS";
        $datas="<table class='table table-bordered table-sm table-hover table-default' style='width: 100px;' >";
         //$datas .= "<thead>";
        //$datas.="<tr>";
        //$datas.="<th style='width: 100px;'>".$category."</th>";
        // $datas.="<th style='width: 50px;'>".$colors."</th>";
       // $datas.="</tr>";
        // $datas .= "</thead>";
        $datas .= "<tbody>";
       // $datas.="<tr>";
         try {
                        $colorTable=$db->services;
                        $color=$colorTable->find();
                        $count=0;
                        $datas.="<tr>";
                        foreach ($color as $docs) 
                        {
                            
                            if($count%4==0)
                            {
                                $datas.="</tr>";
                                
                            }
                            $datas .= "<td>".$docs["service"]."</td>";
                            $datas.="<td bgcolor=".$docs["colourValues"].">"."</td>";
                            $count++;
                        }
                        
                        $datas .= "</tbody>";
                        $datas .= "</table>";
                        echo $datas;
                    }
                    catch(MongoException $mongoException)
                    {
                        print $mongoException;
                        exit;
                    }
    }
}
