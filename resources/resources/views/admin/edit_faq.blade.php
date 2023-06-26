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

                <h2>Update Faq's</h2>



        <form class="form_styling"  action="{{ route('update-faq', ['id' => $editFaq->id]) }}) }}" method="POST">
            @csrf
            <div class="form-group">
                <label >Question </label>
                <input name="question" type="text" class="form-control" value="{{ $editFaq->question }}"  placeholder="write your question here" required>
              </div>
              <div class="form-group">
                <label >Answer</label>
                <input name="answer" type="text" class="form-control" value="{{ $editFaq->answer }}"  placeholder="write your answer here" required>
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
