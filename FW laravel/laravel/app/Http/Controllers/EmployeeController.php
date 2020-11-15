<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model
use App\Models\Employee as EmployeeModel;

use App\Models\Company as CompanyModel;

// request
use App\Http\Requests\employee\Add;
// use App\Http\Requests\employee\EditForm;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = EmployeeModel::get();

        $employee = collect($employee)->map(function($employe){
          
            $company_name = $employe['company'] && $employe['company']['name'] ? $employe['company']['name'] : null;
            
            $employe['company'] = $company_name;
           
            return $employe ;

        });

        return view('employee.page', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = CompanyModel::get();

        return view('employee.add_form', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        $validate = $request->only(['name', 'email','company_id']);

        EmployeeModel::create($validate);

        return redirect()->route('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $employee = EmployeeModel::find($id);

        $employee->delete();

        return redirect()->route('employee');
    }
}
