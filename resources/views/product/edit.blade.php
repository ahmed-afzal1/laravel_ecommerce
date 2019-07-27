@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products Edit</div>

                <div class="card-body">
                   

                    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                          <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                              <input type="file" name="image" id="image">
                            </div>
                          </div>
                        

                          <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                              <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
                            </div>
                          </div>

                              <input type="submit" value="submit" class="btn btn-primary">
                           
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection