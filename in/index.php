<?php 
	$page = "Home";
	include "header.php";

	include "../assets/php/autocontacts.php";
?>

	<section id="content">
		<div class="container block">
			<div class="col-lg-12">
				<h1>For <?php echo $_SESSION["user"]["name"]; ?></h1>
			</div>

			<div class="col-lg-12">
				<hr>
			</div>

			<div class="col-lg-12" style="overflow: auto;">
	            <?php 
	                $exist = 0; 
	                foreach ($contacts as $contact){ $exist = 1; };
	                if ($exist == 1) { ?>
						<table class="table">
		                    <thead>
		                        <tr>
		                            <th>Name</th>
		                            <th>Email</th>
		                            <th>To view</th>
		                            <th>To edit</th>
		                            <th>To delete</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <?php 
		                        	$color = 1;
		                        	foreach ($contacts as $contact){
		                        		$row = $color % 2; ?>

					                        <tr class="<?php if( $linha  == 0 ){ echo 'color';} ?>">

					                            <td><?php echo $contact["nm_contact"]; ?></td>

					                            <td><?php echo $contact["ds_email"]; ?></td>

					                            <td>
					                            	<img src="<?php echo $url; ?>/assets/image/icon/view.png"
					                            	data-cod="<?php echo $contact["cd_contact"]; ?>"
					                            	data-name="<?php echo $contact["nm_contact"]; ?>"
					                            	data-email="<?php echo $contact["ds_email"]; ?>"
					                            	data-address="<?php echo $contact["ds_address"]; ?>"
					                            	class="view">
					                            </td>

					                            <td><a href="<?php echo $url; ?>/in/edit_contact/?c=<?php echo $contact["cd_contact"]; ?>"><img src="<?php echo $url; ?>/assets/image/icon/edit.png"></a></td>

					                            <td>
					                            	<img src="<?php echo $url; ?>/assets/image/icon/delet.png" data-cod="<?php echo $contact["cd_contact"]; ?>" data-name="<?php echo $contact["nm_contact"]; ?>" class="delet">
					                            </td>
					                        </tr>

                                    	<?php $color++;
									};
								?>
		                    </tbody>
		                </table>
	            <?php }else{ ?>
	            	<h1>No contact registered.</h1>
	            <?php } ?>
			</div>

		</div>
	</section>

	<section id="dark_background"></section>

	<section id="block_in">
		<form id="deleting" action="" style="display: none;">
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<h1 class="text--center">Are you sure you want to delete<br>"<span></span>"?</h1>
					<input type="hidden" id="contact" name="contact" value="">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<input type="submit" class="submit btn_Delet text--center" name="Delet" value="Delet">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="back btn_Delet text--center">Come back</div>
				</div>
			</div>
		</form>

		<div id="view" style="display: none;">
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<h1 class="name"></h1>
				</div>
			</div>
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<p>Email:<br><span class="email"></span></p>
				</div>
			</div>
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<p style="margin: 0;">Address:<br><span class="address"></span></p>
				</div>
			</div>
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<hr>
				</div>
			</div>
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<h1>Phones:</h1>
				</div>
			</div>
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<p class="phones" style="margin: 0;"></p>
				</div>
			</div>
			<div class="row" style="margin: 0px;">
				<div class="col-lg-12">
					<div class="back btn_Delet text--center">Come back</div>
				</div>
			</div>
			
		</div>

		<?php include "../loading.php"; ?>

		<div class="error" style="display: none;">
        	<div class="c-flash_icon c-flash_icon--error animate font-normal" style="width: 175px; height: 175px;">
            	<span class="x-mark">
                	<span class="line left"></span>
                	<span class="line right"></span>
            	</span>
        	</div>
        	<p id="description"></p>
        	<div class="strip strip__submit text--center">
        		<input type="submit" id="try--deleting" value="Try again" style="cursor: pointer;">
        	</div>
    	</div>

    	<div id="thank" style="display: none;">
			<div class="c-flash_icon c-flash_icon--success animate font-normal">
				<span class="line tip"></span>
				<span class="line long"></span>
				<div class="placeholder"></div>
				<div class="fix"></div>
			</div>
			<p>User successfully registered!<br>Please wait.</p>
		</div>

	</section>

<?php include "footer.php"; ?>