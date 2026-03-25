<x-app-layout>
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-body">

                    <h3 class="text-center mb-4">Edit Meditation Session</h3>

                    <!-- Back Button -->
                    <a href="{{ route('sessions.index') }}" class="btn btn-secondary mb-3">
                        ⬅ Back
                    </a>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ route('sessions.update', $session->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Date -->
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input 
                                type="date" 
                                name="session_date" 
                                value="{{ $session->session_date }}" 
                                class="form-control"
                                required
                            >
                        </div>

                        <!-- Duration -->
                        <div class="mb-3">
                            <label class="form-label">Duration (minutes)</label>
                            <input 
                                type="number" 
                                name="duration" 
                                value="{{ $session->duration }}" 
                                class="form-control"
                                required
                            >
                        </div>

                        <!-- Notes -->
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea 
                                name="notes" 
                                class="form-control"
                                rows="3"
                            >{{ $session->notes }}</textarea>
                        </div>
                        <!-- Button -->
                        <button type="submit" class="btn btn-primary w-100">
                            Update Session
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
</x-app-layout>