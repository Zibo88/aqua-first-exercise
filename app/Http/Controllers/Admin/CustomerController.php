<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $request_info = $request->all();
	    $show_deleted_message = isset( $request_info['deleted']) ? $request_info['deleted'] : null;
        $customers = Customer::all();
        $customers = Customer::orderBy('meet_date' , 'asc')->get();
       
        // foreach($customers as $customer){
        //     $meet_date = $customer->meet_date;
        //     $date =  $this->getLicenseExpireAttribute($customer->meet_date);
        // }

        $data = [
            'customers' => $customers,
            'show_deleted_message'=> $show_deleted_message,
            // 'meet_date' => $meet_date,
        ];
        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());

        $form_data_create = $request->all();
      
        $customer_to_create = new Customer();

        $customer_to_create->name =  $form_data_create['name'];
        $customer_to_create->lastname =  $form_data_create['lastname'];
        $customer_to_create->email =  $form_data_create['email'];
        $customer_to_create->date_of_birth =  $form_data_create['date_of_birth'];
        $customer_to_create->pratica_n° =  $form_data_create['pratica_n°'];
        $customer_to_create->descrizione =  $form_data_create['descrizione'];
        $customer_to_create->meet_date =  $form_data_create['meet_date'];

        $customer_to_create->save();

        return redirect()->route('admin.customers.show' , ['customer' => $customer_to_create->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pratica_singola = Customer::FindOrFail($id);
        
        $date_of_birth =  $this->getLicenseExpireAttribute($pratica_singola['date_of_birth']);
        $meet_date =  $this->getLicenseExpireAttribute($pratica_singola['meet_date']);
        
        $data = [
            'pratica_singola' => $pratica_singola,
            'date_of_birth' => $date_of_birth,
            'meet_date' => $meet_date,
        ];

        return view('admin.show', $data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pratica_to_update = Customer::FindOrFail($id);

        $date_of_birth =  $this->getLicenseExpireAttribute($pratica_to_update['date_of_birth']);
        $meet_date =  $this->getLicenseExpireAttribute($pratica_to_update['meet_date']);

        $data = [
            'pratica_to_update' => $pratica_to_update,
            'date_of_birth' => $date_of_birth,
            'meet_date' => $meet_date,
        ];

        return view('admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRules());

        $form_data_edit = $request->all();

        $pratica_updated = Customer::FindOrfail($id);
      
        $pratica_updated->name = $form_data_edit['name'];
        $pratica_updated->lastname =  $form_data_edit['lastname'];
        $pratica_updated->email =  $form_data_edit['email'];
        $pratica_updated->date_of_birth =  $form_data_edit['date_of_birth'];
        $pratica_updated->pratica_n° =  $form_data_edit['pratica_n°'];
        $pratica_updated->descrizione =  $form_data_edit['descrizione'];
        $pratica_updated->meet_date = $form_data_edit['meet_date'];
        $pratica_updated->update();

        return redirect()->route('admin.customers.show' , ['customer' => $pratica_updated->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pratica_to_delete = Customer::findOrFail($id);
        $pratica_to_delete->delete();

        return redirect()->route('admin.customers.index', ['deleted' => 'yes']);
    }

    protected function getValidationRules(){
        return [
            'name' => 'required | max:50',
            'lastname' => 'required | max:50',
            'email' => 'max:50',
            'date_of_birth' => 'required',
            'pratica_n°' => 'required',
            'descrizione' => 'required | max:60000',
        ];
    }


    public function getLicenseExpireAttribute($date){
    return Carbon::parse($date);
    }
}
