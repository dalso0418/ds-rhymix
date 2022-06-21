<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','header.html') ?>
<form id="body" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','progress_menu.html') ?>
	<div id="content">
		<h2><?php echo $lang->license_agreement ?></h2>
		<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<input type="hidden" name="act" value="procInstallLicenseAgreement">
		<input type="hidden" name="module" value="install">
		<div class="content-license">
			<?php if($__Context->lang_type === 'ko'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','license_text.ko.html');
} ?>
			<?php if($__Context->lang_type !== 'ko'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','license_text.en.html');
} ?>
		</div>
		<p>
			<label><input type="checkbox" name="license_agreement" value="Y" /> <strong><?php echo $lang->cmd_license_agree ?></strong></label>
		</p>
	</div>
	<div id="buttons">
		<div class="align-left">
			<!--<a href="<?php echo getUrl('', 'act','') ?>" class="button grey">&laquo; <?php echo $lang->cmd_back ?></a>-->
		</div>
		<div class="align-right">
			<button type="submit" id="task-license-agreement" value=""><?php echo $lang->cmd_next ?> &raquo;</button>
		</div>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','footer.html') ?>
