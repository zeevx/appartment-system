@include('auth.head')
@include('spm.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Asset</h4>
            </div>
            <div class="card-body">
                <br>
                <form action="{{ route('spm.facility.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Asset Name</label>
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                    <div class="clearfix"></div>
                </form>
                <h2>Assets Added</h2>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @forelse($facilities as $notice)
                            <tr>
                                <td>{{ $notice->name }}</td>
                                <td>{{ $notice->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        <span class="material-icons">delete</span> Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>No Facility Now</tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('auth.foot')
