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
                            <heading>Add seats</heading>


                            <form class="form_styling"  action="{{ route('add-seat') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Seat No </label>
                                    <input name="seat_no" type="text" class="form-control"
                                        placeholder="Enter seat no">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input name="status" type="text" class="form-control"
                                        placeholder="enter status">
                                </div>

                                <div class="form-group">
                                    <label>Buss id</label>
                                    <input name="buss_id" type="text" class="form-control"
                                        placeholder="Enter buss id if exists in busses table">
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
