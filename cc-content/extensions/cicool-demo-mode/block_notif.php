<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ciool | Blocked</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<script src="<?= BASE_ASSET; ?>/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="<?= $base_url_extension; ?>/js/jquery.countdown.min.js"></script>
	<style type="text/css">
		#getting-started {
			font-size: 40px;
			width: 400px;
			background: #000;
			color: #fff;
			padding: 20px;
			margin-top: 40px;
			clear: both;
		}
	</style>
</head>

<body>
	<div class="container text-center">
		<h1 class="text-muted">Your request exceeds the limit</h1>
		<h4>You can perform post activities until</h4>
		<center>
			<div id="getting-started" class=" text-danger"></div>
		</center>
	</div>
	<script type="text/javascript">
		$("#getting-started")
			.countdown("<?= $user_block->blocked_until; ?>", function(event) {
				$(this).text(
					event.strftime('%H:%M:%S')
				);
			})
			.on('finish.countdown', function() {
				window.location.href = "<?= admin_base_url('/login'); ?>";
			});
	</script>
</body>

</html>