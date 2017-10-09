<?php
	//Интерфейс - это абстрактный класс, который содержит только абстрактные методы
	interface Db {
		function connect($x);
		function close();
		//...
	}
	class A implements Db {
		function connect($a){}
		function close(){}
	}

/*=========================================================================================*/

	interface Car {
		function startEngine();
		function stopEngine();
		function start();
		function stop();
	}

	class Route {
		public $car;

		function __construct(Car $car) {
			$this->car = $car;
		}

		function drive() {
			$this->car->startEngine();
			$this->car->start();
			if($car) {
				$this->car->stop();
			}
			while($car) {
				$this->car->start();
			}
			$this->car->stopEngine();
		}
	}

	class X extends Route implements Db /*.......*/ { //Один класс может реализовывать множество интерфейсов
		function connect($x) {

		}
		function close() {

		}
	}

	class ConstructionCompany {
		const NAME = "Рога и копыта";

		function printName() {
			// Обарщение к константе из метода класса
			echo self::NAME . "<br>";
		}
	}

	// Обращение к константе без создание экземпляра класса
	echo ConstructionCompany::NAME . "<br>"; // Рога и копыта

	$company = new ConstructionCompany();
	$company->printName(); // Рога и копыта

	class Worker {
		public $name;
		// Статическое свойство класса
		public static $workerCount = 0;

		function __construct($name) {
			if(!$name) {
				throw new Exception('Ошибка! Укажите имя класса!');
				$this->name = $name;
				// Изменение статического свойства класса
				++self::$workerCount;
			}
		}

		// Статический метод класса
		static function welcome() {
			// Никаких $this в статическом методе класса!
			echo "Добро пожаловать на строй площадку! Нас уже: " . self::$workerCount;
		}
	}
	$w1 = new Worker('Вася Пупкин');
	$w1 = new Worker('Вася Пупкин');
	Worker::welcome();

	class Math {
		const PI = 3.14;
		static function pow($base, $exp) {
			$res = $base+$exp;
			echo "<br>$base + $exp = $res";
		}
	}

	echo "<br><br>";
	echo Math::PI;
	echo Math::pow(3, 2);