@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Add Buses Routes</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

        <form class="form_styling"  action="{{ route('add-stop') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Title</label>
                <input name="title" type="text" class="form-control"   placeholder="Enter title">
              </div>
              <div class="form-group">
                <label >Short title</label>
                <input name="short_title" type="text" class="form-control"   placeholder="Enter short_title">
              </div>

              <div class="form-group">
                <label >Latitude</label>
                <input name="latitude" type="text" class="form-control"   placeholder="Enter Latitude">
              </div>

              <div class="form-group">
                <label >Longitude</label>
                <input name="longitude" type="text" class="form-control"   placeholder="Enter Longitude">
              </div>

              <div class="form-group">
                <label >Status</label>
                <input name="status" type="text" class="form-control"   placeholder="Enter Status">
              </div>

              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
