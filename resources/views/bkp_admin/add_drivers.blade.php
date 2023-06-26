@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Add Driver </h2>
        </div>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <form class="form_styling"  action="{{ route('add-drivers') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label >Driver Name</label>
                <input type="text" name="name" class="form-control"   placeholder="Enter Driver name" required>
              </div>
              <div class="form-group">
                <label >Driver Email</label>
                <input type="email" name="email" class="form-control"   placeholder="Enter Driver email" required>
              </div>
              <div class="form-group">
                <label >Driver phone</label>
                <input type="text" name="phone" class="form-control"   placeholder="Enter Driver phone" required>
              </div>
              <div class="form-group">
                <label >Driver password</label>
                <input type="password" name="password" class="form-control"   placeholder="Enter Driver password" required>
              </div>
              <div class="form-group">
                <label >Driver dob</label>
                <input type="text" name="dob" class="form-control"   placeholder="Enter Driver dob" required>
              </div>
              <div class="form-group">
                <label >Driver gender</label>
                <input type="text" name="gender" class="form-control"   placeholder="Enter Driver gender" required>
              </div>
              <div class="form-group">
                <label >Total experience</label>
                <input type="text" name="total_experience"  class="form-control"   placeholder="Enter Driver total_experience" required>
              </div>
              <div class="form-group">
                <label >License number</label>
                <input type="text" name="license_number" class="form-control"   placeholder="Enter License number" required>
              </div>

              <div class="form-group">
                <label >Status</label>
                <input type="boolean" name="status" class="form-control"   placeholder="Enter Bus status" required>
              </div>

              <div class="form-group">
                <label >Driver image</label>
                <input type="file" name="image" class="form-control"   placeholder="" >
              </div>

              <div class="form-group">
                <label >License image</label>
                <input type="file" name="license_image" class="form-control"   placeholder="" >
              </div>
              <br>


              <br>

              <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>

    </div>
</div>
