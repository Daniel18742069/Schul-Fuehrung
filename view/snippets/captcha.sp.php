<div id="captcha_background">
	<div id="captcha_box">

		<div class="container-fluid">
			<div class="form-row">
				<div class="col-12">
					<div class="slidercaptcha card">
						<div class="card-header">
							<span>Complete the security check</span>
						</div>
						<div class="card-body">
							<div id="captcha"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="model/captcha/src/disk/longbow.slidercaptcha.min.js"></script>
		<script>
			var captcha = sliderCaptcha({
				id: 'captcha',
				repeatIcon: 'fa fa-redo',
				onSuccess: function() {
					var handler = setTimeout(() => {
						toggleCaptcha();
						toggleLoadingScreen(true);

						window.clearTimeout(handler);
						captcha.reset();

						window.submitForm.submit();
					}, 0);
				}
			});
		</script>

	</div>
</div>