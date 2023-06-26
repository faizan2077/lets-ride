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
                            <heading>Update Buss Routes</heading>
                            <form class="form_styling"  action="{{ route('update-route', ['id' => $editRoute->id]) }}) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Title </label>
                                    <input name="title" type="text" class="form-control"
                                        value="{{ $editRoute->title }}" placeholder="write your Title here" required>
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input name="code" type="text" class="form-control"
                                        value="{{ $editRoute->code }}" placeholder="write your code here" required>
                                </div>

                                <br>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                @include('admin.footer')

</body>

</html>
