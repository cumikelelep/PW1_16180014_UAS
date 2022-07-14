<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masterBarangModel extends CI_Model
{
    private $table = 'master_barang';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'id',
                'label' => 'ID',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'qty',
                'label' => 'Quantity',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'trim|required'
            ],
           
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $price = preg_replace('[\D]', '', $this->input->post('price'));
        $data = array(
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "qty" => $this->input->post('qty'),
            "price" => $price,
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "qty" => $this->input->post('qty'),
            "price" => $this->input->post('price')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('old_id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}