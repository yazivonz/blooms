@extends('layouts.design')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Supplier</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('supplier.list') }}"> Back</a>
            </div>
        </div>
    </div>
      
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     
    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Supplier Name:</strong>
                    <input type="text" name="supplier_name" value="{{ $supplier->supplier_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product ID:</strong>
                    <input type="text" name="product_id" value="{{ $supplier->product_id }}" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Supplier Image:</strong>
                    <!-- Display current images -->
                    @foreach (explode(',', $supplier->supplier_image) as $image)
                        <img src="/product_image/{{ $image }}" height="100px" width="100px">
                    @endforeach
                    <!-- Allow updating images -->
                    <input type="file" name="supplier_image[]" class="form-control" placeholder="Image" multiple>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
