@extends('master')

@section('content')


<div  class=" container">
<div class="row">

        <div class="col-sm-6">
            <img class="detail-img" src="{{ $product['gallery'] }}" alt="">

    </div>
     <div class="col-sm-6">
        <a href="/">Go Back</a>
        <h3>Name :{{ $product['name'] }}</h3>
        <h4>Price :{{ $product['price'] }}</h4>
        <h4>Category :{{ $product['category'] }}</h4>
        <h4>description :{{ $product['description'] }}</h4>
        <br><br>
        <form action="{{ route('addtocart') }}" method="POST">
            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
            @csrf
        <button class="btn btn-success" >Add To Cart</button>

        </form>
        <br><br>
        <button class="btn btn-primary">Buy Now</button>


</div>

</div>

</div>
@endsection
