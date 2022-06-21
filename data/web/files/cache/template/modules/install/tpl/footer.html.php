<?php if(!defined("__XE__"))exit;?>	<ul id="language" class="enfont">
		<?php $__loop_tmp=$__Context->lang_supported;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><li>
			<?php if($__Context->lang_type==$__Context->key){ ?><i class="x_icon-ok-sign x_icon-white" title="Selected Language"></i><?php } ?>
			<?php if($__Context->lang_type!=$__Context->key){ ?><a href="<?php echo getUrl('l', $__Context->key) ?>"><?php echo $__Context->val ?></a><?php } ?>
			<?php if($__Context->lang_type==$__Context->key){ ?><strong><?php echo $__Context->val ?></strong><?php } ?>
		</li><?php } ?>
	</ul>
	<div id="footer">
		Rhymix is based on the XpressEngine CMS owned by XEHub,<br />
		but it has been an independent project since 2015.
	</div>
</div>
