<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    {{-- admin header add --}}
    @include('admin.header')

       <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
{{-- skins color add --}}
        @include('admin.skins-color')



      {{-- add side bar --}}

      @include('admin.sidebar')


      <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

          <div class="row">
            <div class="col-md-12">

                <h2>Add Bookings</h2>


        <form class="form_styling" action="{{ route('booking-add') }}" method="POST">
            @csrf
            <div class="form-group">
              <label >Ticket no </label>
              <input type="text" name="ticket_no" class="form-control"   placeholder="Enter Ticket no ">
            </div>
            <div class="form-group">
                <label >Buss id</label>
                <input type="text" name="buss_id" class="form-control"   placeholder="Enter buss_id">
              </div>
              <div class="form-group">
                <label >Pickup buss stop id</label>
                <input type="text" name="pickup_buss_stop_id" class="form-control"   placeholder="Enter Pickup buss stop id">
              </div>

              <div class="form-group">
                <label >dropoff buss stop id</label>
                <input type="text" name="dropoff_buss_stop_id" class="form-control"   placeholder="Enter dropoff buss stop id">
              </div>

              <div class="form-group">
                <label >Route id</label>
                <input type="text" name="route_id" class="form-control"   placeholder="Enter route_id">
              </div>

              <div class="form-group">
                <label >Driver id</label>
                <input type="text" name="driver_id" class="form-control"   placeholder="Enter Driver id">
              </div>
              <br>

              <div class="form-group">
                <label >Customer id</label>
                <input type="text" class="form-control"  name="customer_id"  placeholder="Enter customer id">
              </div>
              <br>

              <div class="form-group">
                <label >Customer name </label>
                <input type="text" class="form-control" name="customer_name"  placeholder="Enter Customer name ">
              </div>
              <br>

              <div class="form-group">
                <label >Total passengers</label>
                <input type="text" class="form-control" name="total_passengers"  placeholder="Enter Total passengers">
              </div>
              <br>

              <div class="form-group">
                <label >Total seats</label>
                <input type="text" class="form-control" name="total_seats"  placeholder="Enter Total seats">
              </div>
              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
</div>
@include('admin.footer')
</body>
</html>
