<?php
	class User extends UserAbstract{
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