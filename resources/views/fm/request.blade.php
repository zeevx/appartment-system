@include('auth.head')
@include('fm.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Requests</h4>
            </div>
            <div class="card-body">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @forelse($requests as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td>
                                    {{ $notice->body }}
                                </td>
                                <td>
                                    <a href="{{ route('request.show',$notice->id) }}" class="btn btn-primary">
                                        <span class="material-icons">done_all</span> Open
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>No Request Now</tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('auth.foot')
