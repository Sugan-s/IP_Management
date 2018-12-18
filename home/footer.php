        <!-- footer content -->
		<footer>
                    <div class="pull-right">
                     </div>
                    <div class="clearfix"></div>
		  </footer>
		<!-- footer content -->
   
    <!-- jQuery -->
    <script src="../frontend/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../frontend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../frontend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../frontend/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../frontend/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../frontend/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../frontend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../frontend/vendors/iCheck/icheck.min.js"></script>
      <!-- Datatables -->
    <script src="../frontend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../frontend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../frontend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../frontend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../frontend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../frontend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../frontend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../frontend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../frontend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <!--<script src="../frontend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>-->
    <!--<script src="../frontend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>-->
    <script src="../frontend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../frontend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../frontend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../frontend/vendors/pdfmake/build/vfs_fonts.js"></script>
    
     <!-- Custom Theme Scripts -->
    <script src="../frontend/build/js/custom.min.js"></script>
    <!-- Skycons -->
    <script src="../frontend/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../frontend/vendors/Flot/jquery.flot.js"></script>
    <script src="../frontend/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../frontend/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../frontend/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../frontend/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../frontend/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../frontend/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../frontend/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../frontend/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../frontend/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../frontend/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../frontend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
     <!-- bootstrap-daterangepicker -->
    <script src="../frontend/vendors/moment/min/moment.min.js"></script>
    <script src="../frontend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../frontend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
   
    
  

        <!--intialize datetime picker-->
    <script>
        $(document).ready(function () {
         var currentYear = (new Date).getFullYear();
         var currentMonth = (new Date).getMonth();
         var currentDay = (new Date).getDate();
    $('#myDatepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            //autoclose:true,
            //endDate: "today",
            maxDate: new Date(currentYear, currentMonth, currentDay)
        })
    });
    </script>
  <!--          color picker-->
<!--        <script src="../frontend/build/dependencies/jquery-1.9.1.min.js"></script>-->
	<script src="../frontend/build/dependencies/tinycolor-0.9.15.min.js"></script>
	<script src="../frontend/build/1.2.3/js/pick-a-color-1.2.3.min.js"></script>	
	
	<script type="text/javascript">
	
		$(document).ready(function () {

			$(".pick-a-color").pickAColor({
                                showSpectrum            : true,
				showSavedColors         : true,
				saveColorsPerElement    : true,
				fadeMenuToggle          : true,
				showAdvanced		: true,
				showBasicColors         : true,
				showHexInput            : true,
				allowBlank		: true,
				inlineDropdown		: true
			});
			
		});
	
		</script>
<!-- end of color picker-->
    <script>
    function myFunction() {
        var x = document.getElementById("subNetBit").value;
        if(x>32 || x<1)
        {
            document.getElementById("subNetBit").value = ""; 
        }   
    }
    </script>
<!--role combo box select script-->
  <script>
  function getText(element) {
  var role = element.options[element.selectedIndex].text
  document.getElementById("role").value = role;
  }
</script>
<!--service select-->
 <script>
  function getText(element) {
  var service = element.options[element.selectedIndex].text
  document.getElementById("service").value = service;
  }
</script>  
 <!--populate combo box from another combo box -->
  <script type="text/javascript">
   function update(str)
   {
      var xmlhttp;

      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("ipaddress").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","ajaxData.php?opt="+str, true);
      xmlhttp.send();
  }
</script>
<!--get status combo box-->
<script>
function getTextstatus(element)
{
   var status = element.options[element.selectedIndex].text
  document.getElementById("status").value = status; 
}
</script>

<!--<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
</script>-->

        </body>
</html>

