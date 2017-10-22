<?php
	try {
		// Создание SOAP-клиента
		$client = new SoapClient("http://localhost/mysite_php3/demo/soap/stock.wsdl");
		print_r($client->__getFunctions());
		exit;
		// Посылка SOAP-запроса c получением результат
		$result = $client->getStock("b");

		$param["On_date"] = "2015-03-23T12:10:00";
		$res = $result->GetCursOnDateXML($param);

		$res->GetCursOnDateXMLResult->any;

		echo "Текущий запас на складе: ", $result;
	} catch (SoapFault $exception) {
		echo $exception->getMessage();	
	}
?>