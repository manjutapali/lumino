<div class = "col-lg-10 col-lg-offset-1 section">
	<?php  
		$link = "http://localhost/lumino/index.php/user/edit/" . $user['user_id'];
	?>
	<form class="usr-frm" method="post" action="<?php echo $link; ?>">
		<div class="form-group row">
  			<label for="fname" class="col-2 col-form-label lb-wid">Name : </label>
  			<div class="frm-disp">
    			<input class="form-control" type="text" id="fname" name="fname" value = "<?php echo $user['fname']; ?>" placeholder="First name" required/>
  			</div>
  			<div class="frm-disp">
    			<input class="form-control" type="text" id="lname" name="lname"  value = "<?php echo $user['lname']; ?>"placeholder="Last name" required/>
  			</div>
		</div>
		<div class="form-group row">
			<label for="dob" class="lb-wid">Date of birth : </label>
			<div class='frm-disp'>
                <input type='date' name="dob" class="form-control" id="dob" value = "<?php echo $user['dob']; ?>"/>
            </div>
		</div>
		<div class="form-group row">
			<label for="contact" class="lb-wid"> Contact no. : </label>
			<div class="frm-disp">
				<input type="text" class="form-control" name="contact" value="<?php echo $user['contact']; ?>" id="contact" maxlength="10" onkeypress="checkisnum()" placeholder="Contact number"/> 
			</div>
		</div>
		<div class="form-group row">
			<label class="lb-wid" for="email">Email :</label>
			<div class="frm-disp">
				<input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" id="email" placeholder="E-mail"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="address" class="lb-wid">Address :</label>
			<div class="frm-disp">
				<textarea class="form-control ct-text" id="address" name="address" cols="10" rows="5" placeholder="Address"><?php echo $user['address']; ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="frm-sub">
				<input type="submit" value="update" class="input-sub"/>
			</div>
		</div>
	</form>
</div>