<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Barang';
        $data['barang'] = $this->Barang_model->getAllData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');

        if($this->form_validation->run() == false){
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Barang';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama')),
                'harga' => htmlspecialchars($this->input->post('harga')),
                'stok' => htmlspecialchars($this->input->post('stok')),
                'gambar' => 'default_barang.jpg',
            ];

            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Berhasil tambah barang.</div>');
            redirect('barang');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');

        if($this->form_validation->run() == false){
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Barang';
            $data['barang'] = $this->Barang_model->getData($id);
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/edit', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama')),
                'harga' => htmlspecialchars($this->input->post('harga')),
                'stok' => htmlspecialchars($this->input->post('stok')),
                'gambar' => 'default_barang.jpg',
            ];

            $this->db->where('id', $id);
            $this->db->update('barang', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Berhasil ubah barang.</div>');
            redirect('barang');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Berhasil hapus barang.</div>');
        redirect('barang');
    }
}