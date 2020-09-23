<?php echo " <!DOCTYPE html>
<head>
 
    <title>Title</title>
    <link rel=\"stylesheet\" href=\"assets/panel/vendor/sweetalert2/dist/sweetalert2.min.css\" type=\"text/css\">
</head>
<body>


<script src=\"assets/panel/vendor/sweetalert2/dist/sweetalert2.min.js\"></script>
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
</html>
";
?>