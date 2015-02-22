<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "register" ); ?>'><?php echo Html::anchor('user/register','Register');?></li>
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('user/login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('user/logout','Logout');?></li>

</ul>
<p>Login</p>