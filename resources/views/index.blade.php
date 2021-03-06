
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
                    @foreach ($products as $item)
                       <li class="list-group-item">
                          <a href="{{ route('product.details', ['id'=>$item->id]) }}">{{ $item->product }}</a>
                          <a href="{{ route('product.edit', ['id'=>$item->id]) }}" type="button" style="margin-left:40px;color:blue;">Edit</a>   
                          <a href="{{ route('product.delete', ['id'=>$item->id]) }}" type="button" style="margin-left:40px;color:blue;">Delete</a>   
                      </li> 
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


