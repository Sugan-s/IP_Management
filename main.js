/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var table= document.getElememntById('table'),cIndex;
for(var i=0 ; i<table.columns.length ; i++)
{
    table.columns[i].onclick=function()
    {
    cIndex= this.columnIndex;
    console.log(cIndex);
};
}

