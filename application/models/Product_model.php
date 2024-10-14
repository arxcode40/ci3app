<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	protected $table = 'products';
	protected $label = 'produk';

	public function all()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function exists($id)
	{
		$this->db->where('id', $id);
		$this->db->limit(1);

		return (bool) $this->db->get($this->table)->num_rows();
	}

	public function get($id)
	{
		$this->db->where('id', $id);
		$this->db->limit(1);

		return $this->db->get($this->table)->row_array();
	}

	public function create()
	{
		$product = array(
			'name' => $this->input->post('name'),
			'quantity' => $this->input->post('quantity'),
			'price' => (int) preg_replace('/\.+/', '', $this->input->post('price')),
			'created_at' => mdate('%Y-%m-%d %H:%i:%s'),
			'updated_at' => mdate('%Y-%m-%d %H:%i:%s')
		);

		$this->db->trans_start();
		$this->db->set($product);
		$this->db->insert($this->table);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$this->session->set_flashdata(
				'alert',
				array(
					'icon' => 'x',
					'status' => 'danger',
					'text' => "Data $this->label gagal ditambahkan"
				)
			);
		}
		else
		{
			$this->session->set_flashdata(
				'alert',
				array(
					'icon' => 'check',
					'status' => 'success',
					'text' => "Data $this->label berhasil ditambahkan"
				)
			);
		}
	}

	public function update($id)
	{
		$product = array(
			'name' => $this->input->post('name'),
			'quantity' => $this->input->post('quantity'),
			'price' => (int) preg_replace('/\.+/', '', $this->input->post('price')),
			'updated_at' => mdate('%Y-%m-%d %H:%i:%s')
		);

		$this->db->trans_start();
		$this->db->set($product);
		$this->db->where('id', $id);
		$this->db->update($this->table);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$this->session->set_flashdata(
				'alert',
				array(
					'icon' => 'x',
					'status' => 'danger',
					'text' => "Data $this->label gagal diubah"
				)
			);
		}
		else
		{
			$this->session->set_flashdata(
				'alert',
				array(
					'icon' => 'check',
					'status' => 'success',
					'text' => "Data $this->label berhasil diubah"
				)
			);
		}

		$this->db->reset_query();
	}

	public function delete($id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$this->session->set_flashdata(
				'alert',
				array(
					'icon' => 'x',
					'status' => 'danger',
					'text' => "Data $this->label gagal dihapus"
				)
			);
		}
		else
		{
			$this->session->set_flashdata(
				'alert',
				array(
					'icon' => 'check',
					'status' => 'success',
					'text' => "Data $this->label berhasil dihapus"
				)
			);
		}

		$this->db->reset_query();
	}
}
