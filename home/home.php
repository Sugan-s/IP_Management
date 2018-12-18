<?php

include 'content.php';
?>
 <div class="right_col"  role="main">
         <div class="">
      		 <div class="title_left" align="center">
                    <h3>IP Address Management Home</h3>
                 </div>
             <form id="search"action="../search/search.php">
             
				</br>
                             <div class="clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12" >                              
                                 <?php
                                                 include 'homeTable.php';
                                                 $table=new Load_home();
                                                 $table->MainIp_Table(); //call MainIp table
                                                 $table->CategoryTable(); //call category table
                                    ?>
                                </div>			
                            </div>
             </form>			
        </div>
        </div>
<?php

include 'footer.php';
