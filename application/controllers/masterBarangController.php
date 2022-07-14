<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masterBarangController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("masterBarangModel");
    }


    public function index()
    {

        $data["title"] = "List Data Barang";
        $data["data_masterBarang"] = $this->masterBarangModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('masterBarang/index', $data);
        $this->load->view('templates/footer');
    }


    public function add()
    {
        $masterBarang = $this->masterBarangModel;
        $validation = $masterBarang->form_validation;
        $validation->set_rules($masterBarang->rules());

        if ($validation->run()) {
            $masterBarang->save();
            echo 'Sukses Tambah Master Barang';
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $masterBarang = $this->masterBarangModel;
        $haha = $masterBarang->getById($id);
        echo json_encode($haha);
    }

    public function update()
    {
        
        $masterBarang = $this->masterBarangModel;
        $validation = $this->form_validation;
        $validation->set_rules($masterBarang->rules());

        if ($validation->run()) {
            $masterBarang->update();
          echo 'Sukses Edit Master Barang';
        }
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->masterBarangModel->delete($id);
        echo 'Sukses Delete Master Barang';
    }

    public function getAjax()
    {

        $master_barang = $this->masterBarangModel->getAll();
        
        echo json_encode($master_barang);
    }
}