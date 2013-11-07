<?php

	class umfrage {
		
		private $_filepath;
		
		public function umfrage($filepath){
			$this->_filepath = $filepath;
		}
		
		public function wUmfrageRecord($data){
			$file_handler = fopen($this->_filepath, 'a') or die("can't open file");
			fwrite($file_handler, "\n" . $data);
			fclose($file_handler);
		}
		
		public function rUmfragen(){
			$data = array();
			$firstLine = true;
			$txt_file = file_get_contents($this->_filepath) or die("can't open file"); //Liest den Inhalt in die variabel
			$umfragefile = explode("\n", $txt_file); //Gibt ein Array mit jeder einzelnen Zeile zurück

			foreach($umfragefile as $line) {

				if($firstLine) { $firstLine = false; continue; }

				$row = explode('|', $line);

				$data[] = array(
				'id' => (int)$row[0],
				'titel' => $row[1],
				'beschreibung' => $row[2],
				'fragen' => explode(',', $row[3])
				);
			}

			return $data;
		}
		
		public function getUmfragen(){
		
			print_r($_POST);
			
			$data = array();
			
			$txt_file = file_get_contents("umfragen/u1.txt") or die("can't open file");
			
			$umfragefile = explode("\n", $txt_file);
			
			$fragen_count = 0;
			
			echo '<form action="index.php" method="post">';
			
			foreach($umfragefile as $line) {
				//$line = nl2br($line);
				$line = htmlentities($line);
				$type = substr($line, 0, 2);
			
				switch($type) {
					case "H;":
						echo "<h1>" . substr($line, 2) . "</h1>";
						break;
							
					case "D;":
						echo "<h3>" . substr($line, 2) . "</h3>";
						break;
							
					case "C;":
						echo "<h4>" . substr($line, 2) . "</h4>";
						break;
							
					case "Q;":
						echo substr($line, 2);
						echo "<input style=\"display:none;\" checked=\"checked\" type=\"radio\" name=\"f$fragen_count\" value=\"0\"> <input type=\"radio\" name=\"f$fragen_count\" value=\"1\"> 0% <input type=\"radio\" name=\"f$fragen_count\" value=\"2\"> 25% <input type=\"radio\" name=\"f$fragen_count\" value=\"3\"> 75% <input type=\"radio\" name=\"f$fragen_count\" value=\"4\"> 100% <br />";
						$fragen_count++;
						break;
							
					case "T;":
						echo substr($line, 2);
						break;
							
					default;
					break;
				}
			
			}
			
			echo '<input type="submit" value="Absenden"></form>';
		}
		
		
		public function getUmfragen($dir = 'umfragen'){
			$umfragen = array();
			if($handle = opendir($dir)){
				while (false !== ($file = readdir($handle))) {
					if(substr($file, 0, 1) == 'u'){
						array_push($umfragen, $file);
					}
				}
			}
			return $umfragen;
		}
		
	
	}

?>