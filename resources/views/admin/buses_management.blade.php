<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')
<style>
    .transition-class {
        transition: background-color 0.5s ease-in-out;
    }
</style>

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
                        <div class="alert alert-danger message">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <heading>Bus management</heading>
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    <table class="table table-striped project-orders-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.no</th>
                                                <th scope="col">Bus number</th>
                                                <th scope="col">Route</th>
                                                <th scope="col">Airconditioned</th>
                                                <th scope="col">Driver Assigned</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($count = 0)
                                            @foreach ($buses as $data)
                                                @php($count++)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $data->registration_no }}</td>
                                                    <td>
                                                        @if ($data->current_route_id)
                                                            {{-- {{ $data->current_route_id }} --}}
                                                            <select class="form-control"
                                                                onchange="assignRoute('{{ $data->id }}')">
                                                                @foreach ($allRoutes as $item)
                                                                    <option
                                                                        @if ($item->title == $data->current_route_id) selected @endif
                                                                        value={{ $item->id }}>{{ $item->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select class="form-control"
                                                                onchange="assignRoute('{{ $data->id }}')">
                                                                <option value="" selected disabled>Assign new
                                                                    route from here</option>
                                                                @foreach ($allRoutes as $item)
                                                                    <option value={{ $item->id }}>
                                                                        {{ $item->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </td>

                                                    <td>{{ $data->is_airconditioned === 1 ? 'Yes' : 'No' }}
                                                        {{-- <td>{{ $data->current_driver_id ? $data->current_driver_id : 'N/A' }} --}}
                                                    </td>
                                                    <td>
                                                        @if ($data->current_driver_id)
                                                            {{-- {{ $data->current_route_id }} --}}
                                                            <select class="form-control drivers"
                                                                onchange="assignDriver('{{ $data->id }}')">
                                                                @foreach ($allDrivers as $item)
                                                                    <option
                                                                        @if ($item->name == $data->current_driver_id) selected @endif
                                                                        value={{ $item->id }}>{{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select class="form-control"
                                                                onchange="assignDriver('{{ $data->id }}')">
                                                                <option value="" selected disabled>Assign driver
                                                                    from here</option>
                                                                @foreach ($allDrivers as $item)
                                                                    <option value={{ $item->id }}>
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger btn-sm btn-icon-text delete-confirm"
                                                            href="{{ route('delete-buss', ['id' => $data->id]) }}">
                                                            <span class="material-symbols-outlined">
                                                                delete
                                                            </span></a>
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

    @if (session()->has('message'))
        <script>
            setTimeout(function() {
                var successMessage = document.getElementsByClassName('message')[0];
                successMessage.style.display = 'none';
            }, 4000);
        </script>
    @endif

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

        function assignRoute(parameter) {
            const id = event.target.value;
            const url = '{{ route('assign-direct-route', [':id', ':parameter']) }}';
            const apiUrl = url.replace(':id', id).replace(':parameter', parameter);

            if (id && parameter) {
                fetch(apiUrl, {
                        method: 'get',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        // Handle any errors
                        console.error('Error:', error);
                    });
            } else {
                console.log("No id");
            }
        }

        function assignDriver(parameter) {
            const id = event.target.value;
            const url = '{{ route('assign-direct-driver', [':id', ':parameter']) }}';
            const apiUrl = url.replace(':id', id).replace(':parameter', parameter);

            if (id && parameter) {
                fetch(apiUrl, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        // Handle any errors
                        console.error('Error:', error);
                    });
            } else {
                console.log("No id");
            }
        }
        const url_id = window.location.pathname.split('/')[3];
        const drivers = document.getElementsByClassName('drivers');
        [...drivers].forEach(driveroptions => {
            [...driveroptions].forEach(element => {
                if (element.value == url_id && element.selected) {
                    driveroptions.style.backgroundColor = "red";
                    setTimeout(function() {
                        driveroptions.style.backgroundColor = "";
                        swal({
                            title: 'Are you sure?',
                            text: 'Driver is assigned to the bus, do you really want to delete it?',
                            icon: 'warning',
                            buttons: ["Cancel", "Yes!"],
                        }).then(res => {
                            if (res) {
                                const url =
                                    '{{ route('delete_driver_approve', [':id']) }}';
                                // Replace ':id' in the URL with the actual driver ID
                                const deleteUrl = url.replace(':id', element.value);

                                // Make an HTTP request to the deleteUrl
                                fetch(deleteUrl, {
                                        method: 'GET'
                                    })
                                    .then(response => {
                                        console.log(response);
                                        // Check the response status
                                        if (response.ok) {
                                            alert("Driver deleted successfully");
                                        } else {
                                            alert("Failed to delete the driver");
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            } else {
                            }
                        });
                    }, 3000);
                }

            });
        });

        console.log(url);
    </script>
