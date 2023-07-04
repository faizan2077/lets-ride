<!DOCTYPE html>
<html lang="en">

{{-- head add --}}

@include('admin.top-bar')
<style>
    .hamburger {
        cursor: grab;
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
                                        <label>Add Stops</label>
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
                                        <div class="btn btn-success w-25" onclick="addOption()">Add +</div>
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
                    </div>

                </div>
                @include('admin.footer')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"
                    integrity="sha512-Eezs+g9Lq4TCCq0wae01s9PuNWzHYoCMkE97e2qdkYthpI0pzC3UGB03lgEHn2XM85hDOUF6qgqqszs+iXU4UA=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                </script>


</body>

</html>
