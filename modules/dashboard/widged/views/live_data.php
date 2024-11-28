
$(function(){
	var obj = $('[data-widged-uuid="<?= $meta->get('widged_uuid') ?>"]');

	function <?= $uniq ?>() {
		
		var url = new WidgedUrl(obj);
        var meta = new WidgedMeta(obj);
		

		url.get({
			resource : '<?= $resource ?>',
			method : 'POST',
			params : meta.all(),
			success : function(res) {
				var html = res.html;
				if (typeof res.html == 'object') {
					html = JSON.stringify(res.html);
				}

				$('[data-live-id="<?= $uniq ?>"]').html(html);
			},
			fail : function(res) {
			}
		});
	}

	setInterval(function(){
		<?= $uniq ?>();
	}, 10000);
	<?= $uniq ?>();
})