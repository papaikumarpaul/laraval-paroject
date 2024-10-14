@extends('layout.frontend')
@section('content')
<div class="container w-full">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h4>Categories List
                   <a href="{{url('category/create')}}" class="btn btn-primary float-end">Add category</a>
                </h4>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover table-bordered ">
                <thead class="">
                  <tr class="">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Active</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($categories as $item )
                 <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->Description}}</td>
                  <td>{{$item->status==1 ? 'Visible':'Hidden'}}</td>
                  <td>
                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-success">Edit</a>
                  
                    <form action="{{route('category.destroy',$item->id)}}" class="d-inline" method="POST">
                      @csrf
                      @method("DELETE")
                       <button type="submit" class="btn btn-danger">Deleted</button>
                    </form>
                  </td>
                </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection