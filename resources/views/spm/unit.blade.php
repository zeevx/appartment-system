@include('auth.head')
@include('spm.menu')
@include('auth.alert')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Residential Units</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('unitcats') }}" class="btn btn-primary">
                    <span class="material-icons">add</span> Add Unit Category
                </a>
                <br>
                <form action="{{ route('add.unit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Unit Name</label>
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Unit Building/Property</label>
                        <div class="form-group">
                            <select name="property_id" id="property_id" class="form-control">
                                <option value="">Select Property</option>
                                @foreach($properties as $unitcat)
                                    <option value="{{ $unitcat->id }}">{{ $unitcat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Unit Category</label>
                        <div class="form-group">
                            <select name="unitcategory_id" id="unitcategory_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($unitcategories as $unitcat)
                                    <option value="{{ $unitcat->id }}">{{ $unitcat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <div class="form-group">
                            <input type="text" name="amount" id="amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-group">
                            <select name="status" id="status" class="form-control">
                                <option value="Vacant">Vacant</option>
                                <option value="Occupied">Occupied</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                    <div class="clearfix"></div>
                </form>
                <h2>Residential Units</h2>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @forelse($units as $notice)
                            <tr>
                                <td>{{ $notice->name }}</td>
                                <td>{{ $notice->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        <span class="material-icons">delete</span> Delete
                                    </a>
                                    <a href="#" class="btn btn-primary">
                                        <span class="material-icons">eject</span> Open
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>No Property Now</tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('auth.foot')
