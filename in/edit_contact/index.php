<?php
	$edit_contact 	= intval($_GET['c']);
	$page 	= "Edit contact";
	$url 	= "http://contactbook.ga";

	if( $edit_contact == 0 ){ header( 'Location: ' . $url ); }

	include "../header.php";
	include "../../assets/php/auto_edit_contact.php";

	if( $contact[0] == null ){ header( 'Location: ' . $url ); }
?>
	<section id="content">
		<div class="container block">
			<form id="edit__contact" action="">
				<div class="row" style="margin: 0px;">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<h1>Edit Contact</h1>

						<div class="row">
							<hr style="width: 100%;">
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
			                    <label for="name__contact" class="label__pattern">*Name:</label>
			                    <input type="text" name="name__contact" id="name__contact" class="input__pattern" required title="Fill in this field." value="<?php echo $contact[0]["nm_contact"]; ?>">
			                </div>
							<div class="col-lg-6 col-md-12 col-sm-12">
			                    <label for="email__contact" class="label__pattern">*Email:</label>
			                    <input type="email" name="email__contact" id="email__contact" class="input__pattern" required title="Fill in this field." value="<?php echo $contact[0]["ds_email"]; ?>">
			                </div>
						</div>

						<div class="row">
							<div class="col-lg-12 address_field">
			                    <label for="address__contact" class="label__pattern" style="margin: 5px 0 0 6px;">*Address:</label>
			                    <textarea id="address__contact" name="address__contact" class="input__pattern" title="Fill in this field."><?php echo $contact[0]["ds_address"]; ?></textarea>
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
			                    <input type="text" id="phone__contact" name="phone__contact" class="phone input__pattern" required value="<?php echo $telephones[0]['ds_telephone']; ?> ">
			                </div>
			            </div>

						<div id="phones" class="phones">
							<?php
								$count_phone = 0;
								$i = 1;
								foreach ($telephones as $telephone) { $count_phone++; }
								if ( $count_phone >= 2 ) {
									foreach ($telephones as $telephone) {
										if( $i >= 2){ ?>
											<div class="row">
												<div class="col-lg-12">
													<input type="text" name="phone[]" class="phone input__pattern" value="<?php echo $telephone['ds_telephone']; ?>">
												</div>
											</div>
										<?php }
										$i++;
									}
								}
							?>
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
						<input type="hidden" id="contact" name="contact" value="<?php echo $edit_contact; ?>">
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
	        		<input type="submit" id="try--edit__contact" value="Try again" style="cursor: pointer;">
	        	</div>
	    	</div>

	    	<div id="thank" style="display: none;">
				<div class="c-flash_icon c-flash_icon--success animate font-normal">
					<span class="line tip"></span>
					<span class="line long"></span>
					<div class="placeholder"></div>
					<div class="fix"></div>
				</div>
				<p>Contact was edited successfully!<br>Please wait.</p>
			</div>

		</div>
	</section>

<?php include "../footer.php"; ?>