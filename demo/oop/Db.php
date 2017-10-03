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

	class X implements Db, Car /*.......*/ { //Один класс может наследовать множество интерфейсов
		
	}