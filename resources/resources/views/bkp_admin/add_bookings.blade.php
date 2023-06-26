@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Add Bookings </h2>
        </div>

        <form>
            <div class="form-group">
              <label >Booking id </label>
              <input type="text" class="form-control"   placeholder="Enter Booking id ">
            </div>
            <div class="form-group">
                <label >User CNIC</label>
                <input type="text" class="form-control"   placeholder="Enter User CNIC">
              </div>
              <div class="form-group">
                <label >User name</label>
                <input type="text" class="form-control"   placeholder="Enter User name">
              </div>

              <div class="form-group">
                <label >Booked from</label>
                <input type="text" class="form-control"   placeholder="Enter Booked from">
              </div>

              <div class="form-group">
                <label >Booked to</label>
                <input type="text" class="form-control"   placeholder="Enter Booked to">
              </div>

              <div class="form-group">
                <label >Fare</label>
                <input type="text" class="form-control"   placeholder="Enter Fare">
              </div>
              <br>

              <div class="form-group">
                <label >Payment Status</label>
                <input type="text" class="form-control"   placeholder="Enter Payment Status">
              </div>
              <br>

              <div class="form-group">
                <label >Driver name </label>
                <input type="text" class="form-control"   placeholder="Enter Driver name ">
              </div>
              <br>

              <div class="form-group">
                <label >Driver number</label>
                <input type="text" class="form-control"   placeholder="Enter Driver number">
              </div>
              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
