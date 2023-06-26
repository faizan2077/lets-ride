@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>View Seats</h2>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif

        <table class="table table-bordered">
            <thead>
              <tr>

                <th scope="col">Seat no</th>
                <th scope="col">Status</th>
                <th scope="col">Buss id</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($seats as $seat)

              <tr>

                <td>{{ $seat->seat_no }}</td>
                <td>{{ $seat->status }}</td>
                <td>{{ $seat->buss_id }}</td>
                <td>{{ $seat->created_at }}</td>
                <td><a class="delete-confirm" href="{{ route('delete-seats', ['id' => $seat->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>

              </tr>

              @endforeach

            </tbody>
          </table>

          {{-- <div class="col-md-12 mb-3">
            <nav class="pagination float-right">{!! $seats->appends(Request::query())->links() !!}</nav>
        </div> --}}

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
