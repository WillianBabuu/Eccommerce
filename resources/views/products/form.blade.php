@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    <a href="{{ route('products.index') }}" class="btn btn-primary text-right">To All Products</a>
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($product->id)
                            <form  method="POST" action="{{ route('products.update',$product->id) }}">
                                {{ method_field('PATCH')}}
                        @else
                            <form  method="POST" action="{{ route('products.store') }}">
                        @endif
                        
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name*</label>
                                        <input type="text" name="name" class="form-control" value="@if($product->id){{ $product->name }} @endif" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Brand</label>
                                        <input type="text" name="brand" class="form-control"  value="@if($product->id){{ $product->brand }}@endif">
                                        <div class="form-text">Optional</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control"  min="0"  value="@if($product->id){{ $product->price }}@endif">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control"  value="@if($product->id){{ $product->quantity }}@endif">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" aria-describedby="emailHelp">@if($product->id){{ $product->description }}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                          </form>
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
