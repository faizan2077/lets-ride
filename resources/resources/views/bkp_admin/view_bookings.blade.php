@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Booking Management</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif


        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Ticket No</th>
                <th scope="col">Buss id</th>
                <th scope="col">Pickup buss stop id</th>
                <th scope="col">Drop off buss stop id</th>
                <th scope="col">Route id</th>
                <th scope="col">Driver id</th>
                <th scope="col">Customer id</th>
                <th scope="col">Customer name</th>
                <th scope="col">Total buss stop</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $bookings )

                <tr>

                <td>{{ $bookings->ticket_no }}</td>
                <td>{{ $bookings->buss_id }}</td>
                <td>{{ $bookings->pickup_buss_stop_id }}</td>
                <td>{{ $bookings->dropoff_buss_stop_id }}</td>
                <td>{{ $bookings->route_id }}</td>
                <td>{{ $bookings->driver_id }}</td>
                <td>{{ $bookings->customer_id }}</td>
                <td>{{ $bookings->customer_name }}</td>
                <td>{{ $bookings->total_buss_stops_covered }}</td>
                <td>{{ $bookings->created_at }}</td>
                <td><a class="delete-confirm" href="{{ route('delete-bookings', ['id' => $bookings->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>
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


