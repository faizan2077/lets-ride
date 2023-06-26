@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>User Management</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">User id</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($user as $data)

              <tr>

                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->email }}</td>
                <td><img src="{{ asset('storage/uploads') }}/{{ $data->image }}" alt="{{ $data->name }}"></td>
                <td><a class="delete-confirm" href="{{ route('delete-customer', ['id' => $data->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>

            </tr>

              @endforeach
            </tbody>

          </table>
          {{-- <div class="col-md-12 mb-3">
            <nav class="pagination float-right">{!! $user->appends(Request::query())->links() !!}</nav>
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
