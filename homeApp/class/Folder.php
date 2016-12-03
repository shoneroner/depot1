<?php

class Folder {

	public static function getProjects($directory)
	{
		
		$admin_folders = array('..', '.','phpmyadmin', 'homeApp');
		$items = array_diff(scandir($directory), $admin_folders);

		foreach ($items as $index => $value) {
			if(is_dir($value)) {
				$cleans_items['dirs'][$index]['name'] = $value;
				$cleans_items['dirs'][$index]['date'] = date("d M Y H:i:s.", filemtime($value));
				$cleans_items['dirs'][$index]['weight'] = disk_total_space($directory.'/'.$value);
			} else {
				$cleans_items['files'][$index]['name'] = $value;
				$cleans_items['files'][$index]['date'] = date("d M Y H:i:s.", filemtime($value));
				$cleans_items['files'][$index]['weight'] = disk_total_space($directory.'/'.$value);
			}
		}

		return $cleans_items;
	}

}

