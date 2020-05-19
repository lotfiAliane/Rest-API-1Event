<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use App\Repository\CustomerRepository;

class customerController extends Controller
{
    private $cm;
    public function __construct(CustomerRepository $cm)
    {
        $this->cm=$cm;
    }
    public function index()
    {
        return $this->cm->getCustomers();
    }
    public function show($id)
    {   
        //return redirect()->route('customers.index');
        return $this->cm->findById($id);
    }
    public function update(Request $request,$id)
    {
       $this->cm->update($id);
       return redirect()->route('customers.show',$id);
    }
}
