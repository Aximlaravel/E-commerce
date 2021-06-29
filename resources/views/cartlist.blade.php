@extends('master')

@section('content')




    <div class="col-sm-10">
        <div class="trending-wraper">
            <h2>Cart List</h2>
            <a class="btn btn-success" href="{{ route('ordernow') }}">OrderNow</a><br><br>
                @foreach ($products as $item )
                <div class="row search-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="{{ route('detail',$item->id) }}">
                            <img class="trending-img" src="{{ $item->gallery }}" >
                          </a>
                       </div>
                       <div class="col-sm-3">
                            <div class="">
                              <h2 style="color: black">{{ $item->name }}</h2>
                              <h5 style="color: black">{{ $item->description }}</h5>
                            </div>
                       </div>
                       <div class="col-sm-3">

                            <a href="{{ route('removecart',$item->carts_id)}}" class="btn btn-warning">Remove From Cart</a>
                       </div>
                </div>

                @endforeach
            <a class="btn btn-success" href="order">OrderNow</a><br><br>

              </div>




    </div>

</div>
@endsection
