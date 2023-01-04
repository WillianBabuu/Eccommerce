@php
 Use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        @if (!empty(Auth::user()->id) && (Auth::user()->business == 1))
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-xs pull-right">Add Product</a>
                        @endif
                    </div>
                    <div class="row mt-5">
                        
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="card text-center" style="width: 18rem;">
                                    {{--  <img src="..." class="card-img-top" alt="...">  --}}
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">Tsh {{ $product->price }}</p>
                                        <p class="card-text">{{ $product->quantity }} Available</p>
                                        @if (!empty(Auth::user()->id) && $product->user_id == Auth::user()->id)
                                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a> 
                                        @else
                                            <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary">Order Now</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
