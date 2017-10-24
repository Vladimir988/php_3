<?php
//Получаем имя хоста по ip-адресу
echo $host_name = getHostByAddr("50.87.249.59"), "<br>";

//Получаем ip-адрес по имени хоста
echo $ip_address = getHostByName("google.com"), "<br>";

//Получаем массив ip-адресов по имени хоста
echo $ip_addresses = getHostByNameL("google.com"), "<br>";

//Получаем номер порта по имени службы
echo $port = getServByName("http", "tcp"), "<br>";

//Получаем имя службы по номеру порта
echo $service = getServByPort(80, "tcp"), "<br>";

//Получаем DNS запись для указанного хоста
echo $dns_record = dns_get_record("google.com"), "<br>";

//Получаем MX запись для указанного хоста
echo $dns_record = getmxrr("google.com"), "<br>";

//Проверяем имя хоста на существование
echo $exists = checkdnsrr("google.com"), "<br>";