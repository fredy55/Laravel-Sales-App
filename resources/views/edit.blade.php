@extends('layout.home')

@section('content')
      <h1>Edit Product</h1>
       
      @include('inc.flashmsg')
      
      <form action="{{ route('product.update') }}" method="POST">
         @csrf 
        <fieldset>
              <legend>Create Product</legend>
              <p>
                 <strong>Name:</strong>
                 <input type="text" name="product" value="{{ $product->product }}" required/>
                 <input type="hidden" name="id" value="{{ $product->id }}" required/>
              </p>

              <p>
                <strong>Price:</strong>
                <input type="text" name="price" value="{{ $product->price }}" required/>
             </p>

             <p>
                <strong>Category:</strong>
                <select name="category" required>
                    <option value="{{ $product->category }}">{{ $product->category }}</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Footwares">Footwares</option>
                </select>
             </p>
             <p>
                <input type="submit" value="Update"/>
             </p>
          </fieldset>
      </form>
@endsection