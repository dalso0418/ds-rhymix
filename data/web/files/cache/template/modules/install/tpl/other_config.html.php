<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','header.html') ?>
<?php Context::addJsFile("modules/install/ruleset/install.xml", FALSE, "", 0, "body", TRUE, "") ?><form id="body"  method="post" action="./"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="install" />
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','progress_menu.html') ?>
	<div id="content">
		<h2><?php echo $lang->install_progress_menu['adminInfo'] ?></h2>
		<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<input type="hidden" name="act" value="procInstall" />
		<div class="x_control-group">
			<label for="aMail" class="x_control-label"><?php echo $lang->email_address ?></label>
			<div class="x_controls">
				<input name="email_address" type="email" id="aMail" class="focus" required />
			</div>
		</div>
		<div class="x_control-group">
			<label for="aPw1" class="x_control-label"><?php echo $lang->password1 ?></label>
			<div class="x_controls">
				<input name="password" type="password" id="aPw1" required />
			</div>
		</div>
		<div class="x_control-group">
			<label for="aPw2" class="x_control-label"><?php echo $lang->password2 ?></label>
			<div class="x_controls">
				<input name="password2" type="password" id="aPw2" required />
			</div>
		</div>
		<div class="x_control-group">
			<label for="aNick" class="x_control-label"><?php echo $lang->nick_name ?></label>
			<div class="x_controls">
				<input name="nick_name" type="text" id="aNick" required value="" />
			</div>
		</div>
		<div class="x_control-group">
			<label for="aId" class="x_control-label"><?php echo $lang->user_id ?></label>
			<div class="x_controls">
				<input name="user_id" type="text" id="aId" required value="" />
			</div>
		</div>
		<p class="install_help"><?php echo $lang->install_notandum ?></p>
		<div class="x_control-group">
			<label for="time_zone" class="x_control-label"><?php echo $lang->time_zone ?></label>
			<div class="x_controls">
				<select name="time_zone" style="width:100%">
					<?php $__loop_tmp=$__Context->timezones;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key==$__Context->selected_timezone){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
				</select>
			</div>
		</div>
		<p class="install_help"><?php echo $lang->about_time_zone ?></p>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_ssl ?></label>
			<div class="x_controls">
				<label for="ssl_always" class="x_inline"><input type="radio" name="use_ssl" id="ssl_always" value="always"<?php if($__Context->use_ssl !== 'none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="ssl_none" class="x_inline"><input type="radio" name="use_ssl" id="ssl_none" value="none"<?php if($__Context->use_ssl === 'none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_sitelock ?></label>
			<div class="x_controls">
				<label for="sitelock_n" class="x_inline"><input type="radio" name="use_sitelock" id="sitelock_n" value="N" checked="checked" /> <?php echo $lang->sitelock_options['none'] ?></label>
				<label for="sitelock_y" class="x_inline"><input type="radio" name="use_sitelock" id="sitelock_y" value="Y" /> <?php echo $lang->sitelock_options['lock'] ?></label>
			</div>
		</div>
		<p class="install_help"><?php echo $lang->about_sitelock_after_install($__Context->sitelock_ip_range) ?></p>
	</div>
	<div id="buttons">
		<div class="align-left">
			<a href="<?php echo getUrl('', 'act','dispInstallDBConfig') ?>" class="button grey">&laquo; <?php echo $lang->cmd_back ?></a>
		</div>
		<div class="align-right">
			<button type="submit" id="task-complete-install" value="" data-installing="<?php echo $lang->msg_installing ?>"><?php echo $lang->cmd_complete ?> &raquo;</button>
		</div>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','footer.html') ?>
