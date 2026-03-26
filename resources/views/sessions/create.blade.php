<x-app-layout>

<div class="container mt-5" style="max-width:600px;">

    <h3 class="mb-4">Add Meditation Session</h3>

    <a href="{{ route('sessions.index') }}" class="btn btn-secondary mb-3">Back</a>

    <!-- TIMER -->
    <div class="mb-3">
        <button onclick="startTimer()" class="btn btn-success">Start</button>
        <button onclick="stopTimer()" class="btn btn-danger">Stop</button>

        <p id="timer" class="mt-2">0 sec</p>
    </div>

    <!-- FORM -->
    <form id="sessionForm" method="POST" action="{{ route('sessions.store') }}">
        @csrf

        <div class="mb-3">
            <label>Date</label>
            <input type="date" id="session_date" name="session_date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Duration (minutes)</label>
            <input type="number" id="duration" name="duration" class="form-control">
        </div>

        <div class="mb-3">
            <label>Notes (Optional)</label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Save Manually</button>
    </form>

</div>

<script>
let seconds = 0;
let timer = null;

function startTimer() {
    seconds = 0;

    if (timer) {
        clearInterval(timer);
    }

    timer = setInterval(function() {
        seconds++;
        document.getElementById('timer').innerText = seconds + " sec";
    }, 1000);
}

function stopTimer() {

    if (!timer) {
        alert("Start first");
        return;
    }
    clearInterval(timer);
    let minutes = Math.round(seconds / 60);
    if (minutes < 1) {
        alert("At least 1 minute required");
        return;
    }
    document.getElementById('duration').value = minutes;
    let today = new Date().toISOString().split('T')[0];
    document.getElementById('session_date').value = today;
    document.getElementById('sessionForm').submit();
}
</script>

</x-app-layout>