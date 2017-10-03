<?php
	/*class Pet { // в классе присутствуют свойства (аналог переменных) и методы (аналог функций в процедурном подходе);
		public $name;
		public $type = "unknown";

		function say($word) {
			echo $this->name . " said $word<br>";
			$this->drawLine();
		}

		function drawLine() {
			echo "<hr>";
		}

		function __construct($name, $type, $word) {
			$this->name = $name;
			$this->type = $type;
			$this->say($word);
			//echo "New object created<br>";
		}

		function __destruct() {
			echo "Object deleted!<br>";
		}

		function __clone() {
			echo "Object cloned!<br>";
		}
	}

	$cat = new Pet("Myrzik", "cat", "Myau");
	$dog = new Pet("Tuzik", "dog", "Gav");
	$bird = clone($cat);*/


	function test($var = false) {
		try {
			echo "Start<br>";
			if(!$var) {
				throw new Exception("$var is false!");
			}
			echo "Continue<br>";
		}
		catch(Exception $e) {
			echo "Exception: " . $e->getMessage() . "<br>";
			echo "in file: " . $e->getFile() . "<br>";
			echo "on line: " . $e->getLine() . "<br>";
		}
		finally {
			echo "The end!<br>";
		}
	}

	var_dump(test(1), test());

	//Создание абстрактного класса:
	abstract class HouseAbstract {
		public $model = "";
		public $square;
		public $floors;

		function __construct($model, $square = 0, $floors = 1) {
			if(!$model) {
				throw new Exception("Ошибка! Укажите модель!");
			}
			$this->model = $model;
			$this->square = $square;
			$this->floors = $floors;
		}

		function startProject() {
			echo "Start. Model: " . $this->model . "<br>";
		}

		function stopProject() {
			echo "Stop. Model: " . $this->model . "<br>";
		}

		abstract function build();
	}

	// Создание супер-класса:
	class SimpleHouse extends HouseAbstract {
		//Свойства абстрактного класса +
		public $color = "none";

		//Обязательная реализация абстрактного метода:
		function build() {
			echo "Build. House: " . $this->square . "x" . $this->floors . "<br>";
		}

		//Свой метод:
		function paint() {
			echo "Paint. Color: " . $this->color . "<br>";
		}
	}

	echo "<br><br>";

	//Создание простого дома
	$simple = new SimpleHouse("A-200-192", 120, 2);
	$simple->color = "red";
	$simple->startProject();
	$simple->build();
	$simple->paint();
	$simple->stopProject();

	//Создание класса наследника:
	class SuperHouse extends SimpleHouse {
		public $fireplace = true;
		public $patio = true;

		function fire() {
			if($this->fireplace) {
				echo "Fueled fireplace<br>";
			}
		}
	}

	echo "<br>";

	//Создание простого дома
	$super = new SuperHouse("A-320-3", 320, 3);
	$super->color = "green";
	$super->startProject();
	$super->build();
	$super->paint();
	$super->fire();
	$super->stopProject();
