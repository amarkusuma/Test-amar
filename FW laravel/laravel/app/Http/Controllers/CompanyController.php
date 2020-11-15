<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// model
use App\Models\Company as CompanyModel;

// request
use App\Http\Requests\company\Add;
use App\Http\Requests\company\EditForm;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = CompanyModel::get();

        return view('company.page', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        $validate = $request->only(['name', 'email','website']);

        $upload = Storage::disk('local')->put('company', $request->file('logo'), 'public');

        $name_image = explode('/', $upload)[1];

        $validate['logo'] = $name_image ;

        CompanyModel::create($validate);

        return redirect()->route('company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $company = CompanyModel::find($request['id']);
        
        return view('company.edit_form', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditForm $request )
    {
        $validate =  $request->only(['id','name', 'email','website','logo']);
        
        $company = CompanyModel::find($validate['id']);

        $company['name'] = $validate['name'];
        $company['email'] = $validate['email'];
        $company['website'] = $validate['website'];

        if (empty($validate['logo'])) {
            
            $company->save();
        }
        else{
           
            $upload = Storage::disk('local')->put('company', $request->file('logo'), 'public');

            $name_image = explode('/', $upload)[1];

            Storage::disk('local')->delete('company/'.$company['logo']);

            $company['logo'] =  $name_image;

            $company->save();
        }

        return redirect()->route('company');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = CompanyModel::find($id);

        Storage::disk('local')->delete('company/'.$company['logo']);

        $company->delete();

        return redirect()->route('company');
    }
}
