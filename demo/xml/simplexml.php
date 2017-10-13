<?php 
  header( "Content-Type: text/html; charset=utf-8");
  $sxml = simplexml_load_file("catalog.xml");
  $str = $sxml->book[0]->asXML();
  //var_dump($str);
  //echo $sxml->book[1]->title;
  /*echo $sxml->book[1]->title = "XML и IE21";*/
  //Запись строки в файл
  /*file_put_contents("catalog.xml", $sxml->asXML());*/
?>
<html>

<head>
  <title>Каталог</title>
</head>

<body>
  <h1>Каталог книг</h1>
  <table border="1" width="100%">
    <tr>
      <th>Автор</th>
      <th>Название</th>
      <th>Год издания</th>
      <th>Цена, руб</th>
    </tr>
    <?php 
      //Парсинг 
    ?>
  </table>
</body>

</html>