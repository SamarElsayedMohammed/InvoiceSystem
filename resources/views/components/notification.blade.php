{{-- @dd($notifications) --}}
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ $notifications->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">{{ $notifications->count() }} Notifications</span>
        <div class="dropdown-divider"></div>
        @foreach ($notifications as $item)
            <a href="/admin/invoices/details/{{ $item['data']['invoice_id'] }}?id={{ $item['id'] }}"
                class="dropdown-item">

                <i class="fas fa-envelope"></i> {{ $item['data']['title'] }}
                <div class="d-flex flex-column">
                    <p class="mr-2 float-left text-muted text-sm">created by : {{ $item['data']['created_by'] }}
                    </p>
                    <span class="mr-2 float-left text-muted text-sm ">3 mins</span>
                </div>
            </a>
        @endforeach
        <div class="dropdown-divider"></div>
        <a href="{{route('admin.invoices.MarkAllReaded')}}" class="dropdown-item dropdown-footer">make all readed</a>
    </div>
</li>
