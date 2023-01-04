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
                        @if (!empty(Auth::user()->id))
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-xs pull-right">Add Product</a>
                        @endif
                    </div>
                    <h3 class="text-center">All Orders</h3>
                    <div class="row mt-5">
                        @if ($orders && $orders->count() > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    {{--  <th scope="col">Ordered By</th>  --}}
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th>{{ $order->product->name }}</th>
                                            {{--  <td>{{ $order->customer->name }}</td>  --}}
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                
                                
                                
                            </tbody>
                          </table>
                        @else
                            <h4 class="text-center alert alert-secondary">
                                No Order Available
                            </h4>
                        @endif
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
