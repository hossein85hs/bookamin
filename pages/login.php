<div class="container col-lg-3 col-costom col-md-5	 col-sm-8 col-10  d-flex flex-column align-items-center justify-content-center ">

	<form class="form-control bg-light m-5  form-horizontal h-75" method="post" action="" >

		<div class="form-group p-3">
			<div class="text-center my-3">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                 fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
				  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
				  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 
                  11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
				</svg>
			</div>
			<?php
				if(isset($_POST['login-btn'])){
					$email = $_POST['email'];
					$password =md5($_POST['password']);
					$sql =" SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ";
					$result = $connection->query($sql);
					if($row = $result->fetch(PDO::FETCH_ASSOC)){
						header("location:admin/");
						$_SESSION['is_login'] = true ;
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['username'] = $row['username'];

						

						// echo " <div class='alert text-center alert-success'>کاربر یافت شد </div>";
						// die(var_dump($row));
					}
					else{
						echo "<div class='alert alert-danger'>کاربر یافت نشد</div>";
					}
				};
			?>
			<div class="col-sm-12 mx-auto gap-3 d-flex flex-column">

				<input type="email" name="email" class="form-input fs-7 form-control"
				id="email" placeholder="ایمیل" autocomplete="off" >
								
				<input type="password" name="password" class="form-input fs-7 form-control"
				id="password" placeholder="رمز عبور" autocomplete="off" >

				
				<input type="submit" value=" ورود به حساب کاربری " class="btn fs-7 btn-dark" id="login-btn" name="login-btn" >	
				<input type="button" value=" ایجاد حساب کاربری " onclick="location.href = '?page=register' " class="btn fs-7 btn-primary" >
			</div>
		</div>
	</form>
</div>