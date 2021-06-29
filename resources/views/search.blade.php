@extends('master')

@section('content')


<div  class=" custom-product">
  <div class="col-sm-4">
      <a href="">Filter</a>

  </div>

    <div class="col-sm-4">
        <div class="trending-wraper">
            <h4>Result for Products</h4>
                @foreach ($products as $item )
                <div class=" search-item">
                    <a href="{{ route('detail',$item['id']) }}">
                  <img class="trending-img" src="{{ $item['gallery'] }}" >
                  <div class="">
                    <h2 style="color: black">{{ $item['name'] }}</h2>
                    <h5 style="color: black">{{ $item['description'] }}</h5>
                  </div>
                </a>
                </div>

                @endforeach
              </div>




    </div>

</div>
@endsection
