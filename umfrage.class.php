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

				$row = explode('¢', $line);

				$data[] = array(
				'id' => (int)$row[0],
				'titel' => $row[1],
				'beschreibung' => $row[2],
				'fragen' => explode(',', $row[3])
				);
			}

			return $data;
		}
	
	}

?>