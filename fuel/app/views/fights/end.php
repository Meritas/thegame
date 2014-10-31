<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "start" ); ?>'><?php echo Html::anchor('fights/start','Start');?></li>
	<li class='<?php echo Arr::get($subnav, "next" ); ?>'><?php echo Html::anchor('fights/next','Next');?></li>
	<li class='<?php echo Arr::get($subnav, "end" ); ?>'><?php echo Html::anchor('fights/end','End');?></li>

</ul>
<p>End</p>