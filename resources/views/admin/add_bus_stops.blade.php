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
                            <heading>Add Stops</heading>



                            <form class="form_styling" action="{{ route('add-stop') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Stop Title</label>
                                    <input value="{{ old('title') }}" name="title" type="text"
                                        class="form-control" placeholder="Enter title" required>
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input name="latitude" value="{{ old('latitude') }}" step="0.000001" type="number"
                                        class="form-control" min="-90" max="90" placeholder="Enter Latitude"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input name="longitude" value="{{ old('longitude') }}" step="0.000001" type="number"
                                        class="form-control" min="-180" max="180"  placeholder="Enter Longitude"
                                        required>
                                </div>

                                <div class="form-group ml-4">
                                    <input class="form-check-input" type="checkbox" name="status" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Active Status
                                    </label>
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
