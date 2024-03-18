<div class="container col-lg-3 col-costom col-md-5	 col-sm-8 col-10  d-flex flex-column
align-items-center  justify-content-center ">

	<form class="form-control bg-light mt-5  form-horizontal h-75" method="post" action="" >

		<div class="form-group p-3">
			<div class="text-center my-3">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
				  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
				  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
				</svg>
			</div>
			<?php

				
				
				//
				if(isset($_POST["register-btn"])){
					$username = $_POST["username"];
					$email = $_POST["email"];
					$phone_number = $_POST["phone_number"];
					$password = $_POST["password"];
					$reg_date = date('Y-m-d') ;
					$re_password = $_POST["re_password"];
					
					//

				if($password == $re_password){
						$password = md5($password);
						$sql = "INSERT INTO `users`
						(`username`,`phone_number`,`email`,`password`,`reg_date`)
						VALUES
						(:username,:phone_number,:email,:password,:reg_date)";
						//
						$result = $connection->prepare($sql);
						$result->bindParam(':username',$username);
						$result->bindParam(':phone_number',$phone_number);
						$result->bindParam(':email',$email);
						$result->bindParam(':password',$password);
						$result->bindParam(':reg_date',$reg_date);
						//
						$runcode = $result->execute();
						//
						if($runcode == true){
							echo "<div class='alert alert-success'>ثبت نام با موفقیت انجام شد </div>";
						}
						else{
							echo "<div class='alert alert-danger'>خطا در ثبت نام پیش آمده </div>";
						};
				}
				else{
					echo "<div class='alert alert-warning'>تکرار رمز عبور صحیح نمی باشد </div>";
				}
				

				};



			?>
			<div class="col-sm-12 mx-auto gap-3 d-flex flex-column">
				<input type="text" name="username"  class="form-input fs-7 form-control"
				id="username" placeholder="نام کاربری" autocomplete="off" >
				
				
				<input type="email" name="email" class="form-input fs-7 form-control"
				id="email" placeholder="ایمیل" autocomplete="off" >
				
				
				<input type="text" name="phone_number" class="form-input fs-7 form-control"
				id="phone_number" placeholder="شماره موبایل" autocomplete="off" >
				
				
				<input type="password" name="password" class="form-input fs-7 form-control"
				id="password" placeholder="رمز عبور" autocomplete="off" >

				
				<input type="password" name="re_password" class="form-input fs-7 form-control"
				id="re_password" placeholder="تکرار رمز عبور" autocomplete="off" >
				
				<input type="submit" value=" ایجاد حساب کاربری" class="btn fs-7 btn-dark" id="register-btn" name="register-btn" >	
				<input type="button" value=" ورود به حساب کاربری" onclick="location.href = '?page=login' " class="btn fs-7 btn-primary" >
			</div>
		</div>
	</form>
</div>