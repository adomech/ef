<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Flickr { 
	
	private $apiKey = '6c0d55bc3b73712ae7839644fb026b09'; 
 
	public function __construct() {
	} 
 
	public function search($query = null) { 
		$search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $this->apiKey . '&text=' . urlencode($query) . '&per_page=1000&format=php_serial'; 
		$result = file_get_contents($search); 
		$result = unserialize($result); 
		return $result; 
	} 

	public function getSize($id = null) { 
		$search = 'http://flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=' . $this->apiKey . '&photo_id=' . urlencode($id).'&format=php_serial'; 
		$result = file_get_contents($search); 
		$result = unserialize($result); 
		return $result; 
	} 

}
