<?php

class Folder {

	var $id;

	public function __construct()
	{
		$this->id = $id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId($id)
	{
		return $this->id;
	}

	public static function getProjects($directory)
	{
		
		$items = array_diff(scandir($directory), _HIDDEN_FOLDERS_);

		foreach ($items as $index => $value) {

			if(is_dir($value)) {
				
				$items['dirs'][$index]['name'] 	= $value;
				$items['dirs'][$index]['date'] 	= date("d M Y H:i:s", filemtime($value));
				$items['dirs'][$index]['weight'] = Tools::convertOctets(Tools::GetSize(realpath($value)));

			}

		}

		return $items;
	}
}

