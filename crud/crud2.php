<html>
<head>
	<title>Akademik</title>
	<link href="../public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="../public/fontawesome-free/css/all.min.css">
	<link href="../	public/css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<?php
	require("../koneksi/koneksi.php");

	$hub = open_connection();
	$a = @$_GET["a"];
	$id = @$_GET["id"];
	$sql = @$_POST["sql"];
	switch ($sql) {
		case 'create':
		create_prodi();
			break;
			case 'update':
		update_prodi();
			break;
			case 'delete':
		delete_prodi();
			break;
		}
		switch ($a) {
			case 'list':
			read_data();
				break;

			case 'input':
			input_data();
				break;

			case 'edit':
			edit_data($id);
				break;		
			case 'delete':

			delete_data($id);
				break;
			default:
			read_data();
				break;
		}
	mysqli_close($hub);
	?>

	<?php
	function read_data()
	{
		global $hub;
		$query = "select * from dt_prodi";
		$result = mysqli_query($hub, $query);?>
	<div class="container"><br><br>
	<h4> <strong>DATA PROGRAM STUDI</strong></h4>
		<a href="crud2.php?a=input" class="btn btn-danger mt-3 mb-3"> <i class="fas fa-plus"></i> Tambah Data</a>
		<table class="table table-striped table-hover">
			<tr>
				<td><b>ID</b></td>
				<td><b>KODE</b></td>
				<td><b>NAMA PRODI</b></td>
				<td><b>AKREDITASI PRODI</b></td>
				<td colspan="2"><b>AKSI</b></td>
			</tr>

		<?php while ($row=mysqli_fetch_array($result)) {?>
			<tr>
				<td><?php echo $row['idprodi'];?></td>
				<td><?php echo $row['kdprodi'];?></td>
				<td><?php echo $row['nmprodi'];?></td>
				<td><?php echo $row['akreditasi'];?></td>
				<td>
					
				</td>
				<td>EDIT HAPUS</td>
			</tr>

			<?php } ?>
		</table>
		<?php } ?>
	</div>

	<?php
		function input_data() {
			$row = array(
				"kdprodi"=> "",
				"nmprodi"=> "",
				"akreditasi"=> "-"
				); ?>
		<div class="container"><br><br>
			<h4> <strong>INPUT DATA PROGRAM STUDI</strong></h4> <br>
			
			<form action="crud2.php?a=list" method="post">
			<input type="hidden" name="sql" value="create">
				<div class="form-group">
					<label>Kode Prodi&nbsp; </label>
					<input type="text" name="kdprodi" class="form-control" value="<?php echo trim($row["kdprodi"]); ?>"/>
				</div>

				<div class="form-group">
					<label>Nama Prodi </label>
					<input type="text" name="nmprodi" class="form-control" value="<?php echo trim($row["nmprodi"]); ?>"/>
				</div>

				<div class="form-group">
					<label>Akreditasi Prodi </label>
					<input type="radio" name="akreditasi" value="-"
						<?php if ($row["akreditasi"]=='-' || $row["akreditasi"]=='') {

							echo "checked=\"checked\"";}else {echo "";} 
						?> > - 

						<input type="radio" name="akreditasi" value="A"
						<?php if ($row["akreditasi"]=='A'){

							echo "checked=\"checked\"";}else {echo "";} 
						?> > A 

						<input type="radio" name="akreditasi" value="B"
						<?php if ($row["akreditasi"]=='B') {

							echo "checked=\"checked\"";}else {echo "";} 
						?> > B 

						<input type="radio" name="akreditasi" value="C"
						<?php if ($row["akreditasi"]=='C') {

							echo "checked=\"checked\"";}else {echo "";} 
						?> > C 
				</div><br>

				<div align="right">
					<input type="submit" name="action" value="Simpan" class="btn btn-danger btn-lg active btn-sm btn-left" align="left">
					<a class="btn btn-primary btn-sm" href="crud2.php?a=list"> Batal</a>
				</div>
			</form>
		<?php } ?>
	</div>

<!-- Function untuk create update dan delete  -->
	<?php
	function create_prodi()
	{
	global $hub;
	global $_POST;
	$query = "insert into dt_prodi (kdprodi,nmprodi,akreditasi) values";
	$query.="('".$_POST["kdprodi"]."','".$_POST["nmprodi"]."','".$_POST["akreditasi"]."')";

	mysqli_query($hub, $query) or die(mysqli_error($hub));
	}
	?>
</body>
</html>


