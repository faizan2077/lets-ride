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
                        <div class="alert alert-success message">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <heading>Add bus</heading>
                            <form class="form_styling" action="{{ route('add_buses_details') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Bus Registeration Number</label>
                                    <input name="registration_no" type="text" maxlength="15" max="999999999"
                                        min="1" value="{{ old('registration_no') }}" class="form-control"
                                        placeholder="Enter bus registeration number" oninput="limitInputLength(this, 15)"
                                        required>
                                    @error('registration_no')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Number of seats</label>
                                    <input name="total_seats" type="number" value="{{ old('total_seats') }}"
                                        max="100" max="10" oninput="limitInputLength(this, 4)" class="form-control"
                                        placeholder="Enter number of seats" required>
                                    @error('total_seats')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group ml-4">
                                    <input class="form-check-input" type="checkbox" name="is_airconditioned"
                                        value="1" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Is Airconditioned
                                    </label>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Starting Point</label>
                                    <input name="starting_point"ype="text" class="form-control"
                                        placeholder="Enter starting point" required>
                                </div>
                                <div class="form-group">
                                    <label>Bus Ending Point</label>
                                    <input name="ending_point" type="text" class="form-control"
                                        placeholder="Enter bus ending point" required>
                                </div>

                                <div class="form-group">
                                    <label>Route completion time</label>
                                    <input name="route_completeion_time" type="text" class="form-control"
                                        placeholder="Enter Route completion time" required>
                                </div>

                                <div class="form-group">
                                    <label>Stops route of the bus</label>
                                    <input name="stops_route_of_the_bus" type="text" class="form-control"
                                        placeholder="Enter Stops route of the bus" required>
                                </div>

                                <div class="form-group">
                                    <label>Driver id</label>
                                    <input name="current_driver_id" type="text" class="form-control"
                                        placeholder="Enter Driver alloted bus" required>
                                </div> --}}
                                <br>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                @include('admin.footer')
                @if (session()->has('message'))
                    <script>
                        setTimeout(function() {
                            var successMessage = document.getElementsByClassName('message')[0];
                            successMessage.style.display = 'none';
                        }, 4000);
                    </script>
                @endif
               
</body>

</html>
