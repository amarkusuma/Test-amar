@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="{{route('add-employee')}}">Add</a>
                </div>
                
                <table class="table table-striped">
                  <thead>
                      <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>email</td>
                        <td>Company</td>
                        <td colspan = 2>Actions</td>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($employee as $data)
                      <tr>
                          <td>{{$data->id}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->company}}</td>
                          <td>
                              {{-- <a href="{{ route('company.edit',$data->id)}}" class="btn btn-primary">Edit</a> --}}
                          </td>
                          <td>
                      
                              <a href="{{ route('employee.delete',$data->id)}}" class="btn btn-danger">Hapus</a>

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