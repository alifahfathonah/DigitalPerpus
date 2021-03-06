<?php
    class Pengembalian extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->library(array('template', 'form_validation'));
            $this->load->model('M_pengembalian');
            if(!$this->session->userdata('username')){
                redirect('web');
            }
        }

        function index(){
            $data['title']="Pengembalian Buku";
            $data['tanggal']=date('Y-m-d');
            $this->template->display('pengembalian/index', $data);
        }

        function cariTransaksi(){
            $no=$this->input->post('no');
            $transaksi=$this->M_pengembalian->cariTransaksi($no);
            if($transaksi->num_rows()>0){
                $transaksi=$transaksi->row_array();
                echo $transaksi['nis']."|".$transaksi['tanggal_pinjam']."|".$transaksi['tanggal_kembali']."|".$transaksi['nama'];
            }
        }

        function tampil(){
            $no = $this->input->get('no');
            $data['buku']=$this->M_pengembalian->tampilBuku($no)->result();
            $transaksi=$this->M_pengembalian->cariTransaksi($no)->row_array();
            $this->load->view('pengembalian/tampilbuku', $data);

        }

        function simpan(){
            $info=array(
                'id_transaksi'=>$this->input->post('no'),
                'tgl_pengembalian'=>date('Y-m-d'),
                'denda'=>$this->input->post('denda'),
                'nominal'=>$this->input->post('nominal')
            );
            //update status peminjaman dari N jadi Y
            $no=$this->input->post('no');
            $update=array(
                'status'=>"Y"
            );
            $this->M_pengembalian->update($no, $update);
            $this->M_pengembalian->simpan($info);
        }

        function cari_by_nis(){
            $nis=$this->input->post('nis');
            $data['pencarian']=$this->M_pengembalian->cari_by_nis($nis)->result();
            $this->load->view('pengembalian/pencarian', $data);
        }
    }