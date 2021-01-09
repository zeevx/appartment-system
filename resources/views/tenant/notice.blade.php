@include('auth.head')
@include('tenant.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Notices</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @forelse($notices as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td>
                                    {{ $notice->body }}
                                </td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="material-icons">done_all</span>  Mark as read
                                        </button>
                                    </form>
                                </td>
                            </tr>
                                @empty
                                <b>No Notification Now</b>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@include('auth.foot')
