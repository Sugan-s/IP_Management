<?php
class Details{
    public function UserDetails()
    {
        $edit="Edit";
        $delete="Delete";
        include '../DbConnection.php';
        $table  = "<tbody>";
        $col=$db->user;
        $cursor=$col->find();
        
        foreach($cursor as $document)
        {
            $userID=$document["usrid"];
            $userName=$document["name"];
            $role=$document["role"];
            if($document['status']==1)
            {
            //auto generate table
            $table="<tr>";   
            $table.="<td>".$userID."</td>";
            $table.="<td>".$userName."</td>";
            $table.="<td>".$role."</td>";
            $table.="<td>"."<a href='editpage.php?userid=$userID' class='btn btn-info btn-xs'>"."<i class='fa fa-pencil'>"."</i>". $edit."</a>"."</td>";
            $table.="<td>"."<a href='deletePage.php?userid=$userID' class='btn btn-danger btn-xs'>"."<i class='fa fa-trash'>"."</i>". $delete."</a>"."</td>";
            $table.="</tr>";  
            echo $table;
            
            }
        }
        
    }
}



