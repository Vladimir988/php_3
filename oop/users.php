<?php
	function __autoload($name) {
		require "classes/$name.class.php";
	}
	$user1 = new User("John Smit", "JohnS", "1234");
	$user2 = new User("Bob Marly", "BobM", "5678");
	$user3 = new User("Ivan Tyz", "IvanT", "9012");
	$user1->showInfo();
	$user2->showInfo();
	$user3->showInfo();


	$superUser1 = new SuperUser("John Smit", "JohnS", "1234", "teacher");
	$superUser1->showInfo();

	