<?php

include '../home/content.php';
?>
 <div class="right_col"  role="main">
         <div class="">
             <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
      		 <div class="title_left" align="center">
                    <h3> Search Page</h3>
                 </div>
                 <br>
                
             <form id="search"action="../search/search.php">
             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="center">
                 
                 
                 
                          <div class="input-group" align="center">
                              <input align="center" type="text" class="form-control" name="searchValue" id="searchValue" placeholder="Enter ip address or circuit id ">
                            <span class="input-group-btn">
                                <a href="../search/searchUser.php" onclick="this.href+'?id='+document.getElementById('searchValue').value;">
                                    <button type="submit" name="submit" class="btn btn-primary" >Search</button></a>
                            </span>
                          </div>
                   </div>
				</br>
                             <div class="clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12" >                              
                                 
                                </div>			
                            </div>
             </form>			
        </div>
        </div>
<?php

include '../home/footer.php';

