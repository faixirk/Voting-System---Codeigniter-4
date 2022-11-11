<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Message_Model;
use CodeIgniter\API\ResponseTrait;



class Chats_Controller extends BaseController{
	use ResponseTrait;
    public function index(){
        $data['title'] = "Chats";
        return view('panel/user/chats', $data);

    }
    
    public function chat()
	{
		

		if(!session()->get('f_name'))
			return redirect()->to('/');
			
		if($this->request->getMethod() == 'post')
		{
			$rules = [
				'message' => 'required'
			];

			if(!$this->validate($rules)){
				return $this->fail($this->validator->getErrors());
			}else{
				$model = new Message_Model();
				$msg = [
					'username' => session()->get('f_name'),
					'message' => $this->request->getVar('message')
				];
				$model->save($msg);
				return $this->respondCreated($msg);
			}

		}
		return view('panel/user/chats');
	}

	public function msg()
	{
		$model = new Message_Model();
		$data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);

	}
}