<?php
	/* Создание изображения */
	//$img = imageCreate(500, 300);
	$img = imageCreateTrueColor(500, 300);

	/* Подготовка к работе */
	imageAntiAlias($img, true); //сглаживание;
	
	$red = imageColorAllocate($img, 255, 0, 0);
	$white = imageColorAllocate($img, 0xFF, 0xFF, 0xFF);
	$black = imageColorAllocate($img, 0, 0, 0);
	$green = imageColorAllocate($img, 0, 255, 0);
	$blue = imageColorAllocate($img, 0, 0, 255);
	$grey = imageColorAllocate($img, 192, 192, 192);
	
	imageFill($img, 0, 0, $grey);

	/* Рисуем примитивы */
	imageSetPixel($img, 10, 10, $black);
	imageLine($img, 20, 20, 80, 280, $red);
	imageLine($img, 20, 20, 480, 20, $white);
	imageLine($img, 480, 20, 480, 280, $white);
	imageLine($img, 480, 280, 20, 280, $white);
	imageLine($img, 20, 280, 20, 20, $white);
	imageRectangle($img, 20, 20, 80, 280, $blue); //заливаем нашу фигуру image--Filled--Rectangle

	$points = array(0, 0, 100, 200, 300, 200);
	imageFilledPolygon($img, $points, 3, $green);
	imageEllipse($img, 200, 150, 300, 200, $red);
	imageArc($img, 210, 140, 300, 200, 270, 0, $black);
	imageFilledArc($img, 210, 160, 300, 200, 0, 90, $red, IMG_ARC_PIE);

	/* Рисуем текст */
	imageString($img, 5, 150, 200, 'PHP5', $black);
	imageChar($img, 5, 20, 20, 'PHP5', $blue);
	imageCharUp($img, 5, 20, 20, 'PHP5', $blue);
	imageTtfText($img, 30, 10, 300, 150, $black, 'bellb.ttf', 'PHP5');

	/* Отдаем изображение */
	//header("Content-type: image/gif");
	//imageGif($img/*, "test.gif"*/);
	header("Content-type: image/png");
	imagePng($img);
	//header("Content-type: image/jpg");
	//imageJpeg($img);