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
                                    <input minlength="3" type="text" name="name" class="form-control"
                                        placeholder="Enter Driver name" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter Driver email" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver Phone</label>
                                    <input type="number" name="phone" class="form-control"
                                        placeholder="Enter Driver phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter Driver password" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver DOB</label>
                                    <input type="date" name="dob" class="form-control " disabled id="age_check"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Driver Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="" disabled selected>Choose Gender</option>
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                    {{-- <input type="text" name="gender" class="form-control"
                                        placeholder="Enter Driver gender" required> --}}
                                </div>
                                <div class="form-group">
                                    <label>Total Experience</label>
                                    <input type="number" min="1" name="total_experience" class="form-control"
                                        placeholder="Enter Driver Totel Experience" required>
                                </div>
                                <div class="form-group">
                                    <label>License Number</label>
                                    <input type="text" name="license_number" class="form-control"
                                        placeholder="Enter License number" required>
                                </div>
                                <div class="form-group">
                                    <label>Driver Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>License Image</label>
                                    <input type="file" name="license_image" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>CNIC Front Image</label>
                                    <input type="file" name="cnic_front" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>CNIC Back Image</label>
                                    <input type="file" name="cnic_back" class="form-control" required>
                                </div>
                                <div class="form-group ml-4">
                                    <input class="form-check-input" type="checkbox" name="status" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Active Status
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                @include('admin.footer')
</body>
<script>
    const currentDate = new Date();
    const maxDate = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());
    const maxDateFormatted = maxDate.toISOString().split('T')[0];

    const dateInput = document.getElementById('age_check');
    dateInput.max = maxDateFormatted;
    dateInput.disabled = false;
</script>

</html>
