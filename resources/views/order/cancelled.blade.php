@extends('layouts.proddesign')

@if(session('success'))
    <div class="alert alert-success" role="alert" id="success-message" style="display: none;">
        {{ session('success') }}
    </div>
@endif
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cancelled Orders') }}
        </h2>
    </x-slot>

    
    <div class="container">
        <h1>Your Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Shipping Fee</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through your orders here -->
                @foreach($cancelledOrders as $order)
                    <tr>
                        <td><img src="{{ asset('storage/' . $order->product->image) }}" alt="Product Image" style="width: 100px;"></td>
                        <td>{{ $order->product->product_name }}</td>
                        <td>{{ $order->product->product_price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->shipping_fee }}</td>
                        <td>{{ $order->product->product_price * $order->quantity + $order->shipping_fee }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
