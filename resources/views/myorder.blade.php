@extends('master')

@section('content')




    <div class="col-sm-10">
        <div class="trending-wraper">
            <h2>My Orders List</h2>
                @foreach ($orders as $item )
                <div class="row search-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="{{ route('detail',$item->id) }}">
                            <img class="trending-img" src="{{ $item->gallery }}" >
                          </a>
                       </div>
                       <div class="col-sm-3">
                            <div class="">
                              <h2>{{ $item->name }}</h2>
                              <h5>Delivery Status:{{ $item->status }}</h5>
                              <h5>Payment Status:{{ $item->payment_status }}</h5>
                              <h5>Payment method:{{ $item->payment_method }}</h5>
                              <h5>Delivery Adress:{{ $item->address }}</h5>
                              <h5>Price:{{ $item->price }}</h5>
                            </div>
                       </div>
                       <div class="col-sm-3">

                            {{-- <a href="{{ route('removecart',$item->carts_id)}}" class="btn btn-warning">Remove From Cart</a> --}}
                       </div>
                </div>

                @endforeach

              </div>




    </div>

</div>
@endsection
