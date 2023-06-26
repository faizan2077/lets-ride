@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>View Bus Routes</h2>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif

        <table class="table table-bordered">
            <thead>
              <tr>

                <th scope="col">Title</th>
                <th scope="col">Code</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($routes as $routes)

              <tr>

                <td>{{ $routes->title }}</td>
                <td>{{ $routes->code }}</td>
                <td>{{ $routes->status }}</td>
                <td>{{ $routes->created_at }}</td>
                <td><a class="delete-confirm" href="{{ route('delete-routes', ['id' => $routes->id]) }}"><i class="fa fa-trash-o" style="color: red;font-size:30px"></i></a></td>

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
