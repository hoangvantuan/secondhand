<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Product Controller
*/

class Cproduct extends CI_Controller
{
	public $callFunction;
	public function index(){
		$callFunction = new IndexMng($this);
		$callFunction->excute();
	}

	public function edit(){
		$callFunction = new EditMng($this);
		$callFunction->excute();
	}

	public function delete(){
		$callFunction = new DeleteMng($this);
		$callFunction->excute();
	}

	public function details(){
		$callFunction = new DetailsMng($this);
		$callFunction->excute();
	}
	public function insert(){
		$callFunction = new InsertMng($this);
		$callFunction->excute();
	}

}

/**
*	Interface
*/
interface CallFunction{
 public function excute();
}

/**
*	Index Manager
*/
class IndexMng implements  CallFunction{
	public $that;
	function IndexMng($that){
		$this->that = $that;
	}
	public function excute(){

			// Check is user ?
			if(!$this->that->session->userdata('user'))
			redirect(base_url());

			// Get data of current user
			$username = $this->that->session->userdata('user');
			$user_id = $this->that->muser->findId($username);
			$data['product'] = $this->that->mproduct->findAllById($user_id);
			foreach ($data as $key) {
				foreach ($key as $value) {
					$category = $this->that->mcategory->find($value->category_id);
					$value->category = $category;
				}
			}

			// Load view
			$this->that->load->view('product/list', $data);
	}
}

/**
*	Edit Image
*/
class EditMng implements CallFunction{
		public $that;
		function EditMng($that){
			$this->that = $that;
		}
		public function excute(){

			//Getdata
			$data['product'] = $this->that->mproduct->find($this->that->input->get('id'));
			$data['category'] = $this->that->mcategory->findAll();
			// Config path image
			$old_path_name = APPPATH.'../assets/uploads/';

			// Submit was click
			if($this->that->input->post('name')){


			// Init product to update
			$product = array('name'=>$this->that->input->post('name'),'price'=>$this->that->input->post('price'),'category_id'=>$this->that->input->post('category'),'description'=>$this->that->input->post('description'));


			// Instant process image
			$imageProcess = new ImageProcess($this->that);

			// Instant config image
			$myConfig = new MyConfig;
			// Upload
			$imageProcess->setConfig($myConfig->getConfigUpload());

			// If upload error
			if (!$imageProcess->upload->upload(new uploadUserLib())){
				$error = $imageProcess->upload->getError();
			}
			else{
				// Get image that uploaded
			    $image_data = $imageProcess->upload->getImage();


			    // Resize image
		 		$imageProcess->setConfig($myConfig->getConfigResize());
	      		$imageProcess->resize->resize(new resizeUserLib());

	      		// Rename image
	      		$rename = new Rename($image_data, $old_path_name,new getNameByTime());
	      		$rename->excute();
	        	// Add link image to upload
	        	$product['image'] = 'assets/uploads/'.$rename->new_name->new_name;

		}
			// Upload
			$this->that->mproduct->update($this->that->input->get('id'),$product);
			redirect('cproduct');
		}
		else
			$this->that->load->view('product/edit', $data, FALSE);
		}
}

/**
* Image Process
*/
class ImageProcess
{
	private $config;
	public $that;
	public $upload;
	public $resize;
	function ImageProcess($that){
		$this->that = $that;
		$this->upload = new UploadProcess($this);
		$this->resize = new ResizeImage($this);
	}
	public function getConfig(){
		return $this->config;
	}
	public function setConfig($config){
		$this->config = $config;
	}

}

/**
*	Upload image
*/
interface Upload {
    public function upload($imageProcess);
}
interface Resize {
    public function resize($imageProcess);
}

class uploadUserLib implements Upload{
    public function upload($imageProcess){
        $imageProcess->that->upload->initialize($imageProcess->getConfig());
        $excute = $imageProcess->that->upload->do_upload('uploadImage');
        // var_dump($imageProcess->that->upload->data());

        return $excute;
    }
}
class resizeUserLib implements Resize{
    public function resize($imageProcess){
        $imageProcess->that->load->library("image_lib",$imageProcess->getConfig());
        $imageProcess->that->image_lib->resize();
    }
}

class UploadProcess
{
	private $imageProcess;

	function UploadProcess($imageProcess){
		$this->imageProcess = $imageProcess;
	}

	public function upload($upload){
        return $upload->upload($this->imageProcess);
	}
	public function getError(){
		return $this->imageProcess->that->upload->display_errors();
	}
	public function getImage(){
		return $this->imageProcess->that->upload->data();
	}
}
/**
*	Resize image
*/
class ResizeImage
{
	private $imageProcess;

	function ResizeImage($imageProcess){
		$this->imageProcess = $imageProcess;
	}

	public function resize($resize){
        $resize->resize($this->imageProcess);

	}
	public function getConfig(){
		$config = $this->imageProcess->getConfig();
		$image_data = $this->imageProcess->upload->getImage();
		$config['source_image'] = $image_data['full_path'];
		return $config;

	}
}

