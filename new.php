<?php
	interface Frame {
		public function nama();
	}

	abstract class Tokoh{
		abstract public function potret();
	}

	/**
	 * 
	 */
	class Ayah extends Tokoh implements Frame{
		private $nama;

		public function __construct($nama){
			$this->nama =  $nama;
		}

		public function nama(){
			return $this->nama;
		}

		public function potret(){
			return "Nama Ayah";
		}
	}

	class Ibu extends Tokoh implements Frame{
		private $nama;

		public function __construct($nama){
			$this->nama =  $nama;
		}

		public function nama(){
			return $this->nama;
		}

		public function potret(){
			return "Nama Ibu";
		}
	}

	$ayahAbi = new Ayah('Ali');
	$ibuUmi = new Ibu('Fatimah');

	echo $ayahAbi->potret();
	echo $ayahAbi->nama();
	
	echo $ibuUmi->potret();
	echo $ibuUmi->nama();
	
?>