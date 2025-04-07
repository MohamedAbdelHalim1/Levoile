@extends('layouts.app')

@section('styles')
    <!-- FullCalendar CDN (styles + script) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
@endsection

@section('content')
<div class="container">
    <h4 class="mb-4">جدول النشر - التقويم</h4>
    <div id="calendar"></div>
</div>
@endsection

@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ar', // Arabic language
            events: @json($events)
        });

        calendar.render();
    });
</script>
@endsection
