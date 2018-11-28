<?php
include_once 'header.php';
?>
<div class="container isi">
			
			<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8">
		
		
<div class="page-header">
              <h5>Gammu Services</h5>
            </div>
			<div class="panel panel-default">
			  <div class="panel-body">
<?php
if (isset($_POST['hidup']))
{
   // menjalankan command menghentikan service Gammu
   passthru("gammu-smsd -c smsdrc -s");
}
else
{
// form berisi tombol untuk menghentikan service Gammu

?>
<form method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
<input type='submit' class="btn btn-success" name='hidup' value='Nyalakan Service Gammu'>
</form>
<br>
<?php
}  
if (isset($_POST['submit']))
{
   // menjalankan command menghentikan service Gammu
   passthru("gammu-smsd -k");
}
else
{
// form berisi tombol untuk menghentikan service Gammu

?>
<form method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
<input type='submit' class="btn btn-warning" name='submit' value='Hentikan Service Gammu'>
</form>

<?php
} 
?>
		  </div>
		  </div>
		  </div>
<div class="col-xs-12 col-sm-4 col-md-4">
		  	 <?php include_once 'sidebar.php'; ?>
		  	
		  </div>
		  </div>
		  
<?php
include_once 'footer.php';
?>