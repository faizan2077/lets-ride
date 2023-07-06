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
                        <heading>View bus link to route</heading>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="table-responsive">
                                    @php($count = 0)
                                    <table class="table table-striped project-orders-table">

                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.no </th>
                                                <th scope="col">Bus No.</th>
                                                <th scope="col">Route Name</th>
                                                <th scope="col">Driver Name</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php($count = 0)
                                            @if (empty($newArray))
                                                <tr class="text-center">
                                                    <td colspan="6">No data found</td>
                                                </tr>
                                            @else
                                                @foreach ($newArray as $data)
                                                    @php($count++)
                                                    <tr>
                                                        <td>{{ $count }}</td>
                                                        <td>{{ $data->buss_id }}</td>
                                                        <td>{{ $data->route_id }}</td>
                                                        <td>{{ $data->driver_id }}</td>
                                                        <td>{{ $data->created_at }}</td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm btn-icon-text delete-confirm"
                                                                href="{{ route('delete-buss-link-to-route', ['id' => $data->id, 'buss_id' => $data->new_buss_id, 'route_id' => $data->new_route_id, 'driver_id' => $data->new_driver_id]) }}">
                                                                <span class="material-symbols-outlined">
                                                                    delete
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- container-scroller -->

    <!-- base:js -->
    <script src="{{ asset('/public/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('/public/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('/public/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/public/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/public/js/template.js') }}"></script>
    <script src="{{ asset('/public/js/settings.js') }}"></script>
    <script src="{{ asset('/public/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/public/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
