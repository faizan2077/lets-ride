@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Add Seats</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

        <form class="form_styling"  action="{{ route('add-seat') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Seat No </label>
                <input name="seat_no" type="text" class="form-control"   placeholder="Enter seat no">
              </div>
              <div class="form-group">
                <label >Status</label>
                <input name="status" type="text" class="form-control"   placeholder="enter status">
              </div>

              <div class="form-group">
                <label >Buss id</label>
                <input name="buss_id" type="text" class="form-control"   placeholder="Enter buss id if exists in busses table">
              </div>


              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
