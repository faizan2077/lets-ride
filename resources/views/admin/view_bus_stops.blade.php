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
                        <div class="col-md-12">
                            <heading>View bus stops</heading>
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    @php($count = 0)
                                    <table class="table table-striped project-orders-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.no</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Latitude</th>
                                                <th scope="col">Longitude</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($count = 0)
                                            @foreach ($stops as $stops)
                                                @php($count++)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $stops->title }}</td>
                                                    <td>{{ $stops->latitude }}</td>
                                                    <td>{{ $stops->longitude }}</td>
                                                    <td>{{ $stops->status === 1 ? 'Active' : 'Unactive' }}</td>
                                                    <td>{{ $stops->created_at }}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm btn-icon-text "
                                                            href="{{ route('edit-stops', ['id' => $stops->id]) }}"><span
                                                                class="material-symbols-outlined">
                                                                edit
                                                            </span></a>
                                                        <a class="btn btn-danger btn-sm btn-icon-text delete-confirm"
                                                            href="{{ route('delete-stops', ['id' => $stops->id]) }}"><span
                                                                class="material-symbols-outlined">
                                                                delete
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" target="_blank"
                                                            href="https://www.google.com/maps/search/?api=1&query={{ $stops->latitude }},{{ $stops->longitude }}" "><span
                                                                class="material-symbols-outlined" >
                                                                map
                                                            </span>
                                                        </a>
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
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                    Tecjaunt 2022 <a href="https://www.Tecjaunt.com/" class="text-muted"
                                        target="_blank">Tecjaunt</a>. All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </footer>
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
