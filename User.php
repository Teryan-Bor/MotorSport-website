<?php
  class User {
    function create($data){
			$fn = $data["first_name"];
			$ln = $data["last_name"];
			$email = $data["email"];
			$pass = password_hash($data['password'], PASSWORD_DEFAULT);
			$avatar = "https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=";


			$db = mysqli_connect("localhost", "root", "root", "boris");

  		if(!$db){
    		echo "connection error";
  		}else{
    		$query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `avatar`) 
              		VALUES ('$fn','$ln','$email','$pass','$avatar')";
    		$response = mysqli_query($db, $query);

				if(!$response){
					echo "query error";
				}else{
					header("Location: ./admin/index.php");
				}

    		mysqli_close($db);
  		}
		}


		function read(){
			$db = mysqli_connect("localhost", "root", "root", "boris");

  		if(!$db){
    		echo "connection error";
  		}else{
    		$query = "SELECT * FROM `users` ";
    		$response = mysqli_query($db, $query);
				$result = mysqli_fetch_all($response, MYSQLI_ASSOC);

    		mysqli_close($db);

				return $result;
  		}
		}

		function login($data){
			$email = $data['email'];
			$password = $data['password'];

			$db = mysqli_connect("localhost", "root", "root", "boris");

  		if(!$db){
    		echo "connection error";
  		}else{
    		$query = "SELECT * FROM `users` WHERE `email` = '$email' ";
    		$response = mysqli_query($db, $query);
				$result = mysqli_fetch_assoc($response);


				if(!$result){
					header("Location: ./login.php");
				}else{
					if(password_verify($password, $result['password'])){
						header("Location: ./admin/index.php");

					}else {
						header("Location: ./login.php");

					}
				}

    		mysqli_close($db);
  		}

		}

		function read_single($id){

			$db = mysqli_connect("localhost", "root", "root", "boris");

  		if(!$db){
    		echo "connection error";
  		}else{
    		$query = "SELECT * FROM `users` WHERE `id` = '$id' ";
    		$response = mysqli_query($db, $query);
				$result = mysqli_fetch_assoc($response);

    		mysqli_close($db);

				return $result;
  		}

		}

		function update($data){

			$fn = $data['first_name'];
			$ln = $data['last_name'];
			$em = $data['email'];
			$av = $data['avatar'];
			$id = $data['id'];

			$db = mysqli_connect("localhost", "root", "root", "boris");

  		if(!$db){
    		echo "connection error";
  		}else{
    		$query = "UPDATE `users` SET `first_name`='$fn',`last_name`='$ln',`email`='$em',`avatar`='$av' WHERE `id` = '$id' ";
    		mysqli_query($db, $query);

    		mysqli_close($db);

				header("Location: ./index.php");

  		}
		}

		function delete($data){
			$id = $data['id'];

			$db = mysqli_connect("localhost", "root", "root", "boris");

  		if(!$db){
    		echo "connection error";
  		}else{
    		$query = "DELETE FROM `users` WHERE `id` = '$id' ";
    		mysqli_query($db, $query);
				mysqli_close($db);

        header("Location: ./index.php");
  		}

		}
  } 
?>