@extends('layout.home')

@section('content')
      <h1>Add Product</h1>
       
      @include('inc.flashmsg')
      
      <form action="{{ route('product.save') }}" method="POST">
         @csrf 
        <fieldset>
              <legend>Create Product</legend>
              <p>
                 <strong>Name:</strong>
                 <input type="text" name="product" required/>
              </p>

              <p>
                <strong>Price:</strong>
                <input type="text" name="price" required/>
             </p>

             <p>
                <strong>Category:</strong>
                <select name="category" required>
                    <option value="">-- select category --</option>
                    @foreach ($category as $cat)
                        <option value="{{ $cat->category_id }}">{{ $cat->category }}</option>
                    @endforeach
                </select>
             </p>
             <p>
                <input type="submit" value="Submit"/>
             </p>
          </fieldset>
      </form>
@endsection