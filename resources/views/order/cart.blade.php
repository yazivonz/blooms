@extends('layouts.proddesign')

@if(session('success'))
    <div class="alert alert-success" role="alert" id="success-message" style="display: none;">
        {{ session('success') }}
    </div>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="menu-section">
    <h2>Products</h2>

    <div class="container">
        <h1>Your Cart</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Shipping Fee</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_order as $order)
                <tr>
                    <td><img src="{{ asset('product_image/' . $order->product->product_image ) }}" alt="image" class="image"></td>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->product->product_price }}</td>
                    <td><input type="number" class="quantity" value="{{ $order->quantity }}" min="1"></td>
                    <td>{{ $order->shipping_fee }}</td>
                    <td>{{ $order->product->product_price * $order->quantity + $order->shipping_fee }}</td>
                    <td>
                        <form method="POST" action="{{ route('order.destroy' , $order->id) }}"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this order?"> Remove </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="cart-actions">
                <form id="checkout-form" method="POST" action="{{ route('order.checkout') }}"> 
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Are you sure you want to checkout?')">Checkout</button>
                </form>
        </div>
    </div>
</div>

</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'block';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000); // Hide the message after 3 seconds
        }
    });
</script>
