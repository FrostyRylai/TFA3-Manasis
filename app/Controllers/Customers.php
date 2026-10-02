<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();

        return view('customers_view', $data); 
    }

    public function create()
    {
        return view('customers_create_view');
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email|is_unique[customers.email]',
            'phone'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel->save([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer added successfully!');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $data['customer'] = $customerModel->find($id);

        return view('customers_edit_view', $data);
    }

    public function update($id)
    {
        $customerModel = new CustomerModel();

        $rules = [
            'full_name' => 'required',
            'email'     => "required|valid_email|is_unique[customers.email,id,{$id}]",
            'phone'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated successfully!');
    }
}