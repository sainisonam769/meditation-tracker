<x-app-layout>
<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
    
    <h2 class="mb-0 fw-bold">Session History</h2>

    <a href="{{ route('dashboard') }}" class="btn btn-outline-dark btn-sm">
        ← Back
    </a>

</div>
    @if($sessions->count() == 0)
        <div class="alert alert-info">No sessions found</div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Notes</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sessions as $session)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($session->session_date)->format('d M Y') }}
                            </td>
                            <td>{{ $session->duration }} min</td>
                            <td>{{ $session->notes ?? 'No notes' }}</td>
                            <td>
                                <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $sessions->links() }}
    </div>

</div>
</x-app-layout>