<?php
class MainIp{
    public function MainIpDetails()
    {
        $delete="Delete";
        include '../DbConnection.php';
        $table  = "<tbody>";
        $col=$db->mainIp;
        $cursor=$col->find();
        foreach($cursor as $document)
        {
            $networkAddress=$document["networkAddress"];
            $subnetBit=$document["subnetBit"];
            $assignedDate=$document["assignedDate"];
            $note=$document["note"];
            
            //auto generate table
            $table="<tr>";   
            $table.="<td>".$networkAddress."</td>";
            $table.="<td>".$subnetBit."</td>";
            $table.="<td>".$assignedDate."</td>";
            $table.="<td>".$note."</td>";
            $table.="<td>"."<a href='deleteMainBlock.php?ip=$networkAddress&bit=$subnetBit' class='btn btn-danger btn-xs'>"."<i class='fa fa-trash'>"."</i>". $delete."</a>"."</td>";
            $table.="</tr>";  
            echo $table;
        }
        
    }
}





