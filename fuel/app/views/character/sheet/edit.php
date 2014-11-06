<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "generate" ); ?>'><?php echo Html::anchor('character/sheet/generate','Generate');?></li>
	<li class='<?php echo Arr::get($subnav, "view" ); ?>'><?php echo Html::anchor('character/sheet/view','View');?></li>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('character/sheet/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('character/sheet/delete','Delete');?></li>
	<li class='<?php echo Arr::get($subnav, "reset" ); ?>'><?php echo Html::anchor('character/sheet/reset','Reset');?></li>

</ul>
<p>Edit</p>