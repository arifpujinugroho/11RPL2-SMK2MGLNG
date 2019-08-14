<!DOCTYPE html>
<html>

<head>
	<title>form</title>
</head>

<body>
	<form action="proses.php" method="post">
		<table>

			<tr>
				<td>nama</td>
				<td><input type="text" name="nama" size="20"></td>
			</tr>

			<tr>
				<td>alamat</td>
				<td><textarea cols="20" rows="5" name="alamat"></textarea></td>
			</tr>

			<tr>
				<td>usia</td>
				<td><input type="text" name="usia" size="20"></td>
			</tr>

			<tr>
				<td><input type="submit" name="proses" value="proses"></td>
				<td><input type="reset" value="hapus"></td>
			</tr>

		</table>
	</form>
</body>

</html>