<?php

/**
 * 
 */
class Home extends CI_Controller
{

	public function index()
	{
		$data['produk'] = $this->M_produk->tampil();
		$this->load->model('M_produk');
		$this->load->view('index', $data);
	}
}
