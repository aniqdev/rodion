<?php

/**
 * 
 */
class SingleFile
{
	public $filename;
	public $path;
	public $datatype;

	function __construct($file_path)
	{
		$pathinfo = pathinfo($file_path);
		$this->filename = $pathinfo['filename'];
		$this->path = 'images/'.$file_path;
		$this->datatype = $pathinfo['extension'];
	}

	public function get_name()
	{
		return $this->filename . '.' .  $this->datatype;
	}

	public function delete()
	{
		unlink(__DIR__.'/'.$this->path);
	}
}



/**
 * 
 */
class Catalog
{
	public $dir_path;
	
	function __construct($dir_path)
	{
		$this->dir_path = $dir_path;
	}

	public function getAllFiles()
	{
		$dir = scandir($this->dir_path);

		$file_array = [];
		for ($i=2; $i < count($dir); $i++){
			$image = new SingleFile($dir[$i]);
			$file_array[] = $image;
		}

		return $file_array;
	}

	public function create_dir()
	{
		@mkdir('images/'.$this->dir_path);
	}

	public function remove_dir()
	{
		@rmdir('images/'.$this->dir_path);
	}
}
