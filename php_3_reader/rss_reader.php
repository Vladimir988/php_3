<?php
	const FILE_NAME = "news.xml";
	const RSS_URL = "http://localhost/php_3/news/rss.xml";
	const RSS_TTL = 3600;

	function downLoad($url, $filename){
		$file = file_get_contents($url);
		if($file){
			file_put_contents($filename, $file);
		}
	}
	if(!is_file(FILE_NAME)){
		downLoad(RSS_URL, FILE_NAME);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Новостная лента</title>
</head>
<body>
	
	<h1>Последние новости</h1>
	<?php
		$xml = simplexml_load_file(FILE_NAME);
		$i = 1;
		foreach($xml->channel->item as $item){
			echo <<<RSS
			<h3>{$item->title}</h3>
			<p>
				{$item->description}<br>
				<strong>Категория: {$item->category}</strong>
				<em>Опубликовано: {$item->pubDate}</em>
			</p>
			<p align="left">
				<a href="{$item->link}">Читать дальше...</a>
			</p>
RSS;
			$i++;
			if($i>5) break;
		}
		if(time() > filemtime(FILE_NAME) + RSS_TTL){
			download(RSS_URL, FILE_NAME);
		}
	?>

</body>
</html>