interface MyName{
    public  function getNewName($ext);
}
/**
*	Rename file
*/
class getNameByTime implements MyName{
     // Implements method getNewName
    public $new_name;
    public function getNewName($ext){
        $this->new_name = time().$ext;
        return $this->new_name;
    }
}
class Rename
{
	public $image_data;
	public $path;
	public $new_name;
	function Rename($image_data,$path,$getNewName){
		$this->image_data = $image_data;
		$this->path = $path;
		$this->new_name= $getNewName;
	}

	public function oldPathName(){
		return $this->path.$this->image_data['orig_name'];
	}

	public function newPathName(){
		  return  $this->path.$this->new_name->getNewName($this->image_data['file_ext']);
	}

	public function excute(){
		rename($this->oldPathName(), $this->newPathName());
	}
}


/**
* Delete Manager
*/
class DeleteMng implements CallFunction
{
	public $that;
	function __construct($that)
	{
		$this->that = $that;
	}

	public function excute(){
		$this->that->mproduct->delete($this->getIdDelete());
		redirect('cproduct');
	}
	public function getIdDelete(){
		return $this->that->input->get('id');
	}
}

/**
* Insert Manager
*/
class InsertMng implements CallFunction
{
	public $that;
	function __construct($that)
	{
		$this->that = $that;
	}

	public function excute(){

		// Init Data
		$data['category'] = $this->that->mcategory->findAll();
		$data['error'] = '';

		// Config path image
		$old_path_name = APPPATH.'../assets/uploads/';

		// Submit was click
		if($this->that->input->post('name')){
			// Init image process
			$imageProcess = new ImageProcess($this->that);

			// Init image Config
			$myConfig = new MyConfig();

			// Get data product
			$data['product'] = $this->getDataProduct();

			$imageProcess->setConfig($myConfig->getConfigUpload());
			if(!$imageProcess->upload->upload(new uploadUserLib())){
				$data['error'] = $imageProcess->getError();
			}
			else{
				// Get image that uploaded
			    $image_data = $imageProcess->upload->getImage();

			    // Resize image
		 		$imageProcess->setConfig($myConfig->getConfigResize());
	      		$imageProcess->resize->resize(new resizeUserLib());

	      		// Rename image
	      		$rename = new Rename($image_data, $old_path_name,new getNameByTime());
	      		$rename->excute();
	        	// Add link image to upload
	        	$data['product']['image'] = 'assets/uploads/'.$rename->new_name->new_name;
                echo $data['product']['image'];
			}

			$this->that->mproduct->insert($data['product']);
			redirect('cproduct');

		}

		// Submit wasn't click
		else{
			$this->that->load->view('product/insert',$data);
		}


	}
	// Get data Product was post
	public function getDataProduct(){

		$user_id = $this->that->muser->findId($this->that->session->userdata('user'));
		$product = array('user_id'=>$user_id,'status'=>'Ready','name'=>$this->that->input->post('name'),'price'=>$this->that->input->post('price'),'category_id'=>$this->that->input->post('category'),'description'=>$this->that->input->post('description'),'image'=>'assets/image/common/imgnotfound.jpg');
		return $product;
	}
}
/**
*
*/
class DetailsMng
{
	private $that;
	function __construct($that)
	{
		# code...
		$this->that = $that;
	}

	public function excute(){

			$data = $this->getDataProduct();
			$this->that->load->view('product/details',$data);
	}

	public function getDataProduct(){
		$data['product'] = $this->that->mproduct->find($this->that->input->get('id'));
		$data['user'] = $this->that->muser->find($data['product']->user_id);
		$category = $this->that->mcategory->find($data['product']->category_id);
		$data['product']->category_name = $category->name;
		$data['category_name'] = $category->name;

		return $data;
	}
}

/**
*
*/
class MyConfig
{
	private $configUpload;
	private $configResize;
	function MyConfig()
	{
			$this->configUpload['upload_path'] = APPPATH.'../assets/uploads/';
			$this->configUpload['allowed_types'] = 'gif|jpg|png';
			$this->configUpload['max_size']  = '99999';
			$this->configUpload['max_width']  = '1024';
			$this->configUpload['max_height']  = '768';

			// Config to resize
		 		$this->configResize = array(
	                        "new_image" =>  APPPATH.'../assets/uploads/' . "/thumbs",
	                        "maintain_ration" => true,
	                        "width" => '440',
	                        "height" => "440");
	}
	function getConfigUpload(){
		return $this->configUpload;
	}

	function getConfigResize(){
		return $this->configResize;
	}
	function setConfigUpload($config){
		$this->configUpload = $config;
	}
	function setConfigResize($config){
		$this->configSize = $config;
	}
}

/**
*
*/
/* End of file product.php */
/* Location: ./application/controllers/product.php */
