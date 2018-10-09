/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var table=document.getElementById('catagory'),cIndex;
for(var i=0 ; i<table.columns.length ;i++)
{
    table.columns[i].onclick=function()
    {
    cIndex=this.columnIndex;
    document.getElementById("ipAddress").value=this.cells[0].innerHTML;
    };
}

