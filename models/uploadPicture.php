<?php
	class uploadPicture{
		public $storename;
		public $fileControl;
		public $destination;
		
		function __construct($storename,$filecontrol,$destination){
			$this->storename = $storename;
			$this->fileControl = $filecontrol;
			$this->destination = $destination;
		}
		
		function upload(){			
			try{				
				$file = $this->fileControl;
				$storename = $this->storename;			
				
				if($this->validExtension($_FILES[$file]['name'])){
					$destination = $this->destination.''.$this->getStoreName();
					
					if (move_uploaded_file($_FILES[$file]['tmp_name'], $destination)){
						return $destination;
					}else{
						return "F:File not uploaded";
					}
				}
			}catch(Exception $e){
				return $e;
			}
		}
		
		function validExtension(){
			try{
				$file = $this->fileControl;
				$fileName = $_FILES[$file]['name'];
				
				if ($this->getExt($fileName)=='.jpg' || $this->getExt($fileName)=='.png' || $this->getExt($fileName)=='.gif' || $this->getExt($fileName)=='.bmp'){
					return TRUE;
				}else{
					return FALSE;
				}
			}catch(Exception $e){
				return $e;
			}
		}
		
		function getExt(){
			$file = $this->fileControl;
			$fileName = $_FILES[$file]['name'];
			return substr($fileName, -4);
		}
		
		function getStoreName(){
			$file = $this->fileControl;
			$fileName = $_FILES[$file]['name'];
			return $this->storename.$this->getExt($fileName);
		}
	}
?>