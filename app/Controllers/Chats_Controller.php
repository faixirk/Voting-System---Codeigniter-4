<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Message_Model;
use App\Models\Logos_Model;
use App\Models\Requests_Model;
use App\Models\Public_Chat_Model;
use CodeIgniter\API\ResponseTrait;



class Chats_Controller extends BaseController
{
	use ResponseTrait;
	public function index()
	{
		if (!session('isLoggedIn')) {
			return redirect()->to('/');
		} else {
			$l = new Logos_Model();
			$data['logo'] = $l->first();
			$data['title'] = "Chats";
			return view('panel/user/chats', $data);
		}
	}
	public function public_chat()
	{


		if (!session()->get('f_name'))
			return redirect()->to('/');

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'message' => 'required'
			];

			if (!$this->validate($rules)) {
				return $this->fail($this->validator->getErrors());
			} else {
				$model = new Public_Chat_Model();

				$msg = [
					'username' => session()->get('f_name'),
					'message' => $this->request->getVar('message'),
				];
				$model->save($msg);
				return $this->respondCreated($msg);
			}
		}
		return view('panel/user/chats');
	}
	public function chat($id)
	{


		if (!session()->get('f_name'))
			return redirect()->to('/');

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'message' => 'required'
			];

			if (!$this->validate($rules)) {
				return $this->fail($this->validator->getErrors());
			} else {
				$model = new Message_Model();
				$requests = new Requests_Model();
				$userID = session('user_id');
				$members = $requests->select('*');
				$members = $requests->where('group_id', $id);
				$members = $requests->where('has_joined', 'true');
				$members = $requests->where('user_id', $userID)->get()->getResult();

				if ($members) {
					$msg = [
						'username' => session()->get('f_name'),
						'message' => $this->request->getVar('message'),
						'group_id' => $id,
						'user_id' => session('user_id')
					];
					$model->save($msg);
					return $this->respondCreated($msg);
				} else {
					return null;
				}
			}
		}
		return view('panel/user/chats');
	}
	public function public_msg()
	{
		$model = new Public_Chat_Model();
		$data = $model->findAll();
		return $this->respond($data);
	}
	public function msg($id)
	{
		$model = new Message_Model();
		$data = $model->select('*');
		$data = $model->where('group_id', $id)->findAll();
		return $this->respond($data);
	}
}
