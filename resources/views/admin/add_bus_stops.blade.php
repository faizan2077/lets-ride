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
                            <heading>Add Stops</heading>



                            <form class="form_styling"  action="{{ route('add-stop') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label>Short title</label>
                                    <input name="short_title" type="text" class="form-control"
                                        placeholder="Enter short_title">
                                </div>

                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input name="latitude" type="text" class="form-control"
                                        placeholder="Enter Latitude">
                                </div>

                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input name="longitude" type="text" class="form-control"
                                        placeholder="Enter Longitude">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <input name="status" type="text" class="form-control"
                                        placeholder="Enter Status">
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
