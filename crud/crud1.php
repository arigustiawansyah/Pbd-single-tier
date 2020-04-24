<html>
<head>
	<title>Akademik</title>
	<link href="../public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="../public/fontawesome-free/css/all.min.css">
	<link href="../public/css/style.css" rel="stylesheet" type="text/css"/>
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
	<br>
		<h2>Read data program studi</h2>
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
</body>
</html>


