<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('users/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('users/login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('users/logout','Logout');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('users/delete','Delete');?></li>

</ul>
<p>Logout</p>