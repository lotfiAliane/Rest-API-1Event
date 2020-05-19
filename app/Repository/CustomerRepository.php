<?php

namespace App\Repository;

use App\customer;

class CustomerRepository{


    public function getCustomers()
    {
        return customer::orderBy('name')
        ->where('active',1)
        ->with('user')
        ->get()
        ->map(function ($customer){
           return $customer->format();

        });
    }
    public function findById($id){

        return customer::where('id',$id)
                        ->with('user')
                        ->get()
                        ->map(function ($customer){
                            return $customer->format();
                        });
    }
    public function update($id)
    {
        $customer= customer::find($id);
        $customer->name=request()->name;
        $customer->update();
    }


}