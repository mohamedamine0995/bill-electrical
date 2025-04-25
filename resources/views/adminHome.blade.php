@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 45rem;mt-5">
        <div class="card-body">
    <h3>Welcome {{ Auth::user()->name }} !!!!!!!</h3>
    <form method="POST" action="{{route('addbil')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Customer Id</label>
         <select name="coid" class="form-select" aria-label="Default select example">
            <option selected>Select Id</option>
            @foreach ($conid as $item)
            <option value="{{$item->connection_id}}">{{$item->connection_id}}</option>
            @endforeach

         </select>

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Initial Reading</label>
            <input type="number" class="form-control" name="inr" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Final Reading</label>
            <input type="number" class="form-control" name="fnr" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Month</label>
            <select  name="mon" class="form-select" aria-label="Default select example">
                <option selected>Select Month</option>
                <option value="January">Jan</option>
                <option value="Febuary">Feb</option>
                <option value="March">Mar</option>
                <option value="April">Apr</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">Aug</option>
                <option value="September">Sept</option>
                <option value="October">Octo</option>
                <option value="November">Nove</option>
                <option value="December">Dec</option>
              </select>
        </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Year</label>
            <select name="yea" class="form-select" aria-label="Default select example">
                <option selected>Select Month</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>

              </select>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>




    </div>
</div>
<div class="card" style="width: 45rem;mt-5">
    <div class="card-body">

<h2>Update Electricty Rate</h2>
   <h2> Current Rate = ₱ 10.09</h2>
   <form action="{{route('changerat')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">New Rate</label>
        <input type="text" name="prix" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

</form>

    </div>
  </div>





</div>
@endsection
