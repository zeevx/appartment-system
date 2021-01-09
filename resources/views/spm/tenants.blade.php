@include('auth.head')
@include('spm.menu')
@include('auth.alert')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Tenants</h4>
            </div>
            <div class="card-body">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Option</th>
                        </thead>
                        <tbody>
                        @forelse($tenants as $tenant)
                            @if($tenant->hasRole('tenant'))
                                <tr>
                                    <td>{{ $tenant->name }}</td>
                                    <td>{{ $tenant->email }}</td>
                                    <td>{{ $tenant->phone }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">
                                            <span class="material-icons">done_all</span> View
                                        </a>
                                    </td>
                                </tr>
                            @endif
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
