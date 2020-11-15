@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="{{route('add-company')}}">Add</a>
                </div>
                
                <table class="table table-striped">
                  <thead>
                      <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>email</td>
                        <td>logo</td>
                        <td>website</td>
                        <td colspan = 2>Actions</td>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($company as $data)
                      <tr>
                          <td>{{$data->id}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->email}}</td>
                          <td><img src="{{ url('storage/company/'.$data->logo) }}" alt=""></td>
                          <td>{{$data->website}}</td>
                          <td>
                              <a href="{{ route('company.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                          </td>
                          <td>
                      
                              <a href="{{ route('company.delete',$data->id)}}" class="btn btn-danger">Hapus</a>

                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection