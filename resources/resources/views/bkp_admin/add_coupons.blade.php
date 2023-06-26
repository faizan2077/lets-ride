@include('admin.sidebar')


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div>
            <h2>Add Coupons</h2>
        </div>

        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

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
