<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController 
{
    public function viewCustomers() 
    {
        $customerModel = new CustomerModel();
        $getcustomers   = $customerModel->findAll();

        $data = [
            'success' => true,
            'data' => $getcustomers,
            'message' => "customer Added Successfully"
        ];
        return view('customers', $data);
    }

    public function addCustomer()
    {
        return view('addCustomer');
    }

    public function insertCustomer()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'name' => 'required|min_length[3]',
            'mobileNo' => 'required|numeric|max_length[10]',
            'email' => 'required|valid_email',
            'status' => 'required'
        ]);
        $customerModel = new CustomerModel();

        if (!$input) {
            echo view('addCustomer', [
                'validation' => $this->validator
            ]);
        } else {
            $customerModel->save([
                'name' => $this->request->getVar('name'),
                'mobile'  => $this->request->getVar('mobileNo'),
                'email'  => $this->request->getVar('email'),
                'status'  => $this->request->getVar('status'),
            ]);
            return redirect()->to(base_url('customers'))->with('status', 'Customer Insert Successfully');
        }

    }

    public function editCustomer($id = 0)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        $data['customer'] = $customer;
        return view('editCustomer', $data);
    }

    public function updateCustomer($id = 0)
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'mobileNo' => 'required|numeric|max_length[10]',
            'status' => 'required'
        ]);
        $customerModel = new CustomerModel();

        if (!$input) {
            echo view('addCustomer', [
                'validation' => $this->validator
            ]);
        } else {
            $updateData = [
                'mobile'  => $this->request->getVar('mobileNo'),
                'status'  => $this->request->getVar('status'),
            ];

            $customerModel->update($id, $updateData);
            return redirect()->to(base_url('customers'))->with('status', 'Customer Updated Successfully');
        }
    }

    public function deleteCustomer($id)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id);

        return redirect()->to(base_url('customers'))->with('status', 'Customer Delete Successfully');
    }

    public function activeCustomer()
    {
        $customerModel = new CustomerModel();
        $getActivecustomer = $customerModel->where('status', '1')->findAll();
        // print_r($getActivecustomer);

        $data = [
            'success' => true,
            'data' => $getActivecustomer,
            'message' => "All Active customers"
        ];
        print_r($data);
    }
}
?>