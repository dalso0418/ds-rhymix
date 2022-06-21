<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','header.html') ?>
<div id="body">
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','progress_menu.html') ?>
	<div id="content">
		<?php if($__Context->install_enable){ ?><h2><?php echo $lang->install_condition_enable ?></h2><?php } ?>
		<?php if(!$__Context->install_enable){ ?><h2><?php echo $lang->install_condition_disable ?></h2><?php } ?>
		<table id="check_env">
			<?php $__loop_tmp=$__Context->checklist;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
				<tr>
					<td class="check_env_item">
						<?php echo $lang->install_checklist_title[$__Context->key] ?>
						<?php if($__Context->key === 'php_version'){ ?>(<?php echo $__Context->phpversion ?>)<?php } ?>
					</td>
					<td class="check_env_status">
						<?php if($__Context->val){ ?><span class="ok">OK</span><?php } ?>
						<?php if(!$__Context->val){ ?><span class="error">ERROR</span><?php } ?>
					</td>
				</tr>
				<?php if(!$__Context->val && isset($lang->install_checklist_desc[$__Context->key])){ ?><tr>
					<td colspan="2" class="error_description">
						<?php if($__Context->key === 'php_version'){ ?>
							<?php echo sprintf($lang->install_checklist_desc[$__Context->key], __XE_MIN_PHP_VERSION__) ?>
						<?php }elseif($__Context->key === 'session'){ ?>
							<?php echo $lang->install_checklist_desc[$__Context->key] ?>
							<?php if(preg_match('/^([a-z0-9_-]+).[a-z0-9_-]+.(com|net|co\.kr)/i', $_SERVER['HTTP_HOST'], $__Context->matches) && $__Context->matches[1] !== 'www'){ ?>
								<br /><strong><?php echo $lang->install_checklist_desc['free_domain_warning'] ?></strong>
							<?php } ?>
						<?php }else{ ?>
							<?php echo $lang->install_checklist_desc[$__Context->key] ?>
						<?php } ?>
					</td>
				</tr><?php } ?>
			<?php } ?>
			<tr>
				<td class="check_env_item">mod_rewrite</td>
				<td class="check_env_status" id="mod_write_status">
					<span class="ok" style="display:none">OK</span>
					<span class="no">&mdash;</span>
				</td>
			</tr>
			<tr id="mod_rewrite_checking" data-url="<?php echo Context::getRequestUri() ?>REWRITE/CHECK/SRSLY/ANYTHING/GOES/<?php echo InstallView::$rewriteCheckFilePath ?>" data-verify="<?php echo InstallView::$rewriteCheckString ?>">
				<td colspan="2" class="error_description">
					<?php echo $lang->checking_rewrite ?>
				</td>
			</tr>
			<tr id="mod_rewrite_no_support" style="display:none">
				<td colspan="2" class="error_description">
					<?php echo $lang->disable_rewrite ?>
					<?php if($__Context->use_nginx){ ?><br /><?php echo $lang->about_nginx_rewrite;
} ?>
					<br /><strong><?php echo $lang->disable_rewrite_can_proceed ?></strong>
				</td>
			</tr>
		</table>
	</div>
	<div id="buttons">
		<div class="align-left">
			<a href="<?php echo getUrl('', 'act','dispInstallLicenseAgreement') ?>" class="button grey">&laquo; <?php echo $lang->cmd_back ?></a>
		</div>
		<div class="align-right">
			<?php if($__Context->install_enable){ ?><a class="button" id="task-checklist-confirm" href="<?php echo getUrl('','act','dispInstallDBConfig') ?>"><?php echo $lang->cmd_next ?> &raquo;</a><?php } ?>
			<?php if(!$__Context->install_enable){ ?><a class="button" id="task-checklist-fix" href="<?php echo getUrl('','act',$__Context->act) ?>"><?php echo $lang->cmd_install_refresh_page ?> &raquo;</a><?php } ?>
		</div>
	</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/install/tpl','footer.html') ?>
