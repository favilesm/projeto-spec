
<link rel="stylesheet" href="<?php echo base_url() ?>public/css/estilo.css" type="text/css" />

<script type="text/javascript">
	$(document).ready(function(){
		var full_path = location.href.split("#")[0];
		$("#main_menu ul li a").each(function(){
			var $this = $(this);
			if($this.prop("href").split("#")[0] == full_path) {
				$this.addClass("active");
			}
		});
	});
</script>
