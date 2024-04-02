@extends('layouts.proddesign')

@if(session('success'))
    <div class="alert alert-success" role="alert" id="success-message" style="display: none;">
        {{ session('success') }}
    </div>
@endif

<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Transactions') }}
        </h2>
</x-slot>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Transaction</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Shipping Fee</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_transaction as $order)
                                    <tr>
                                        <td><img src="{{ asset('product_image/' . $order->product->product_image ) }}" alt="image" style="width: 100px;"></td>
                                        <td>{{ $order->product->product_name }}</td>
                                        <td>{{ $order->product->product_price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->shipping_fee }}</td>
                                        <td>{{ $order->product->product_price * $order->quantity + $order->shipping_fee }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            @if(Auth::user()->usertype == 'admin')
                                                @if($order->status == 'processing')
                                                    <form method="POST" action="{{ route('order.ship', $order->id) }}"> 
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Ship</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('order.cancel', $order->id) }}"> 
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                                                    </form>
                                                @elseif($order->status == 'delivered')

                                                @endif
                                            @else
                                                @if($order->status == 'shipped')
                                                    <form method="POST" action="{{ route('order.delivered', $order->id) }}"> 
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Order Received</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('order.failed', $order->id) }}"> 
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Failed</button>
                                                    </form>
                                                @elseif($order->status == 'delivered')
                                                    <a href="{{ route('review.create', $order->id) }}" class="btn btn-primary">Write a Review</a>
                                                @else
                                                    <form method="POST" action="{{ route('order.failed', $order->id) }}"> 
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                                                    </form>
                                                @endif
                                            @endif
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
