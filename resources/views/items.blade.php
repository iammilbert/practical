@include('layout/navbar')
@include('header')

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Registered Items</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Added By</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Item Actions">
                                                <button class="btn btn-sm mr-2 btn-info text-white" data-target="#editModal{{ $item->id }}" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button>
                                                <form method="POST" action="{{ route('items.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!-- Edit Item Modals -->
    @foreach ($items as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel{{ $item->id }}">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('items.update', $item->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="editItemName{{ $item->id }}">Name</label>
                            <input type="text" class="form-control" id="editItemName{{ $item->id }}" name="name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="editItemDescription{{ $item->id }}">Description</label>
                            <textarea class="form-control" id="editItemDescription{{ $item->id }}" name="description">{{ $item->description }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        @if($errors->any())
        @foreach($errors->all() as $error)
        Swal.fire({
            title: 'FAILED',
            text: '{{ $error }}',
            icon: 'error',
            timer: 50000
        });
        @endforeach
        @endif
    </script>

    <script>
        @if(session('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 5000
        })
        @endif
    </script>
</body>
