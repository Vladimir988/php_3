<?php
	class simpleHouse {

		public $model = "";
		public $square = 0;
		public $floors = 0;
		public $color = "none";

		function __construct($model, $square = 0, $floors = 1) {
			$this->model = $model;
			$this->square = $square;
			$this->floors = $floors;
		}

		function startProject() {
			echo "Start. Model: " . $this->model . "<br>";
		}

		function stopProject() {
			echo "Stop. Model: " . $this->model . "<hr><br>";
		}

		function build() {
			echo "Build. House: " . $this->square . "x" . $this->floors . "<br>";
		}

		function paint() {
			echo "Paint. Color: " . $this->color . "<br>";
		}
	}

	// Создание простого дома:
	$simple = new simpleHouse("A-100-123", 120, 2);
	$simple->color = "red";
	$simple->startProject();
	$simple->build();
	$simple->paint();
	$simple->stopProject();

	// Создание класса-наследника
	class superHouse extends simpleHouse {
		public $fireplace = true;
		public $patio = true;

		function fire() {
			if($this->fireplace) {
				echo "Fuiled fireplace<br>";
			}
		}
	}

	$simple = new superHouse("A-100-125", 320, 3);
	$simple->color = "green";
	$simple->startProject();
	$simple->build();
	$simple->paint();
	$simple->fire();
	$simple->stopProject();

	// Создание класса-наследника
	class fabricHouse extends simpleHouse {

		// Перегрузка метода
		function build() {
			echo "Build. Fabric: " . $this->square . "x" . $this->floors . "<br>";
		}

	}

	$simple = new fabricHouse("A-100-128", 560, 4);
	$simple->color = "tomato";
	$simple->startProject();
	$simple->build();
	$simple->paint();
	$simple->stopProject();

	// Создание класса-наследника
	class superFabricHouse extends fabricHouse {
		function build() {
			echo "====================================================================<br>";
			// Вызов родительского метода:
			echo parent::build();
			echo "====================================================================<br>";
		}
	}

	$simple = new superFabricHouse("A-100-133", 100, 15);
	$simple->color = "white";
	$simple->startProject();
	$simple->build();
	$simple->paint();
	$simple->stopProject();