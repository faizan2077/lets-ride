<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .tabcontent {
        animation: fadeEffect 0.5s;
        /* Fading effect takes 1 second */
    }

    /* Go from zero to full opacity */
    @keyframes fadeEffect {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
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
                    <!-- Tab links -->

                    <div class="main_content_iner overly_inner ">
                        <div class="container-fluid p-0 ">
                            <div class="tab">
                                <button class="tablinks" id="defaultOpen" onclick="driver(event, 'all-drivers')">All
                                    Drivers</button>
                                <button class="tablinks" onclick="driver(event, 'pending-driver')">Pending
                                    Drivers</button>


                            </div>

                            <!-- Tab content -->

                            <div id="all-drivers" class="tabcontent">

                                <div>
                                    <heading>All Drivers</heading>
                                </div>

                                @if (session()->has('message'))
                                    <div class="alert alert-info">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif


                                @php($count = 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-striped project-orders-table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Sr.no</th>
                                                            <th scope="col">Name of driver</th>
                                                            <th scope="col">Email id</th>
                                                            <th scope="col">Phone number</th>
                                                            <th scope="col">License number</th>
                                                            <th scope="col">Selfie</th>
                                                            <th scope="col">License image</th>
                                                            <th scope="col">Cnic front</th>
                                                            <th scope="col">Cnic back</th>
                                                            <th scope="col">Total experience</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Verify identity st</th>
                                                            <th scope="col">Driver st</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php($count = 0)
                                                        @foreach ($drivers as $driver)
                                                            @php($count++)
                                                            <tr>
                                                                <td>{{ $count }}</td>
                                                                <td>{{ $driver->name }}</td>
                                                                <td>{{ $driver->email }}</td>
                                                                <td>{{ $driver->phone }}</td>
                                                                <td>{{ $driver->license_number }}</td>

                                                                <td>
                                                                    <img onclick="viewPic('{{ asset('drivers') }}/{{ $driver->image }}')" style="width:100px; height:100px;"
                                                                        src="{{ asset('drivers') }}/{{ $driver->image }}" alt="">
                                                                </td>                                                                
                                                                <td><img style="width:100px; height:100px;"
                                                                        src="{{ asset('drivers_license') }}/{{ $driver->license_image }}"
                                                                        alt=""></td>

                                                                <td><img style="width:100px; height:100px;"
                                                                        src="{{ asset('front_cnic') }}/{{ $driver->cnic_front }}"
                                                                        alt=""></td>

                                                                <td><img style="width:100px; height:100px;"
                                                                        src="{{ asset('back_cnic') }}/{{ $driver->cnic_back }}"
                                                                        alt=""></td>


                                                                <td>{{ $driver->total_experience }}</td>
                                                                <td>{{ $driver->gender }}</td>
                                                                <td>{{ $driver->verify_identity_st }}</td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        data-id="{{ $driver->id }}" name="driver_st"
                                                                        class="js-switch"
                                                                        {{ $driver->driver_st == 'available' ? 'checked' : '' }}>
                                                                </td>
                                                                <td><a class="btn btn-danger btn-sm btn-icon-text delete-confirm"
                                                                        href="{{ route('delete-driver', ['id' => $driver->id]) }}"><span
                                                                            class="material-symbols-outlined">
                                                                            delete
                                                                        </span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- pending driver table start here --}}
                            <div id="pending-driver" class="tabcontent">
                                <heading>Pending Drivers</heading>
                                @php($count = 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-striped project-orders-table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Sr.no</th>
                                                            <th scope="col">Name of driver</th>
                                                            <th scope="col">Email id</th>
                                                            <th scope="col">Phone number</th>
                                                            <th scope="col">License number</th>
                                                            <th scope="col">Selfie</th>
                                                            <th scope="col">License image</th>
                                                            <th scope="col">Cnic front</th>
                                                            <th scope="col">Cnic back</th>
                                                            <th scope="col">Total experience</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Verify identity st</th>
                                                            <th scope="col">Send message</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php($count = 0)
                                                        @foreach ($pendingDriver as $driver)
                                                            @php($count++)
                                                            <tr>
                                                                <td>{{ $count }}</td>
                                                                <td>{{ $driver->name }}</td>
                                                                <td>{{ $driver->email }}</td>
                                                                <td>{{ $driver->phone }}</td>
                                                                <td>{{ $driver->license_number }}</td>
                                                                <td>
                                                                    <img style="width:100px; height:100px;"
                                                                        src="{{ asset('drivers') }}/{{ $driver->image }}"
                                                                        alt="">
                                                                </td>

                                                                <td><img style="width:100px; height:100px;"
                                                                        src="{{ asset('drivers_license') }}/{{ $driver->license_image }}"
                                                                        alt=""></td>

                                                                <td><img style="width:100px; height:100px;"
                                                                        src="{{ asset('front_cnic') }}/{{ $driver->cnic_front }}"
                                                                        alt=""></td>

                                                                <td><img style="width:100px; height:100px;"
                                                                        src="{{ asset('back_cnic') }}/{{ $driver->cnic_back }}"
                                                                        alt=""></td>

                                                                <td>{{ $driver->total_experience }}</td>
                                                                <td>{{ $driver->gender }}</td>
                                                                <td>{{ $driver->verify_identity_st }}</td>
                                                                <td>
                                                                    <form
                                                                        action="{{ route('reject-driver', ['id' => $driver->id]) }}">
                                                                        @csrf
                                                                        <input type="text" name="rejected_message"
                                                                            placeholder="write message here" required>
                                                                        <input class="btn btn-danger btn-sm"
                                                                            style="margin-top: 5px;" type="submit"
                                                                            value="reject">
                                                                    </form>
                                                                </td>

                                                                <td>
                                                                    <a class="btn btn-primary btn-sm"
                                                                        href="{{ route('approve-driver', ['id' => $driver->id]) }}">Approve</a>

                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
    </div>

    </div>
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


    {{-- toogle button cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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

    <script>
        $('').on('click', function(event) {
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

    <script>
        function driver(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.js-switch').change(function() {
                let status = $(this).prop('checked') === true ? "available" : "reserved";
                let driverId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('available-driver') }}',
                    data: {
                        'driver_st': status,
                        'driver_id': driverId
                    },
                    success: function(data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 0;
                        toastr.success(data.message);
                    }
                });
            });
        });
        const viewPic = (parameter) => {
            console.log(parameter)
        }
    </script>
</body>

</html>
