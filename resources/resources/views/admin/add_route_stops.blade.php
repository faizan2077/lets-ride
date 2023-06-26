<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/loadingio/loading.css@v2.0.0/dist/loading.min.css"/>

{{-- style --}}

<style>
    #selectedSuggestions li{
        text-decoration: none;
    font-size: 1rem;
    list-style: none;
    border-radius: 10px;
    padding: 10px 15px;
    }
    #selectedSuggestions button{
     border:none;
     background-color: transparent;
     color:red;
     cursor: pointer;
     font-weight: 700;
    border-radius:15px;
    right:0;
    position: absolute;
    margin-left:50px;
    }
    #suggestions li{
        cursor: pointer;
        list-style: none;
        text-decoration: none;
    font-size: 1rem;
    padding: 8px;
    }
    .div{
    position: absolute;
    display: flex;
    display: none;
    width: 100%;
    height: 94vh;
    align-items: center;
    justify-content: center;
    background: rgba(0,0,0,0.3);
    overflow: hidden;
    }
    .lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: black;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}
</style>

</head>
<body>
    
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

   {{-- admin header add --}}
   @include('admin.header')

       <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
{{-- skins color add --}}

{{-- skins color add --}}
@include('admin.skins-color')


@include("admin.sidebar")

      <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

          <div class="row">
            <div class="col-md-12">

                <h2>Add Route Stops</h2>



                <form class="form_styling"  action="" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="col-md-2"><b>Route id:</b></label>
                        <div class="col-md-10">
                            <select name="route_id" id="route" >
                                <option value="">Choose bus route</option>
                                @foreach($stopList as $stop)
                                <option value="{{ $stop->id }}" {{ old('dropdown', $id) == $stop->id ? 'selected' : '' }}>{{ $stop->title }}</option>

                                {{-- <option value="{{ $stop->id }}" {{ $id == $stop->id ? 'selected' : '' }}>{{ $stop->title }}</option> --}}

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th class="col-md-10">Stops:</th>

                        </tr>
                        <tr>
                            <td class="col-md-10">
                                <input type="text" id="searchInput" name="addMoreInputFields[0][buss_stop_id]" placeholder="Enter stop" class="form-control" />
                                <div id="suggestions"></div>
                                <ul id="selectedSuggestions"></ul>
                            </td>
                        </tr>
                    </table>


                        <label class="col-md-10"><b>Sort order:</b></label>
                        <div class="col-md-10">
                            <input name="sort_order" type="text" class="form-control" placeholder="Enter sort order">
                        </div>


                    <br>

                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>



    </div>
</div>

        </div>



    <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][buss_stop_id]" placeholder="Enter stop" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script>
    const searchInput = document.getElementById('searchInput');
const suggestionsList = document.getElementById('suggestions');
const selectedSuggestionsList = document.getElementById('selectedSuggestions');
const route = document.getElementById('route');

const submitButton = document.getElementById('submit');
var itemId = '';
let Data = [];
let selectedSuggestions = [];
    function getStops(){
        $.ajax({
            url: "http://megaenterprisegroup.com/api/get-stops-by-id",
            type: "GET",
            success: function(data){
                Data = data.data;
                console.log(Data)
           
            }
        })
    }
function handleSubmit(event) {
  event.preventDefault(); // Prevent the form from submitting and refreshing the page
  console.log(selectedSuggestions)

  const selectedName = searchInput.value;
const data = {
    name:selectedName,
    buss_stop_id:itemId,
    route_id:route.value,
    sort_order:1,
}
console.log(data)
 $.ajax({
    url: 'http://megaenterprisegroup.com/api/route-stops-add',
    method: 'POST',
    data: {
        name: selectedName,
        addMoreInputFields:
            selectedSuggestions
    ,
        route_id:route.value,
        sort_order: 1
    },
        success:function(res){
            console.log(res)
            if(res.status === "success")
            {
                
                showSuccessAlert();
            }

            else
            {
              
                showError();
            }
        }
 })
}

function showSuccessAlert() {
    Swal.fire(
        'Good job!',
        'Route stops added SuccessFully!',
        'success'
    )
}

function showError() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
        })
    }

$(document).ready(function () {
    var index = 0;
    getStops();

    function handleInputChange() {
  const query = searchInput.value.toLowerCase();

  // Clear the previous suggestions
  suggestionsList.innerHTML = '';

  // If the input field is not empty
  if (query.trim() !== '') {
    // Filter the data based on the user's input
    const filteredData = Data.filter(item => item.title.toLowerCase().includes(query));

    // If there are suggestions, display them
    if (filteredData.length > 0 && query !== "") {
      // Iterate over the filtered data and create suggestions
      filteredData.forEach(item => {
        const suggestion = document.createElement('li');
        suggestion.textContent = item.title;

        // Store the ID in a data attribute of the suggestion element
        suggestion.dataset.id = item.id;

        // Add a click event listener to the suggestion
        suggestion.addEventListener('click', function() {
          const selectedId = this.dataset.id;
          const selectedName = this.textContent;

          // Add the selected suggestion to the array
          selectedSuggestions.push({ buss_stop_id: selectedId, name: selectedName });

          // Create a new element to display the selected suggestion
          const selectedSuggestionItem = document.createElement('li');
          selectedSuggestionItem.textContent = selectedName;

          // Add a delete button to the selected suggestion item
          const deleteButton = document.createElement('button');
          deleteButton.textContent = 'Delete';
          deleteButton.addEventListener('click', function() {
            // Remove the selected suggestion from the array
            selectedSuggestions = selectedSuggestions.filter(suggestion => suggestion.id !== selectedId);
            // Remove the selected suggestion item from the DOM
            selectedSuggestionsList.removeChild(selectedSuggestionItem);
          });

          // Append the delete button to the selected suggestion item
          selectedSuggestionItem.appendChild(deleteButton);

          // Append the selected suggestion item to the selected suggestions list
          selectedSuggestionsList.appendChild(selectedSuggestionItem);

          searchInput.value = '';
          suggestionsList.innerHTML = '';
        });

        suggestionsList.appendChild(suggestion);
      });
    }else{
        console.log("no suggestons")
    }
  }
}
submitButton.addEventListener('click', handleSubmit);
searchInput.addEventListener('input', handleInputChange);
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('tr').remove();
    });
});
</script>
@include('admin.footer')
</body>
</html>
