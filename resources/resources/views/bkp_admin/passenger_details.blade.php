@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>View Passenger Details</h2>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif


        <table class="table table-bordered">
            <thead>
              <tr>

                <th scope="col">Booking id</th>
                <th scope="col">Passenger name</th>
                <th scope="col">Passenger age</th>
                <th scope="col">Passenger phone</th>
                <th scope="col">Passenger cnic</th>
                <th scope="col">Created at</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($passengerDetails as $details)

              <tr>

                <td>{{ $details->booking_id }}</td>
                <td>{{ $details->passenger_name }}</td>
                <td>{{ $details->passenger_age }}</td>
                <td>{{ $details->passenger_phone }}</td>
                <td>{{ $details->passenger_cnic }}</td>
                <td>{{ $details->created_at }}</td>
                <td><a class="delete-confirm" href="{{ route('delete-passenger-details', ['id' => $details->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>

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


