@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Buses Management</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Bus number</th>
                <th scope="col">Starting Point</th>
                <th scope="col">Bus ending point</th>
                <th scope="col">Route completion time</th>
                <th scope="col">Stops route of the bus </th>
                <th scope="col">Driver id</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($buses as $data )

              <tr>
                <td>{{ $data->registration_no }}</td>
                <td>{{ $data->starting_point }}</td>
                <td>{{ $data->ending_point }}</td>
                <td>{{ $data->route_completeion_time }}</td>
                <td>{{ $data->stops_route_of_the_bus }}</td>
                <td>{{ $data->current_driver_id }}</td>
                <td><a class="delete-confirm" href="{{ route('delete-buss', ['id' => $data->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>

              </tr>

              @endforeach

            </tbody>
          </table>
    </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: [ "Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
