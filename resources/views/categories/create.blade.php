@extends('layout.frontend')
@section('content')
<div class="container w-full">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h4> Created Categories 
                   <a href="{{url('category')}}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
              <form action='{{route('category.store')}}' method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingName" name="name" placeholder="name">
                    <label for="floatingName">Name</label>
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingDescription" name="description" placeholder="Description" >
                    <label for="floatingDescription">Description</label>
                    @error ('description')<span class="text-danger">{{$message}}</span>@enderror
                  </div>
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="status" id="flexCheckDefault" name="status">
                    <label class="form-check-label" for="flexCheckDefault">
                      Status
                    </label>
                  </div>
                  <div class="form-floating mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection