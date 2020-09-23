<?php 	
	echo "<!DOCTYPE html>
	<html>
	<head>
		<title>Verfied Account</title>
		<link rel='stylesheet' href='sweetalert2.css'>
	</head>
	<body>
		
	<script src='sweetalert2.js'></script>	
	<script>
		swal({
	      title: 'Success',
	      text: 'Your account is valid',
	      type: 'success',
	      showCancelButton: false,
	      confirmButtonColor: '#3085d6',
	      confirmButtonText: 'OK'
	    }).then((value) => {
	      window.location = 'loginRegisterfyp.php'
	    }).catch(swal.noop)

	</script>
	</body>
	</html>";
 ?>