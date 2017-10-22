<?php
	require_once "INewsDB.class.php";

	class NewsDB implements INewsDB {
		const DB_NAME = "../news.db";
		const RSS_NAME = "rss.xml";
		const RSS_TITLE = "Новостная лента";
		const RSS_LINK = "http://localhost/php_3/news/news.php";
		private $_db = NULL;

		function __get($name){
			if($name == "_db"){
				return $this->_db;
			}
			throw new Exception("Unknown property!");
		}

		function __construct(){
			$this->_db = new SQLite3(self::DB_NAME);
			if(is_file(self::DB_NAME) and filesize(self::DB_NAME) == 0){
				try{
					$sql = "CREATE TABLE msgs(id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, category INTEGER, description TEXT, source TEXT, datetime INTEGER)";
					if(!$this->_db->exec($sql)){
						throw new Exception($this->_db->lastErrorMsg());
					}
					$sql = "CREATE TABLE category(id INTEGER, name TEXT)";
					if(!$this->_db->exec($sql)){
						throw new Exception($this->_db->lastErrorMsg());
					}
					$sql = "INSERT INTO category(id, name) SELECT 1 as id, 'Политика' as name UNION SELECT 2 as id, 'Культура' as name UNION SELECT 3 as id, 'Спорт' as name";
					if(!$this->_db->exec($sql)){
						throw new Exception($this->_db->lastErrorMsg());
					}
				}catch(Exception $e){
					echo "Все плохо. Зайдите завтра!";
					//$e->getMessage();
				}
			}
		}

		function __destruct(){
			unset($this->_db);
		}

		function saveNews($title, $category, $description, $source){
			$dt = time();
			$sql = "INSERT INTO msgs(title, category, description, source, datetime) VALUES('$title', $category, '$description', '$source', $dt)";
			$res = $this->_db->exec($sql);
			if(!$res) {
				return false;
			}else {
				$this->createRss();
				return true;
			}
		}

		protected function db2Arr($data){
			$arr = [];
			while($row = $data->fetchArray(SQLITE3_ASSOC)){
				$arr[] = $row;
			}
			return $arr;
		}

		function getNews(){
			$sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime FROM msgs, category WHERE category.id = msgs.category ORDER BY msgs.id DESC";
			$res = $this->_db->query($sql);
			if(!$res){
				return false;
			}
			return $this->db2Arr($res);
		}

		function deleteNews($id){}

		function clearStr($data){
			$data = strip_tags($data);
			return $this->_db->escapeString($data);
		}

		function clearInt($data){
			return abs((int)$data);
		}

		private function createRss(){
			$dom = new DomDocument("1.0", "utf-8");
			$dom->formatOutput = true;
			$dom->preserveWhiteSpace = false;

			$rss = $dom->createElement("rss");
			$dom->appendChild($rss);

			$version = $dom->createAttribute("version");
			$version->value = '2.0';
			$rss->appendChild($version);

			$channel = $dom->createElement("channel");
			$rss->appendChild($channel);

			$title = $dom->createElement("title", self::RSS_TITLE);
			$link = $dom->createElement("link", self::RSS_LINK);
			$channel->appendChild($title);
			$channel->appendChild($link);

			$lenta = $this->getNews();
			if(!$lenta) return false;

			foreach($lenta as $news){
				$item = $dom->createElement("item");
				$data_attribut = $dom->createAttribute("data-attribut");
				$data_attribut->value = "data-attribut-value";
				$item->appendChild($data_attribut);

				$title = $dom->createElement("title", $news["title"]);
				$link = $dom->createElement("link", "#");
				$desc = $dom->createElement("description");
				$cdata = $dom->createCDATASection($news["description"]);
				$desc->appendChild($cdata);
				$dt = date("r", $news["datetime"]);
				$pubDate = $dom->createElement("pubDate", $dt);
				$category = $dom->createElement("category", $news["category"]);

				$item->appendChild($title);
				$item->appendChild($link);
				$item->appendChild($desc);
				$item->appendChild($pubDate);
				$item->appendChild($category);

				$channel->appendChild($item);
			}
			$dom->save(self::RSS_NAME);
		}
	}