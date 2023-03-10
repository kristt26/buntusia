<?php
namespace App\Models;

use CodeIgniter\Model;


class Users_Model extends Model {
	
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['username','password', 'role', 'status'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = array('users.id','users.nama','users.role');
    protected $column_search = array('users.nama','users.role');
    protected $order = array('users.id' => 'asc');
    protected $request;
    protected $db;
    protected $dt;


    public function __construct()
    {
       parent::__construct();
       $this->db = db_connect();
       $this->request = \Config\Services::request();
       $this->dt = $this->db->table($this->table);
    }

    private function _get_datatables_query(){
        $i = 0;
        $this->dt->select("users.*,.`pegawai`.`nama`")->join('pegawai', '`users`.`id_pegawai` = `pegawai`.`id`', 'left')->where('users.deleted_at', NULL);
        foreach ($this->column_search as $item){
            if($this->request->getPost('search')['value']){ 
                if($i===0){
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                }
                else{
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if(count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }
         
        if($this->request->getPost('order')){
                $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
            } 
        else if(isset($this->order)){
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    function get_datatables(){
        $this->_get_datatables_query();
        if($this->request->getPost('length') != -1)
        $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    function count_filtered(){
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }

    public function count_all(){
        $tbl_storage = $this->db->table($this->table)->where('deleted_at', NULL);
        return $tbl_storage->countAllResults();
    }

    public function getUser($id)
    {
        $result = $this->db->query("SELECT
            `proyek`.`users`.`id`,
            `proyek`.`users`.`id_pegawai`,
            `proyek`.`users`.`hak_akses`,
            `proyek`.`users`.`id_proyek`,
            `proyek`.`users`.`username`,
            `proyek`.`users`.`password`,
            `proyek`.`users`.`created_at`,
            `proyek`.`users`.`updated_at`,
            `proyek`.`users`.`deleted_at`,
            `proyek`.`pegawai`.`nama`,
            `proyek`.`nama_proyek`
        FROM
            `users`
            LEFT JOIN `pegawai` ON `users`.`id_pegawai` = `pegawai`.`id`
            LEFT JOIN `proyek` ON `proyek`.`id` = `proyek`.`users`.`id_proyek` WHERE `users`.`id` = '$id'")->getRowArray();
        return $result;
    }

    public function check()
    {
        $result = $this->dt->countAllResults();
        if($result==0){
            $this->db->transBegin();
            try {
                $this->dt->insert(['username'=>'Manajer', 'password'=>password_hash('manajer', PASSWORD_DEFAULT), 'role'=>'Manajer']);
                $user_id = $this->db->insertID();
                $this->db->table('pegawais')->insert(['nama'=>'Manajer', 'user_id'=>$user_id]);
                if($this->db->transStatus()){
                    $this->db->transCommit();
                }else{
                    $this->db->transRollback();
                }
            } catch (\Throwable $th) {
                $this->db->transRollback();
                echo $th->getMessage();
            }
        }
    }
}