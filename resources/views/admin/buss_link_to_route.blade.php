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
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">

                            <heading>Add bus link to route</heading>


                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form class="form_styling" action="{{ route('add-buss-link-to-route') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Bus No.</label>
                                    <select class="form-control" required name="buss_id">
                                        <option value="" selected disabled>Please Select Bus</option>
                                         @foreach ($busses as $bus)
                                            <option value={{ $bus->id }}>{{ $bus->registration_no }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input name="buss_id" type="text" class="form-control" placeholder="Enter bus id"
                                        required> --}}
                                </div>
                                <div class="form-group">
                                    <label>Route</label>
                                    <select class="form-control text-capitalize" required name="route_id">
                                        <option value="" selected disabled>Please Select Route</option>
                                        @foreach ($routes as $route)
                                           <option value={{ $route->id }}>{{ $route->title }}</option>
                                       @endforeach
                                   </select>
                                    {{-- <input name="route_id" type="text" class="form-control"
                                        placeholder="Enter route id" required> --}}
                                </div>

                                <div class="form-group">
                                    <label>Driver (optional)</label>
                                    <select class="form-control text-capitalize" name="driver_id">
                                        <option value="" selected disabled>Please Select Driver</option>
                                        @foreach ($drivers as $driver)
                                           <option value={{ $driver->id }}>{{ $driver->name }}</option>
                                       @endforeach
                                   </select>
                                    {{-- <input name="driver_id" type="text" class="form-control"
                                        placeholder="Enter driver id" required> --}}
                                </div>



                                <br>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                @include('admin.footer')
</body>

</html>
