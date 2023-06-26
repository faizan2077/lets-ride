<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        {{-- admin header add --}}
        @include('admin.header')

        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            {{-- skins color add --}}
            @include('admin.skins-color')



            {{-- add side bar --}}

            @include('admin.sidebar')


            <div class="main-panel">
                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <heading>View bus routes</heading>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    <div>
                                    </div>

                                    @php($count = 0)
                                    <table class="table table-striped project-orders-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.no</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Code</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php($count = 0)
                                            @foreach ($routes as $routes)
                                                @php($count++)

                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $routes->title }}</td>
                                                    <td>{{ $routes->code }}</td>
                                                    <td>{{ $routes->status }}</td>
                                                    <td>{{ $routes->created_at }}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm btn-icon-text "
                                                            href="{{ route('edit-routes', ['id' => $routes->id]) }}"><span class="material-symbols-outlined">
                                                                edit
                                                                </span></a>
                                                        <a class="btn btn-danger btn-sm btn-icon-text delete-confirm"
                                                            href="{{ route('delete-routes', ['id' => $routes->id]) }}"><span class="material-symbols-outlined">
                                                                delete
                                                            </span></a>
                                                        <a class="btn btn-primary btn-sm btn-icon-text "
                                                            href="{{ route('go-add-route-stops', ['id' => $routes->id]) }}"><i
                                                                class="typcn typcn-add-outline btn-icon-append">Add
                                                                route stops</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    {{-- <div class="col-md-12 mb-3">
                  <nav class="pagination float-right">{!! $customer->appends(Request::query())->links() !!}</nav>
              </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                @include('admin.footer')

                <script>
                    $('.delete-confirm').on('click', function(event) {
                        event.preventDefault();
                        const url = $(this).attr('href');
                        swal({
                            title: 'Are you sure?',
                            text: 'This record and it`s details will be permanantly deleted!',
                            icon: 'warning',
                            buttons: ["Cancel", "Yes!"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
                </script>

</body>

</html>
