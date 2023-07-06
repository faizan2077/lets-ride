<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')
<style>
    .hamburger {
        cursor: grab;
    }

    .centered-div {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 1030;
        border: 2px solid rgb(0, 0, 0, 0.3);
        padding: 20px;
        background-color: #d8c0ff;
        box-shadow: 0 3px 12px -3px;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>

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
                            <heading>Add Routes</heading>



                            <form class="form_styling" action="{{ route('add-route') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Route Title</label>
                                    <input name="title" type="text" class="form-control" placeholder="Enter title"
                                        required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="starting_point">Starting Point</label>
                                        <br />
                                        <select name="starting_point" class="form-control" required>
                                            <option value="" selected disabled>Please Select Starting Point
                                            </option>
                                            @foreach ($stopList as $item)
                                                <?php $titleString = htmlspecialchars($item->title); ?>
                                                <?php $id = htmlspecialchars($item->id); ?>
                                                <option value="{{ $id }}">{{ $titleString }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="ending_point">Ending Point</label>
                                        <br />
                                        <select name="ending_point" class="form-control" required>
                                            <option value="" selected disabled>Please Select Ending Point</option>
                                            @foreach ($stopList as $item)
                                                {{ $item->title }}
                                                <?php $titleString = htmlspecialchars($item->title); ?>
                                                <?php $id = htmlspecialchars($item->id); ?>
                                                <option value="{{ $id }}">{{ $titleString }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Select Stops <a class="btn btn-info btn-sm" onclick="openStopModal()">Add
                                                New Stop</a></label>
                                        <div class="form-group wrapper_list py-2 px-3 border bg-light">
                                            <div class="d-flex parent_select" id="0">
                                                <span class="material-symbols-outlined m-3 hamburger">menu</span>
                                                <select class="form-control mt-1" name="stops_list[]" required>
                                                    <option selected disabled value="">Please Select Stop</option>
                                                    @foreach ($stopList as $item)
                                                        {{ $item->title }}
                                                        <?php $titleString = htmlspecialchars($item->title); ?>
                                                        <?php $id = htmlspecialchars($item->id); ?>
                                                        <option value="{{ $id }}">{{ $titleString }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn btn-success w-25" type="none" onclick="addOption()">Add +
                                        </div>
                                    </div>

                                    <div class="form-group pl-4 col-6 mt-4">
                                        <input class="form-check-input" type="checkbox" name="status" value="1"
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Active Status
                                        </label>
                                    </div>
                                </div>


                                <br>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        <div class="w-50 centered-div rounded add_direct_stop d-none">
                            <span class="position-absolute p-2 cursor-pointer" style="top: 0; right:0">
                                <span class="material-symbols-outlined " onclick="closeStopModal()">
                                    close
                                </span>
                            </span>
                            @if (session()->has('message'))
                                <div class="alert alert-success message">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <h5>Add Stop</h5>
                            <form class="w-100" id="stop-form" action="{{ route('add-stop') }}" method="POST">
                                @csrf
                                <div class="form-group w-100">
                                    <label>Stop Title</label>
                                    <input value="{{ old('title') }}" name="title" type="text"
                                        class="form-control" placeholder="Enter title" required>
                                </div>
                                <div class="form-group w-100">
                                    <label>Latitude</label>
                                    <input name="latitude" value="{{ old('latitude') }}" step="0.000001" type="number"
                                        class="form-control" min="-90" max="90" placeholder="Enter Latitude"
                                        required>
                                </div>
                                <div class="form-group w-100">
                                    <label>Longitude</label>
                                    <input name="longitude" value="{{ old('longitude') }}" step="0.000001"
                                        type="number" class="form-control" min="-180" max="180"
                                        placeholder="Enter Longitude" required>
                                </div>
                                <div class="form-group ml-4">
                                    <input class="form-check-input" type="checkbox" name="status" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">Active Status</label>
                                </div>
                                <div class="form-group p-0 m-0">
                                    <button type="button" id="submit-btn" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                @include('admin.footer')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
                    integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                <script>
                    let index = 0; // Initialize the index counter
                    function addOption() {
                        const parent = document.getElementsByClassName('parent_select')[0];

                        const child = parent.cloneNode(true);
                        console.log(child)
                        index++; // Increment the index counter

                        // Assign an ID to the new element
                        child.id = index;

                        parent.insertAdjacentElement('afterend', child);

                        // Sort elements based on their IDs
                        const children = Array.from(parent.parentElement.children);
                        children.sort((a, b) => {
                            const idA = parseInt(a.id);
                            const idB = parseInt(b.id);
                            return idA - idB;
                        });

                        children.forEach((child) => {
                            child.parentElement.appendChild(child);
                        });

                        // Add remove button to the new element
                        const removeButton = document.createElement('button');
                        removeButton.className = 'btn btn-danger btn-sm';
                        removeButton.innerHTML = `
                          <span class="material-symbols-outlined" id="${index}" onclick="removeOption(event)">
                            remove
                          </span>
                        `;
                        child.appendChild(removeButton);
                    }

                    function removeOption(event) {
                        const elementId = event.target.id;
                        const elementToRemove = document.getElementById(elementId);
                        elementToRemove.remove();
                    }
                    const dragArea = document.querySelector(".wrapper_list");
                    new Sortable(dragArea, {
                        animation: 250,
                        onChoose: function(event) {
                            const draggedElement = event.item;

                            // Check if the dragged element is the first element
                            if (draggedElement === dragArea.firstElementChild) {
                                event.cancel(); // Cancel sorting operation
                            }
                        }
                    });

                    function openStopModal() {
                        const stop_parent = document.getElementsByClassName('add_direct_stop')[0];
                        stop_parent.classList.remove("d-none");
                    }

                    function closeStopModal() {
                        const stop_parent = document.getElementsByClassName('add_direct_stop')[0];
                        stop_parent.classList.add("d-none");
                    }

                    // script for ajax stop form submission: 
                    // Get the form and submit button
                    const form = document.getElementById('stop-form');
                    const submitBtn = document.getElementById('submit-btn');
                    submitBtn.addEventListener('click', (event) => {
                        event.preventDefault(); // Prevent the default form submission

                        // Create a new FormData object and populate it with the form data
                        const formData = new FormData(form);

                        // Send an AJAX request
                        fetch(form.action, {
                                method: form.method,
                                body: formData
                            })
                            .then(response => {
                                console.log('Form submitted successfully');
                                closeStopModal();
                                getStopsAgain();
                                swal("Stop Added!", "The stop is added successfully!", "success");
                            })
                            .catch(error => {
                                console.error('An error occurred while submitting the form', error);
                            });
                    });

                    function getStopsAgain() {
                        fetch('http://localhost:8000/test-stops')
                            .then(response => response.json())
                            .then(data => {
                                // Handle the fetched data here
                                console.log(data);
                            })
                            .catch(error => {
                                // Handle any errors that occur during the fetch
                                console.error('Error:', error);
                            });

                    }
                </script>


</body>

</html>
