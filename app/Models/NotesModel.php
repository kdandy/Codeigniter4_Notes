<?php

namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'tb_notes';
    protected $useTimeStamps = true;
    protected $allowedFields = ['title', 'body', 'owner'];


    public function getNotes($id = false, $username)
    {
        if ($username) {
            if ($id === false) {
                return $this->where(['owner' => $username])->findAll();
            }

            return $this->where(['id' => $id, 'owner' => $username])->first();
        }
    }
}
