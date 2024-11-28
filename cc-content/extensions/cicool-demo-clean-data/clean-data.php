<?php
defined('BASEPATH') or exit('No direct script access allowed');

app()->load->library('cc_app');

define('DIRNAME', basename(__DIR__));

define('IS_DEMO', true);


cicool()->onEvent('backend_content_top', function () {
	echo  '
	<div class="callout callout-warning message-alert" style="margin-bottom: 0!important; border-left:none; border-radius:0px">
        Database will reset every 12 hour.
        <button class="close pull-right" >&times;</button>
      </div>
	<script>
	$(function(){
		$(document).find(".message-alert .close").click(function(event) {
			$(this).parent(".message-alert").hide();
          });
	});
	</script>
      ';
});

cicool()->onRoute('clean/data', 'get', function () {
	$app = app()->load->library(DIRNAME . '/clean');

	app()->clean->clean();
});
