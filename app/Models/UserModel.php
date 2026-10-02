<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'full_name', 'avatar', 'created_at', 'role'];

    protected $validationRules = [
        'username'  => 'required|min_length[3]|is_unique[users.username]',
        'full_name' => 'required|min_length[3]',
        'role'      => 'required'
    ];
}