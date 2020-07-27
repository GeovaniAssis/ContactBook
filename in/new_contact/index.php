<?php 
	$page = "New contact";
	include "../header.php";
?>

	<section id="content">
		<div class="container block">
			<form id="creat__contact" action="">
				<div class="row" style="margin: 0px;">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<h1>New Contact</h1>

						<div class="row">
							<hr style="width: 100%;">
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
			                    <label for="name__contact" class="label__pattern">*Name:</label>
			                    <input type="text" name="name__contact" id="name__contact" class="input__pattern" required title="Fill in this field.">
			                </div>
							<div class="col-lg-6 col-md-12 col-sm-12">
			                    <label for="email__contact" class="label__pattern">*Email:</label>
			                    <input type="email" name="email__contact" id="email__contact" class="input__pattern" required title="Fill in this field.">
			                </div>
						</div>

						<div class="row">
							<div class="col-lg-12 address_field">
			                    <label for="address__contact" class="label__pattern" style="margin: 5px 0 0 6px;">*Address:</label>
			                    <textarea id="address__contact" name="address__contact" class="input__pattern" title="Fill in this field."></textarea>
			                </div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12">
						<h1>Phones:</h1>

						<div class="row">
							<hr style="width: 100%;">
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="phone__contact" class="label__pattern">*</label>
			                    <input type="text" id="phone__contact" name="phone__contact" class="phone input__pattern" required>
			                </div>
			            </div>

						<div id="phones" class="phones">
						</div>							

			            <div class="row">
			            	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6 text--center">
			            		<span id="more--phone" class="btn--phone" title="add new number.">+</span>
			            	</div>
			            	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6 text--center">
			            		<span id="less--phone" class="btn--phone" title="Remove the last number.">x</span>
			            	</div>
			            </div>
					</div>

					<div class="col-lg-12">
						<p style="color: red;">*Required field.</p>
					</div>

					<div class="col-lg-12 text--center">
						<input type="submit" class="submit" name="To save" value="To save">
					</div>
				</div>
			</form>
			<?php include "../../loading.php"; ?>

			<div class="error" style="display: none;">
	        	<div class="c-flash_icon c-flash_icon--error animate font-normal" style="width: 175px; height: 175px;">
	            	<span class="x-mark">
	                	<span class="line left"></span>
	                	<span class="line right"></span>
	            	</span>
	        	</div>
	        	<p id="description"></p>
	        	<div class="strip strip__submit text--center">
	        		<input type="submit" id="try--creat__contact" value="Try again" style="cursor: pointer;">
	        	</div>
	    	</div>

	    	<div id="thank" style="display: none;">
				<div class="c-flash_icon c-flash_icon--success animate font-normal">
					<span class="line tip"></span>
					<span class="line long"></span>
					<div class="placeholder"></div>
					<div class="fix"></div>
				</div>
				<p>Contact was created successfully!<br>Please wait.</p>
			</div>

		</div>
	</section>

<?php include "../footer.php"; ?>