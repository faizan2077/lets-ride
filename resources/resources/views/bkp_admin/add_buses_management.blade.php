@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Add Buses </h2>
        </div>

        <form action="{{ route('add_buses_details')}}" method="POST">
            @csrf
            <div class="form-group">
              <label >Starting Point</label>
              <input name="starting_point"ype="text" class="form-control"   placeholder="Enter starting point" required>
            </div>
            <div class="form-group">
                <label >Bus Number</label>
                <input name="registration_no" type="text" class="form-control"   placeholder="Enter bus number" required>
              </div>
              <div class="form-group">
                <label >Bus Ending Point</label>
                <input name="ending_point" type="text" class="form-control"   placeholder="Enter bus ending point" required>
              </div>

              <div class="form-group">
                <label >Route completion time</label>
                <input name="route_completeion_time" type="text" class="form-control"   placeholder="Enter Route completion time" required>
              </div>

              <div class="form-group">
                <label >Stops route of the bus</label>
                <input name="stops_route_of_the_bus" type="text" class="form-control"   placeholder="Enter Stops route of the bus" required>
              </div>

              <div class="form-group">
                <label >Driver id</label>
                <input name="current_driver_id" type="text" class="form-control"   placeholder="Enter Driver alloted bus" required>
              </div>
              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
