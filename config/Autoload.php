<?php
class Autoload
{
	private static $_instance= null;
	public static function charger(){
		if(null!=self::$_instance){
			throw new RuntimeException(sprintf('%s is already started',_CLASS_));}
		self::$_instance = new self();
		if(!spl_autoload_register(array(self::$_instance,'autoload'),false)){
			throw RuntimeException(sprintf('%s : Could not start the autload',_CLASS_));}
	}
	private static function _autoload($class){
		global $rep;
		$filename = $class.'.php';
		$dir=array('modeles/','./','config/','controleur/','vue/','dal/');
		foreach($dir as $d){
			$file=$rep.$d.$filename;
			if(file_exists($file)){
				include $file;
			}
		}
	}
}
