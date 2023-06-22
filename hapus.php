<?php

include 'db.php';

if (isset($_GET['idp'])) {
	$delete = mysqli_query($conn, "DELETE FROM tb_suspek WHERE id_suspek = '" . $_GET['idp'] . "' ");
	echo '<script>window.location="sus.php"</script>';
}
?>