@extends('layouts.app')

@section('styles')
    <!-- FullCalendar Styles -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <style>
        #calendar {
            max-width: 75%;
            margin: 0 auto;
        }

        .fc-event {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">📅 {{ __('messages.calendar') }}</h4>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- FullCalendar Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ar',
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek'
                },
                events: @json($events)
            });


            calendar.render();
        });
    </script>

    <!-- Tooltip dependency (Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
