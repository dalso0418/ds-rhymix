<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/install/tpl/css/install.css--><?php Context::loadFile(['modules/install/tpl/css/install.css', '', '', '', []]); ?>
<!--#Meta:modules/install/tpl/js/install.js--><?php Context::loadFile(['modules/install/tpl/js/install.js', '', '', '']); ?>
<div<?php if($__Context->lang_type == 'ko'){ ?> class="x"<?php };
if($__Context->lang_type != 'ko'){ ?> class="x enfont"<?php } ?>>
	<div id="header">
		<h1><img src="/common/img/logo.svg" alt="Rhymix" /></h1>
		<h2>Version <strong><?php echo \RX_VERSION ?></strong> Installation</h2>
	</div>
