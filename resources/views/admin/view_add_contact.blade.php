<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')
<style>
    .cursor-pointer {
        cursor: pointer;
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
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <heading>Contact Information</heading>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    @if (count($contactData) > 0)
                                        <table class="table table-striped project-orders-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Phone Number</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <!-- table structure and header omitted for brevity -->
                                            <tbody>
                                                @foreach ($contactData as $data)
                                                    <form  action="{{ route('add-contact-info') }}" method="POST">
                                                        @csrf
                                                        <tr>
                                                            <td><input class="form-control" name="phone" placeholder="Enter phone numnber"
                                                                    value={{ $data->phone }}></td>
                                                            <td><input class="form-control" name="email" placeholder="Enter email"
                                                                    value={{ $data->email }}></td>
                                                            <td><button class="btn btn-success">Update</button></td>
                                                        </tr>
                                                    </form>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>No data found.</p>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal" id="answerModal" tabindex="-1" role="dialog"
                                        aria-labelledby="answerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="answerModalLabel">Answer</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="modalAnswer"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/js/template.js') }}"></script>
    <script src="{{ asset('/js/settings.js') }}"></script>
    <script src="{{ asset('/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
