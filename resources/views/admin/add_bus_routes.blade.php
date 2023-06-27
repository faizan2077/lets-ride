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
                                    <input name="title" type="text" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="starting_point">Starting Point</label>
                                        <br />
                                        <input class="form-control" list="starting_points" name="starting_point"
                                            id="starting_point">
                                        <datalist id="starting_points">
                                            @foreach ($stopList as $item)
                                                <?php $titleString = htmlspecialchars($item->title); ?>
                                                <option value="{{ $titleString }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="ending_point">Ending Point</label>
                                        <br />
                                        <input class="form-control" list="ending_points" name="ending_point"
                                            id="ending_point">
                                        <datalist id="ending_points">
                                            @foreach ($stopList as $item)
                                                {{ $item->title }}
                                                <?php $titleString = htmlspecialchars($item->title); ?>
                                                <option value="{{ $titleString }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                </div>
                                <div class="form-group p-2 border bg-light col-6">
                                    <div class="form-group">
                                        <label>Add Stops</label>
                                        <br />
                                        <div draggable="true" class="d-flex parent_select" id="0">
                                            <span class="material-symbols-outlined m-2 hamburger">menu</span>
                                            <select class="form-control parent_select">
                                                @foreach ($stopList as $item)
                                                    {{ $item->title }}
                                                    <?php $titleString = htmlspecialchars($item->title); ?>
                                                    <option value="{{ $titleString }}">{{ $titleString }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="btn btn-success mt-3 w-25" onclick="addOption()">Add</div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input name="code" type="text" class="form-control" placeholder="Code">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <input name="status" type="text" class="form-control"
                                        placeholder="Enter Status">
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
                <script>
                    let index = 0; // Initialize the index counter
                    function addOption() {
                        const parent = document.getElementsByClassName('parent_select')[0];
                        const child = parent.cloneNode(true);
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
                </script>

</body>

</html>
