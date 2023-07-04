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
                            <heading>Add Driver</heading>


                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif

                            <form class="form_styling" action="{{ route('add-drivers') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Driver Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter Driver name" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter Driver email" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver phone</label>
                                    <input type="number" name="phone" class="form-control"
                                        placeholder="Enter Driver phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter Driver password" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver dob</label>
                                    <input type="date" name="dob" class="form-control"
                                        placeholder="Enter Driver dob" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                    {{-- <input type="text" name="gender" class="form-control"
                                        placeholder="Enter Driver gender" required> --}}
                                </div>
                                <div class="form-group">
                                    <label>Total experience</label>
                                    <input type="number" name="total_experience" class="form-control"
                                        placeholder="Enter Driver total_experience" required>
                                </div>
                                <div class="form-group">
                                    <label>License number</label>
                                    <input type="text" name="license_number" class="form-control"
                                        placeholder="Enter License number" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver image</label>
                                    <input type="file" name="image" class="form-control"  required>
                                </div>

                                <div class="form-group">
                                    <label>License image</label>
                                    <input type="file" name="license_image" class="form-control"  required>
                                </div>
                                <div class="form-group ml-4">
                                    <input class="form-check-input" type="checkbox" name="status" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Active Status
                                    </label>
                                </div>
                                <br>
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
