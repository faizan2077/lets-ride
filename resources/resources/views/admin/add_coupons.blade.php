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

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

          <div class="row">
            <div class="col-md-12">

                <h2>Add coupon</h2>



        <form class="form_styling"  action="{{ route('add-coupon') }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Coupon number</label>
                <input name="coupon_number" type="text" class="form-control"   placeholder="Enter coupon number">
              </div>
              <div class="form-group">
                <label >Type</label>
                <input name="type" type="text" class="form-control"   placeholder="enter type">
              </div>

              <div class="form-group">
                <label >Discount</label>
                <input name="discount" type="text" class="form-control"   placeholder="Enter discount if you have any">
              </div>

              <div class="form-group">
                <label >Expiry date</label>
                <input name="expiry_date" type="text" class="form-control"   placeholder="Enter expiry date">
              </div>

              <div class="form-group">
                <label >Status</label>
                <input name="status" type="text" class="form-control"   placeholder="Enter status">
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
