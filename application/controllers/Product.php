<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('product_model');
	}

	public function index()
	{
		$data['title'] = 'Data Produk';
		$data['products'] = $this->product_model->all();

		$this->load->view('templates/begin', $data);
		$this->load->view('product/index');
		$this->load->view('templates/scrolltop');
		$this->load->view('templates/end');
	}

	public function create()
	{
		$this->form_validation->set_rules(
			'name', 'nama produk',
			array('max_length[128]', 'required', 'trim')
		);
		$this->form_validation->set_rules(
			'quantity', 'jumlah produk',
			array('greater_than_equal_to[0]', 'integer', 'required', 'trim')
		);
		$this->form_validation->set_rules(
			'price', 'harga produk',
			array('regex_match[/^(0|([1-9][0-9]{0,2})(\.\d{3})*?)$/]', 'required', 'trim')
		);

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Tambah Data Produk';

			$this->load->view('templates/begin', $data);
			$this->load->view('product/create');
			$this->load->view('templates/scrolltop');
			$this->load->view('templates/end');
		}
		else
		{
			$this->product_model->create();

			redirect('');
		}
	}

	public function update($id)
	{
		if ( ! $this->product_model->exists($id))
		{
			show_404();

			return;
		}

		$this->form_validation->set_rules(
			'name', 'nama produk',
			array('max_length[128]', 'required', 'trim')
		);
		$this->form_validation->set_rules(
			'quantity', 'jumlah produk',
			array('greater_than_equal_to[0]', 'integer', 'required', 'trim')
		);
		$this->form_validation->set_rules(
			'price', 'harga produk',
			array('regex_match[/^(0|([1-9][0-9]{0,2})(\.\d{3})*?)$/]', 'required', 'trim')
		);

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Ubah Data Produk';
			$data['product'] = $this->product_model->get($id);

			$this->load->view('templates/begin', $data);
			$this->load->view('product/update');
			$this->load->view('templates/scrolltop');
			$this->load->view('templates/end');
		}
		else
		{
			$this->product_model->update($id);

			redirect('');
		}
	}

	public function delete($id)
	{
		if ( ! $this->product_model->exists($id))
		{
			show_404();

			return;
		}

		$this->product_model->delete($id);

		redirect('');
	}
}
