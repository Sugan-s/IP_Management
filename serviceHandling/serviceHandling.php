<?php
class Category{
    public function CategoryDetails()
    {
        $delete="Delete";
        $deletemsg="Are you sure you want to delete this item?";
        include '../DbConnection.php';
        $table  = "<tbody>";
        $col=$db->services;
        $cursor=$col->find();
        foreach($cursor as $document)
        {
            $service=$document["service"];
            $colourValues=$document["colourValues"];
            $serviceSubnetBit=$document["serviceSubnetBit"];
            $note=$document["note"];
            
            //auto generate table
            $table="<tr>";   
            $table.="<td>".$service."</td>";
            $table.="<td bgcolor=".$colourValues.">"."</td>";
            $table.="<td>".$serviceSubnetBit."</td>";
            $table.="<td>".$note."</td>";
            $table.="<td>"."<a href='../serviceHandling/deleteService.php?service=$service' onclick='return confirm('Are you sure you want to delete?')' class='btn btn-danger btn-xs' >"."<i class='fa fa-trash'>"."</i>". $delete."</a>"."</td>";
            $table.="</tr>";  
            echo $table;
        }
        
    }
}

//javascript:confirmDelete('../serviceHandling/deleteService.php?service=$service')





