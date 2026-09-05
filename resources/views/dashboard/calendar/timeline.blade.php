@extends('layouts.dashboard')

@section('title', 'Timeline Proyek')

@section('content')

    {{-- ================= HEADER ================= --}}
    <div class="mb-8 space-y-6">

        <div>
            <h2 class="text-3xl font-bold mb-1">Timeline Proyek</h2>
            <p class="text-gray-500">
                Pantau deadline, progress, dan status pengerjaan proyek klien
            </p>
        </div>

        {{-- ================= QUICK STATS (STATIC / NANTI BISA DINAMIS) ================= --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Total Proyek</p>
                <p class="text-2xl font-bold">{{ $total }}</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Proses</p>
                <p class="text-2xl font-bold text-blue-600">
                    {{ $ongoing }}
                </p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Deadline Dekat</p>
                <p class="text-2xl font-bold text-yellow-600">
                    {{ $deadlineDekat }}
                </p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">Selesai</p>
                <p class="text-2xl font-bold text-green-600">
                    {{ $done }}
                </p>
            </div>
        </div>
    </div>

    {{-- ================= CALENDAR CARD ================= --}}
    <div class="bg-white rounded-xl shadow p-4">

        {{-- FullCalendar CDN --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

        {{-- ================= CUSTOM STYLE ================= --}}
        <style>
            /* ===== TODAY HIGHLIGHT ===== */
            .fc .fc-day-today {
                background-color: #eef2ff !important;
                /* indigo-50 */
                /* border: 2px solid #6366f1 !important; */
                /* indigo-500 */
            }

            .fc .fc-day-today .fc-daygrid-day-number {
                background: #6366f1;
                color: white;
                border-radius: 9999px;
                padding: 4px 8px;
                font-weight: 600;
            }

            /* ===== EVENT TEXT WRAP ===== */
            .fc-daygrid-event {
                white-space: normal !important;
                align-items: flex-start !important;
            }

            .fc-daygrid-event .fc-event-title {
                white-space: normal !important;
                line-height: 1.3;
                font-size: 12px;
            }
        </style>

        <div id="project-calendar"></div>
    </div>

    {{-- ================= TIMELINE LIST ================= --}}
    {{-- ================= TIMELINE LIST ================= --}}
    <div class="mt-10">

        <h3 class="text-lg font-semibold mb-4">
            Deadline Terdekat
        </h3>

        <div class="bg-white rounded-xl shadow divide-y">

            @forelse ($timelineList as $item)

                @php
                    $deadline = \Carbon\Carbon::parse($item->deadline);

                    $isLate = $deadline->isPast() && $item->status !== 'selesai';

                    $isNear = !$isLate && $deadline->diffInDays(now()) <= 3;

                    $statusClass = match ($item->status) {
                        'pending' => 'bg-yellow-100 text-yellow-700',
                        'proses' => 'bg-blue-100 text-blue-700',
                        'selesai' => 'bg-green-100 text-green-700',
                        default => 'bg-gray-100 text-gray-700',
                    };
                @endphp

                <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-12 gap-4 items-center hover:bg-gray-50 transition">

                    {{-- PROYEK + KLIEN --}}
                    <div class="md:col-span-5">
                        <p class="font-semibold text-gray-800 leading-tight">
                            {{ $item->layanan ?? $item->service ?? 'Proyek' }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $item->nama ?? $item->name ?? '-' }}
                        </p>
                    </div>

                    {{-- DEADLINE --}}
                    <div class="md:col-span-4 text-sm">
                        <span class="text-gray-500">Deadline</span><br>
                        <span class="font-medium
                                {{ $isLate ? 'text-red-600' : ($isNear ? 'text-yellow-600' : 'text-gray-800') }}">
                            {{ $deadline->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    {{-- STATUS + PROGRESS --}}
                    <div class="md:col-span-3 flex items-center justify-between md:justify-end gap-4">

                        {{-- STATUS --}}
                        <span class="px-3 py-1 rounded-full text-xs font-medium whitespace-nowrap {{ $statusClass }}">
                            {{ ucfirst($item->status) }}
                        </span>

                    </div>

                </div>

            @empty
                <div class="p-6 text-center text-gray-400">
                    Belum ada proyek dengan deadline
                </div>
            @endforelse

        </div>

    </div>



    {{-- ================= MODAL DETAIL ================= --}}
    <div id="projectModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Detail Proyek</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-700 text-2xl">
                    &times;
                </button>
            </div>

            <div class="space-y-4 text-sm text-gray-600">
                <div>
                    <p class="text-gray-500">Nama Proyek</p>
                    <p id="modalProjectName" class="font-semibold text-gray-800"></p>
                </div>

                <div>
                    <p class="text-gray-500">Klien</p>
                    <p id="modalClientName"></p>
                </div>

                <div class="flex gap-6">
                    <div>
                        <p class="text-gray-500">Mulai</p>
                        <p id="modalStartDate"></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Deadline</p>
                        <p id="modalDeadline" class="text-yellow-600 font-medium"></p>
                    </div>
                </div>

                <div>
                    <p class="text-gray-500">Progress</p>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="modalProgressBar" class="bg-blue-500 h-2 rounded-full" style="width:0%"></div>
                    </div>
                    <p id="modalProgressText" class="text-xs mt-1"></p>
                </div>

                <div>
                    <p class="text-gray-500">Status</p>
                    <span id="modalStatus" class="inline-flex px-3 py-1 rounded-full text-xs font-medium"></span>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button onclick="closeModal()" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">
                    Tutup
                </button>
            </div>

        </div>
    </div>

    {{-- ================= SCRIPT ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const calendarEl = document.getElementById('project-calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                height: 'auto',

                dayMaxEvents: 3, // 👈 biar rapi

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },

                // 🔥 DATA REAL DARI ORDERS
                events: {
                    url: "{{ route('calendar.events') }}",
                    method: 'GET',
                },

                eventClick: function (info) {
                    openModal(info.event);
                }
            });

            calendar.render();
        });

        function openModal(event) {
            document.getElementById('projectModal').classList.remove('hidden');
            document.getElementById('projectModal').classList.add('flex');

            document.getElementById('modalProjectName').innerText = event.title;
            document.getElementById('modalClientName').innerText = event.extendedProps.client ?? '-';
            document.getElementById('modalStartDate').innerText = formatDate(event.start);
            document.getElementById('modalDeadline').innerText = formatDate(event.start);

            const progress = event.extendedProps.progress ?? 0;
            document.getElementById('modalProgressBar').style.width = progress + '%';
            document.getElementById('modalProgressText').innerText = progress + '%';

            const statusEl = document.getElementById('modalStatus');
            statusEl.className = 'inline-flex px-3 py-1 rounded-full text-xs font-medium';

            if (event.extendedProps.status === 'pending') {
                statusEl.classList.add('bg-yellow-100', 'text-yellow-700');
                statusEl.innerText = 'Pending';
            } else if (event.extendedProps.status === 'proses') {
                statusEl.classList.add('bg-blue-100', 'text-blue-700');
                statusEl.innerText = 'Proses';
            } else if (event.extendedProps.status === 'selesai') {
                statusEl.classList.add('bg-green-100', 'text-green-700');
                statusEl.innerText = 'Selesai';
            } else {
                statusEl.classList.add('bg-gray-100', 'text-gray-700');
                statusEl.innerText = '-';
            }
        }

        function closeModal() {
            document.getElementById('projectModal').classList.add('hidden');
            document.getElementById('projectModal').classList.remove('flex');
        }

        function formatDate(date) {
            return new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            }).format(date);
        }
    </script>

@endsection