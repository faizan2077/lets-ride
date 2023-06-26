@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>View Bus link to routes</h2>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif

        <table class="table table-bordered">
            <thead>
              <tr>

                <th scope="col">Buss id</th>
                <th scope="col">Route id</th>
                <th scope="col">Driver id</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($bussRouteDetail as $data)

              <tr>

                <td>{{ $data->buss_id }}</td>
                <td>{{ $data->route_id }}</td>

                @if ( $data->driver_id == 0 )
                <td>
                Driver not available
              </td>
              @endif
                <td>{{ $data->created_at }}</td>
                <td><a class="delete-confirm" href="{{ route('delete-buss-link-to-route', ['id' => $data->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>

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
