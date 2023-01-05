@php
 Use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-xs pull-right">All Products</a>
                    </div>
                    <div class="row mt-5 card text-center">     
                        <div class="row">                  
                            <div class="col-md-9">
                                {{--  <img src="..." class="card-img-top" alt="...">  --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Tsh {{ $product->price }}</p>
                                    <p class="card-text">{{ $product->quantity }} Available</p>
                                    @if (!empty(Auth::user()->id) && $product->user_id == Auth::user()->id)
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a> 
                                    @else
                                    {{--  <a href="#" class="btn btn-primary">Order Now</a>  --}}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="cash-tab" data-bs-toggle="tab" data-bs-target="#cash-tab-pane" type="button" role="tab" aria-controls="cash-tab-pane" aria-selected="true">Cash</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="card-tab" data-bs-toggle="tab" data-bs-target="#card-tab-pane" type="button" role="tab" aria-controls="card-tab-pane" aria-selected="false">Card</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="cash-tab-pane" role="tabpanel" aria-labelledby="cash-tab" tabindex="0">
                                        <form  method="POST" action="{{ route('order.store') }}">
                                            {{--  {{ method_field('PATCH')}}  --}}
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="payment_method" value="cash">
                                                <input type="hidden" name="card_number" value="Cash">
                                                <input type="hidden" name="billing_address" value="cash">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Total</label>
                                                        <input type="text" name="total_price" class="form-control"  value="@if($product->id){{ $product->price }}@endif" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="card-tab-pane" role="tabpanel" aria-labelledby="card-tab" tabindex="0">
                                        <form method="POST"  action="{{ route('order.store') }}">
                                            {{--  {{ method_field('PATCH')}}  --}}
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="payment_method" value="card">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Total</label>
                                                        <input type="text" name="total_price" class="form-control"  value="@if($product->id){{ $product->price }}@endif" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="billing_address" class="form-label">Billing Address</label>
                                                        <input type="text" name="billing_address" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="card_number" class="form-label">Card Number</label>
                                                        <input type="text" name="card_number" class="form-control" >
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
        </div>
    </div>
</div>
@endsection
