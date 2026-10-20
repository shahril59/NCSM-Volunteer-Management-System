<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; //make sure import all models that have migrated

class CustomerController extends Controller
{
    // Show the form
    public function addnewcustomerfunctionform() //just to display addnewcustomerform
    {
        return view('customer.addnewcustomer');
    }


    // Store the new customer
    public function postnewcustomer(Request $request)
    {
        $request->validate([ //validation process, all must be fill except custphonenum
            'custmykad' => 'required|max:12|unique:customers',
            'custname' => 'required',
            //$table->string('custphonenum')->nullable(); - not set as required because it is nullable
            'custaddress' => 'required',
            'custpostcode' => 'required',
            'custstate' => 'required',


        ]);

        Customer::create($request->all());
        //in ORM we used create, in sql it is equal to INSERT INTO Customer values('')

        return redirect()->route('viewcustomer')->with('success',
        'Customer added successfully!');
    }

    // Show all customers with search and filter function
    public function viewcustomer(Request $request)
    {
        $query = Customer::query();

        // Search by MyKad only
        if ($request->filled('search')) {
        $query->where('custmykad', 'like', '%' . $request->input('search') . '%');
        }

        // Filter by state
        if ($request->filled('custstate')) {
        $query->where('custstate', $request->input('custstate'));
        }

        // Get results
        $customers = $query->get();

        return view('customer.viewcustomer', compact('customers'));

        //display all data from table Customer
        $customers = Customer::all();

        return view('customer.viewcustomer', compact('customers'));
        //view file viewcustomer.blade.php in customer folder
    }


    // Show the edit form for a specific customer
    public function editcustomer($custmykad)
    {
    // Find the customer by primary key (custmykad)
        $customer = Customer::findOrFail($custmykad);
        return view('customer.updatecustomer', compact('customer'));
    }





    // Update the customer record in the database
    public function updatecustomer(Request $request, $custmykad)
    {
        $request->validate([
            'custname' => 'required',
            'custphonenum' => 'nullable',
            'custaddress' => 'required',
            'custpostcode' => 'required',
            'custstate' => 'required',
        ]);

        $customer = Customer::findOrFail($custmykad);
        $customer->update($request->all());

        return redirect()->route('viewcustomer')->with('success',
        "Customer data for mykad holder :  {$customer->custmykad} has been updated successfully!");
        }


    // Show confirmation page for deleting a customer
    public function deletecustomerconfirm($custmykad)
    {   //set variable customer to read data from table Customer with PK custmykad
        $customer = Customer::findOrFail($custmykad);
        //display deletecustomer.blade.php from folder customer
        return view('customer.deletecustomer', compact('customer'));
        //compact is used to mapped variable into frontend- .blade.php file

    }

    // Handle the actual deletion after user click button CONFIRM DELETE
    public function deletecustomer($custmykad)
    {   //set variable customer to read data from table Customer with PK custmykad
        $customer = Customer::findOrFail($custmykad);
        $customer->delete(); //method delete

        //route according to path name for viewcustomer
        return redirect()->route('viewcustomer')->with('success',
        'Customer deleted successfully!');
    }



}
