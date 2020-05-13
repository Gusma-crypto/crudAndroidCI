<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function addstaff(){
        $name   =$this->input->post('name');
        $hp     =$this->input->post('hp');
        $alamat =$this->input->post('alamat');

        $data['staff_name'] = $name;
        $data['staff_hp'] = $hp;
        $data['staff_alamat'] = $alamat;

        $q = $this->db->insert('tb_staff', $data);
        if($q){
            $res['pesan'] = 'insert data berhasil';
            $res['status']= 200;
        }else{
            $res['pesan'] = 'insert Error';
            $res['status']= 400;
        }
        echo json_encode($res);
    }

    public function getDataStaff(){
        $q = $this->db->get('tb_staff');
        if($q->num_rows() > 0){
            $res['pesan'] = 'Data Ada';
            $res['status']= 200;
            $res['staff'] = $q->row();
            $res['staff'] = $q->result();
        }else{
            $res['pesan'] = 'Data Kosong';
            $res['status']= 400;
        }
        echo json_encode($res);
    }

    public function editStaff(){
        $id     = $this->input->post('id');
        $name   =$this->input->post('name');
        $hp     =$this->input->post('hp');
        $alamat =$this->input->post('alamat');

        
        $data['staff_name'] = $name;
        $data['staff_hp'] = $hp;
        $data['staff_alamat'] = $alamat;

        $this->db->where('staff_id', $id);
        $q = $this->db->update('tb_staff',$id);
        if($q){
            $res['pesan'] = 'Edit data berhasil';
            $res['status']= 200;
        }else{
            $res['pesan'] = 'Edit Error';
            $res['status']= 400;
        }
        echo json_encode($res);
    }

    public function deleteStaff(){
        $id= $this->input->post('id');
        $this->db->where('staff_id',$id);
        $status= $this->db->delete('tb_staff');
        if($status == true){
            $res['pesan'] = 'Hapus data berhasil';
            $res['status']= 200;
        }else{
            $res['pesan'] = 'hapus Error';
            $res['status']= 400;
        }
        echo json_encode($res);
    }
}
