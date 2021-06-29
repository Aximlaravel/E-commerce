@extends('master')

@section('content')




    <div class="col-sm-6">
        <div class="trending-wraper">
            <table class="table table-striped">

                <tbody>
                  <tr>
                    <td>Price</td>
                    <td>{{ $total }} Rupees</td>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>Delivery</td>
                    <td>100</td>
                  </tr>
                  <tr>
                    <td>Toal Amount</td>
                    <td>{{$total+100 }}</td>
                  </tr>
                </tbody>
              </table>
              <form action="orderplace" method="post" >
                  @csrf
                <div class="form-group">
                  <textarea  class="form-control" placeholder="Enter Your Adress" name="address" > </textarea>
                </div>
                <div class="form-group">
                    <label for="">Payment Method</label>

                    <p> <input type="radio" value="cash" name="payment"><span> Online Payment</span> </p>
                    <p>  <input type="radio" value="cash"  name="payment"><span> Payment on delivery</span> </p>


                </div>
                <div class="checkbox">
                </div>
                <button type="submit" class="btn btn-default">Ordernow</button>
              </form>


    </div>

</div>
@endsection
