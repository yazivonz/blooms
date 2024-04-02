@extends('layouts.design') 

<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Stocks') }}
    </h2>
</x-slot>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Stocks CRUD</h2>
        </div>
        <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ route('stock.create') }}"> Create Stocks</a>

        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Product Id</th>
        <th>Quantity</th>
        <th>Image</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($stocks as $stock)
    <tr>
        <td>{{ $loop->iteration }}</td> 
        <td>{{ $stock->product_id }}</td>
        <td>{{ $stock->quantity }}</td>
        <td>
        <div id="carousel{{ $stock->id }}" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        @foreach (explode(',', $stock->stock_image) as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="/product_image/{{ $image }}" class="d-block w-50 h-20 " alt="Image {{ $key + 1 }}" style="width: 10px; height: 100px;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel{{ $stock->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                    </a>
                    <a class="carousel-control-next" href="#carousel{{ $stock->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        
                    </a>
                </div>
        </td>
        <td>
                <form action="{{ route('stock.destroy', $stock->id) }}" method="POST">    
                    <a class="btn btn-primary" href="{{ route('stock.edit', $stock->id) }}">Edit</a> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $stocks->links() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</x-app-layout>
