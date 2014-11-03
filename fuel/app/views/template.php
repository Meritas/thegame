<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
		ul, li{
			list-style: none;
		}
		#logout_btn{
			float: right;
		}
	</style>
</head>
<body>
	<?php if(!Auth::instance()->check()){
			$li = array(Html::anchor('./register', 'Register'), Html::anchor('users/login', 'Login'));
		}
		else{
			$li = array(Html::anchor('./logout', 'Logout', array('id'=> 'logout_btn')), Html::Anchor('./character_sheet', 'Character Sheet'), Html::Anchor('./', 'Story'));
		}
		echo Html::ul($li);
	?>
	<div class="container">
		<div class="col-md-12">		
		<?php if(Auth::instance()->check()){ ?>
			<h1><?php echo $title; ?></h1>
			<hr>
		<?php } ?>

			
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
<?php echo $content; ?>
		</div>
		<footer>
		</footer>
	</div>
</body>
</html>
