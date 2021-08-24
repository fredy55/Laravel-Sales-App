
@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header">Product List</h1>

                  @include('inc.flashmsg')
            
                   <p><a href="{{ route('product.add') }}" type="button">Add Product</a></p>
                  <ul class="list-group">
                    @foreach ($product as $item)
                       <li class="list-group-item">
                          <a href="#">{{ $item->product }} - (${{ number_format($item->price,2) }})</a>
                       </li> 
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


