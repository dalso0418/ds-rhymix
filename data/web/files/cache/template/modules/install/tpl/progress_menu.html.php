<?php if(!defined("__XE__"))exit;?><div id="progress">
	<ul>
		<li<?php if($__Context->act=='dispInstallIndex' || $__Context->act=='dispInstallLicenseAgreement' || !$__Context->act){ ?> class="active"<?php } ?>><?php echo $lang->install_progress_menu['license_agreement'] ?></li>
		<li<?php if($__Context->act=='dispInstallCheckEnv'){ ?> class="active"<?php } ?>><?php echo $lang->install_progress_menu['condition'] ?></li>
		<li<?php if($__Context->act=='dispInstallDBConfig'){ ?> class="active"<?php } ?>><?php echo $lang->install_progress_menu['dbInfo'] ?></li>
		<li<?php if($__Context->act=='dispInstallAdminConfig'){ ?> class="active"<?php } ?>><?php echo $lang->install_progress_menu['adminInfo'] ?></li>
	</ul>
</div>
