@include('auth.head')
@include('client.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Enquiries</h4>
            </div>
            <div class="card-body">
                <br>
                <form action="{{ route('enquiry.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What's your enquiry?</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="body"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit Enquiry</button>
                    <div class="clearfix"></div>
                </form>
                <h2>Submitted Enquiries</h2>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @forelse($enquiries as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td>
                                    {{ $notice->body }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        <span class="material-icons">done_all</span> Open
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>No Enquiry Now</tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('auth.foot')
