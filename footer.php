</div>
<footer class="text-center"><a href="teknobara.co.id" target="_blank"/>Teknobara Corp</a> &copy; 2018</footer>
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
            <script src="js/valid.js"></script>  
    <script>
    	$(document).ready(function() {

    		$('#tabeldata').DataTable();

		});
    </script>
	<!-- <script>
$( "#success" ).load( "autoreply.php #success" );
</script> -->
	<script>
var $success = $("#success");
setInterval(function () {
    $success.load("autoreply.php #success");
}, 3000);
</script>
  </body>
</html>