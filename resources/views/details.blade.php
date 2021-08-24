
@extends('layout.home')

@section('content')
      <h1>Product Details</h1>

      <p>
        <strong>Product:</strong> {{ $product->product }}
      </p>

      <p>
        <strong>Price:</strong> ${{ number_format($product->price,2) }}
      </p>
     
      <p>
        <strong>Category:</strong> {{ $product->category->category }}
      </p>

@endsection


