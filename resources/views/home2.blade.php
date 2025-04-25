@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Welcome {{ Auth::user()->name }} !!!!!!!</h3>
    <div class="card" style="width: 45rem;">
        <div class="card-body">
            <h5 class="card-title">Your Details:</h5>

          <h5 class="card-title">Connection Id :{{ Auth::user()->connection_id }}</h5>
          <h5 class="card-title">Name :{{ Auth::user()->name }}</h5>
          <h5 class="card-title">Email :{{ Auth::user()->email }}</h5>
          <h5 class="card-title">Billing Address :{{ Auth::user()->address }}</h5>


        </div>
      </div>



<div class="card" style="width: 45rem;mt-5">
    <div class="card-body">
<form action="{{route('pay')}}" method="POST">
    @csrf
    <label for="">You Have a pending Bill Amount of: ₱</label>


   


</form>
      <!--  <h5 class="card-title"> </h5>-->


    </div>
  </div>




<div class="card" style="width: 45rem;mt-5">
    <div class="card-body">
        <h5 class="card-title">Issued Bills</h5>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Month</th>
                <th scope="col">Year</th>
                <th scope="col">Statuts</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>

            </tbody>
          </table>

    </div>
  </div>
  <div class="card" style="width: 45rem;mt-5">
    <div class="card-body">
        <h5 class="card-title">Download Bills
        </h5>
        <form class="row g-3" action="{{route('down')}}" method="POST">
            @csrf
            <div class="col-auto">
              <label for="staticEmail2" class="visually">Month</label>
              <select class="form-select" aria-label="Default select example" name="mon">
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
            <div class="col-auto">
              <label for="inputPassword2" class="">Year</label>
              <select class="form-select" aria-label="Default select example" name="yea">
                <option selected>Select Year</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mt-4">Download</button>
            </div>
          </form>

    </div>
  </div>
</div>
</div>
</div>
@endsection
