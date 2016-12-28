<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$getData = $this->db->query("SELECT * FROM user");
		$resData = $getData->result();
		$data['users'] = $resData;

		$data['id'] = sha1(time());

		$this->load->view('welcome_message',$data);
	}

	/* FUNCTION TO GENERATE USER DATA */
	public function userlist()
	{
		$getData = $this->db->query("SELECT * FROM user ORDER BY nama DESC");
		$resData = $getData->result();
		$data = array('data' => $resData);
		echo json_encode($data);
	}


	/* FUNCTION TO SAVE USER DATA */
	public function saveuser()
	{
		$post = $this->input->post();

		$data = array(
			'uuid' => $post['uuid'],
			'nama' => $post['nama'],
			'alamat' => $post['alamat']
		);

		$cek_user = $this->db->query("SELECT * FROM user WHERE nama='".$post['nama']."'");
		if($cek_user->num_rows() > 0)
		{
			$resp = array(
				'response' => 'no',
				'message' => 'User already Exist!',
				'data' => $data
			);
			echo json_encode($resp);
		} else {
			$query = $this->db->insert('user',$data);
			$resp = array(
				'response' => 'ok',
				'message' => 'User Added Successfully!',
				'data' => $data
			);
			if($query)
			{
				echo json_encode($resp);
			}
		}
	}
}
