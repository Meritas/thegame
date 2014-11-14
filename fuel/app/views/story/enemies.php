<?php if(Auth::instance()->check()){ ?>
<p>Welcome, <?php echo Auth::instance()->get_screen_name(); ?> </p>
<?php echo $enemies; ?>

<?php }?>