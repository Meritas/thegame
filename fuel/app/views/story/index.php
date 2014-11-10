<?php if(Auth::instance()->check()){ ?>
<div ng-view>12</div>
<p>Welcome, <?php echo Auth::instance()->get_screen_name(); ?> </p>
<?php echo $enemies; ?>

<?php }?>