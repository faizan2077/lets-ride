@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Buss link to Routes</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
    {{session('error')}}
</div>
@endif

        <form class="form_styling"  action="{{ route('add-buss-link-to-route') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Buss id</label>
                <input name="buss_id" type="text" class="form-control"   placeholder="Enter buss id">
              </div>
              <div class="form-group">
                <label >Route id</label>
                <input name="route_id" type="text" class="form-control"   placeholder="Enter route id">
              </div>

              <div class="form-group">
                <label >Driver id</label>
                <input disabled name="driver_id" type="text" class="form-control"   placeholder="Enter driver id">
              </div>



              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
