<link type="text/css" href="include_js/jquery-ui-1.7.2.custom/css/ui-darkness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom//js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom//js/jquery-ui-1.7.2.custom.min.js"></script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({dateFormat: 'dd-mm-yy'}); 
	});
</script>

<div class="demo">

<p>Date: <input id="datepicker" type="text"></p>

</div><!-- End demo -->

<div style="display: none;" class="demo-description">

<p>The datepicker is tied to a standard form input field.  Focus on the input (click, or use the tab key) to open an interactive calendar in a small overlay.  Choose a date, click elsewhere on the page (blur the input), or hit the Esc key to close. If a date is chosen, feedback is shown as the input's value.</p>

</div><!-- End demo-description -->