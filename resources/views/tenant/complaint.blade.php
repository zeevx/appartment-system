@include('auth.head')
@include('tenant.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Complaints</h4>
            </div>
            <div class="card-body">
                <br>
                <form action="{{ route('complaint.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <div class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option value="Plumbing">Plumbing</option>
                                <option value="Damages">Damages</option>
                                <option value="Sanitation">Sanitation</option>
                                <option value="Electricity">Electricity</option>
                                <option value="Security">Security</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Disturbance">Disturbance</option>
                                <option value="Billing">Billing</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What's your complain?</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="body"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit Complain</button>
                    <div class="clearfix"></div>
                </form>
                <h2>Submitted Complains</h2>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Title</th>
                        <th>Category</th>
                        <th>Body</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @forelse($complains as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td>{{ $notice->category }}</td>
                                <td>
                                    {{ $notice->body }}
                                </td>
                                <td>
                                    <a href="{{ route('complaint.show',$notice->id) }}" class="btn btn-primary">
                                        <span class="material-icons">done_all</span> Open
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>No Complain Now</tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('auth.foot')
