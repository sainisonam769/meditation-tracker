<x-app-layout>
<div class="container mt-5">

    <h2 class="mb-4">Session History</h2>

    <!-- Back Button -->
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Back</a>

    <!-- No Data -->
    @if($sessions->isEmpty())
        <div class="alert alert-info">No sessions found</div>
    @endif

    <!-- Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Duration</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sessions as $session)
                <tr>
                   <td>
                        {{ \Carbon\Carbon::parse($session->session_date)->format('d M Y') }}
                    </td>
                    <td>{{ $session->duration }} min</td>
                    <td>{{ $session->notes }}</td>
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
</x-app-layout>