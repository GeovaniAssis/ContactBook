<?php include "header.php"; ?>

	<section id="block">

		<h1>Contact Book</h1>

		<form id="login">
			<div class="strip">
				<label for="email" class="label__pattern">Email:</label>
				<input type="mail" id="email" name="email" class="input__pattern input__email" required>
				<label for="email" class="error__label__pattern"></label>
			</div>
			<div class="strip">
				<label for="password" class="label__pattern">Password:</label>
				<input type="password" id="password" name="password" class="input__pattern input__password" required>
				<label for="email" class="error__label__pattern"></label>
			</div>
			<div class="strip strip__submit">
				<input type="submit" name="login" value="Login">

				<div class="sign_up">Sign up</div>
			</div>
		</form>


		<form id="sign_up">
			<div class="strip">
				<label for="name_sign_up" class="label__pattern">Name:</label>
				<input type="mail" id="name_sign_up" name="name_sign_up" class="input__pattern input__name" required>
				<label for="name_sign_up" class="error__label__pattern"></label>
			</div>
			<div class="strip">
				<label for="email_sign_up" class="label__pattern">Email:</label>
				<input type="mail" id="email_sign_up" name="email_sign_up" class="input__pattern input__email" required>
				<label for="email_sign_up" class="error__label__pattern"></label>
			</div>
			<div class="strip">
				<label for="password_sign_up" class="label__pattern">Password:</label>
				<input type="text" id="password_sign_up" name="password_sign_up" class="input__pattern input__password" required>
			</div>
			<div class="strip strip__submit">
				<input type="submit" name="To register" value="To register">
				<div class="to_back">To back</div>
			</div>
		</form>

		<div class="error" style="display: none;">
        	<div class="c-flash_icon c-flash_icon--error animate font-normal">
            	<span class="x-mark">
                	<span class="line left"></span>
                	<span class="line right"></span>
            	</span>
        	</div>
        	<p id="description"></p>
        	<div class="strip strip__submit">
        		<input type="submit" id="try--login" value="Try again" style="cursor: pointer;">
        	</div>
    	</div>

		<?php include "loading.php"; ?>
		

    	<div id="thank" style="display: none;">
			<div class="c-flash_icon c-flash_icon--success animate font-normal">
				<span class="line tip"></span>
				<span class="line long"></span>
				<div class="placeholder"></div>
				<div class="fix"></div>
			</div>
			<p>Contact was deleted successfully!<br>Please wait.</p>
		</div>
	</section>

<?php include "footer.php"; ?>