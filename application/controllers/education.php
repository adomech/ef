<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Education extends CI_Controller {

	
	public function index()
	{
		
		$this->load->library('flickr');
		
		$data = $this->flickr->search('education'); 
		
		$save=array();
		$i=0;

		foreach($data['photos']['photo'] as $photo) { 
		
			$save[$i]["owner"]=$photo["owner"];
			$save[$i]["title"]=$photo["title"];
			
			//echo "<br><br><br>";
			//echo $photo["id"]."<br>";
			//echo $photo["owner"]."<br>";
			//echo $photo["title"]."<br>";

			$info= $this->flickr->getSize($photo["id"]);

			
				foreach($info['sizes']['size'] as $sizes) { 
					
					$save[$i]["url"]= $sizes["source"];
					$save[$i]["width"]= $sizes["width"];
					$save[$i]["height"]= $sizes["height"];

			//		echo $sizes["source"]."<br>";
			//		echo $sizes["width"]."<br>";
			//		echo $sizes["height"]."<br>";
					break;
				}
			$i++;	
		}
		$this->load->database();
		$this->db->empty_table('images'); 
		foreach($save as $inserts) { 
			$this->db->insert('images', $inserts); 
		}

		
	}
	public function home()
	{
		$this->load->helper('url');
		if ($this->uri->segment(3) === FALSE)
		{
   
			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/education/home/';
			$config['total_rows'] = $this->_getAllRows();
			$config['per_page'] = 10; 
			$data=array();

			$data["images"]= $this->getAllPagination(0);
			$this->pagination->initialize($config); 

			$this->load->view('education/home',$data);
			
			

		}else{

			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/education/home/';
			$config['total_rows'] = $this->_getAllRows();
			$config['per_page'] = 10; 
			$this->pagination->initialize($config); 

			$data["images"]= $this->getAllPagination($this->uri->segment(3));
			$total="";

			foreach ($data["images"] as $values) {
				$total.="<li><img src='".$values->url."'/ width='".$values->width."' height='".$values->height."' ></li>";
			}

			echo json_encode(array(
			       'results' => $total,
			       'pagination' => $this->pagination->create_links()
			 ));
			//$this->load->view('education/images',$data);
		}
		
	}
	public function search(){

		
			$data= $this->getSearch($this->input->post('search'));
			$total="";

			foreach ($data as $values) {
				$total.="<li><img src='".$values->url."'/ width='".$values->width."' height='".$values->height."' ></li>";
			}
			
			echo json_encode(array(
			       'results' => $total
			
			 ));

	}
	public function getSearch($value=FALSE)
	{
		
		$this->load->database();
		$this->db->select('*');
		$this->db->from('images');
		$this->db->like('title', $value);
		$this->db->or_like('owner', $value); 
		$query = $this->db->get();
		return $query->result();
		
	}

	public function getAllPagination($offset=FALSE)
	{
		if ($offset === FALSE)
		{
		    $offset=0;
		}
		else
		{
		    $offset = $offset;
		}
		
		$limit=10;
		$this->load->database();
		$query = $this->db->get('images', 10, $offset);
		return $query->result();
	}

	public function _getAllRows()
	{
		
		$this->load->database();
		$this->db->from('images');
		return $this->db->count_all_results();
		
	}
}

/* End of file education.php */
/* Location: ./application/controllers/education.php */