<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('users_view', $data);
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('users_edit_view', $data); 
    }

    public function update($id) 
    {
        $userModel = new UserModel();

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]", 
            'full_name' => 'required',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        // Handle File Upload
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['avatar'] = $newName;
        }

        $userModel->update($id, $data);
        return redirect()->to('/users')->with('success', 'User updated successfully!');
    }

    public function create()
    {
        return view('user_create_view');
    }

    public function store()
    {
        $userModel = new UserModel();

        $rules = [
            'username'  => 'required|min_length[3]|is_unique[users.username]',
            'full_name' => 'required|min_length[3]',
            'role'      => 'required',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'role'       => $this->request->getPost('role'),
            'created_at' => date('Y-m-d H:i:s') // <--- Ensures timestamp is sent
        ];

        // Handle File Upload
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['avatar'] = $newName;
        }

        $userModel->insert($data);
        return redirect()->to('/users')->with('success', 'User added successfully!');
    }
}