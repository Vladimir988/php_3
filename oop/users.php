<?php
	class User {
		public $name;
		public $login;
		public $password;

		function showInfo() {
			echo "<br>Имя пользователя: " . $this->name . "<br>";
			echo "Логин пользователя: " . $this->login . "<br>";
			echo "Пароль пользователя: " . $this->password . "<hr>";
		}

		function __construct($name, $login, $password) {
			$this->name = $name;
			$this->login = $login;
			$this->password = $password;
		}

		function __destruct(){
			echo "Пользователь: " . $this->login . " удален!<br>";
		}
	}

	class SuperUser extends User {
		public $role;

		function __construct($name, $login, $password, $role) {
			parent::__construct($name, $login, $password);
			$this->role = $role;
		}

		function showInfo() {
			parent::showInfo();
			echo "Роль пользователя: " . $this->role . "<hr>";
		}
	}


	$user1 = new User("John Smit", "JohnS", "1234");
	$user2 = new User("Bob Marly", "BobM", "5678");
	$user3 = new User("Ivan Tyz", "IvanT", "9012");
	$user1->showInfo();
	$user2->showInfo();
	$user3->showInfo();


	$superUser1 = new SuperUser("John Smit", "JohnS", "1234", "teacher");
	$superUser1->showInfo();