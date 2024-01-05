<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $title }}</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Book</th>
                        <th>Rent Date</th>
                        <th>Return Date</th>
                        <th>Actual Return Date</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($rentlog as $item)
                        <tr
                            class="@if ($item->actual_return_date == '') table-success text-white @elseif ($item->return_date < $item->actual_return_date)
                table-danger text-white
            @else
             @endif">
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $item->user->username }}</th>
                            <th>{{ $item->book->title }}</th>
                            <th>{{ $item->rent_date }}</th>
                            <th>{{ $item->return_date }}</th>
                            <th>{{ $item->actual_return_date }}</th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($rentlog->links()->paginator->hasPages())
        <div class="mt-4 p-4 box has-text-centered">
            {{ $rentlog->links() }}
        </div>
    @endif
</div>
