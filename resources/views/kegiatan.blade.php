<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/kegiatan.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 2rem;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d3748;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #718096;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: transform 0.2s;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #4a5568;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.2s;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
        }

        .btn-secondary:hover {
            background: #cbd5e0;
        }
    </style>
    <title>Daftar Kegiatan</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    <h1 class="main-title">
        <i class="fas fa-calendar-check"></i> Daftar Kegiatan
    </h1>

    <div class="main-container">
        <!-- Left Panel: Event List -->
        <div class="left-panel">
            <div class="panel-title">
                <i class="fas fa-list-ul"></i>
                Upcoming Events
            </div>
            <button class="add-event-btn" onclick="openAddModal()">
                <i class="fas fa-plus"></i>
                Add New Event
            </button>
            <div class="events-list" id="eventsList"></div>
        </div>

        <!-- Right Panel: Calendar -->
        <div class="right-panel">
            <div class="panel-title">
                <i class="fas fa-calendar"></i>
                Kalender Kegiatan
            </div>
            <div class="calendar-container">
                <div id="calendar"></div>
            </div>
            <div class="google-calendar">
                <iframe src="https://calendar.google.com/calendar/embed?src=bimarama2014%40gmail.com&ctz=Asia%2FBangkok" style="border: 0; width: 100%; height: 400px;" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
    </div>

    <div id="eventModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Add New Event</h2>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <form id="eventForm">
                <div class="form-group">
                    <label class="form-label" for="eventName">Event Name</label>
                    <input type="text" id="eventName" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="eventDate">Date</label>
                    <input type="datetime-local" id="eventDate" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="eventDescription">Description</label>
                    <textarea id="eventDescription" class="form-input" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="eventType">Event Type</label>
                    <select id="eventType" class="form-input">
                        <option value="work">Work</option>
                        <option value="meeting">Meeting</option>
                        <option value="personal">Personal</option>
                        <option value="learning">Learning</option>
                        <option value="development">Development</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn-primary">Save Event</button>
                </div>
            </form>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>
    <script>
        let currentEditId = null;

        document.addEventListener('DOMContentLoaded', function () {
            fetchEvents();
            renderCalendar();

            document.getElementById('eventForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const data = {
                    title: document.getElementById('eventName').value,
                    start: document.getElementById('eventDate').value,
                    description: document.getElementById('eventDescription').value,
                    type: document.getElementById('eventType').value
                };

                const url = currentEditId ? `/kegiatan/${currentEditId}` : '/kegiatan';
                const method = currentEditId ? 'PUT' : 'POST';

                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then(() => {
                    closeModal();
                    fetchEvents();
                    renderCalendar();
                });
            });
        });

        function fetchEvents() {
            fetch('/kegiatan/fetch')
                .then(res => res.json())
                .then(events => renderEventsList(events));
        }

        function renderEventsList(events) {
            const container = document.getElementById('eventsList');
            container.innerHTML = '';
            const now = new Date();
            events.sort((a, b) => new Date(a.start) - new Date(b.start));

            events.forEach(event => {
                const start = new Date(event.start);
                const status = start.toDateString() === now.toDateString()
                    ? 'status-today'
                    : start < now ? 'status-past' : 'status-upcoming';
                const card = document.createElement('div');
                card.className = 'event-card';
                card.innerHTML = `
                    <div class="event-title">
                        <span class="status-indicator ${status}"></span>
                        <i class="fas fa-${getEventIcon(event.type)}"></i>
                        ${event.title}
                        <span class="event-type-badge">${capitalize(event.type)}</span>
                    </div>
                    <div class="event-date">
                        <i class="fas fa-clock"></i>
                        ${formatDate(start)}
                    </div>
                    <div class="event-description">
                        ${event.description ?? 'No description'}
                    </div>
                    <div class="event-actions">
                        <button class="action-btn edit-btn" onclick="openEditModal(${event.id})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="action-btn delete-btn" onclick="deleteEvent(${event.id})">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>`;
                container.appendChild(card);
            });
        }

        function renderCalendar() {
            fetch('/kegiatan/fetch')
                .then(res => res.json())
                .then(events => {
                    const calendarEl = document.getElementById('calendar');
                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: events,
                        eventClick: info => openEditModal(info.event.id),
                        height: 'auto'
                    });
                    calendar.render();
                });
        }

        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Tambah Kegiatan';
            document.getElementById('eventForm').reset();
            currentEditId = null;
            document.getElementById('eventModal').style.display = 'block';
        }

        function openEditModal(id) {
            fetch(`/kegiatan/${id}`)
                .then(res => res.json())
                .then(event => {
                    document.getElementById('modalTitle').textContent = 'Edit Kegiatan';
                    document.getElementById('eventName').value = event.title;
                    document.getElementById('eventDate').value = event.start;
                    document.getElementById('eventDescription').value = event.description;
                    document.getElementById('eventType').value = event.type;
                    currentEditId = event.id;
                    document.getElementById('eventModal').style.display = 'block';
                });
        }

        function deleteEvent(id) {
            if (!confirm('Yakin ingin menghapus kegiatan ini?')) return;
            fetch(`/kegiatan/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(() => {
                fetchEvents();
                renderCalendar();
            });
        }

        function closeModal() {
            document.getElementById('eventModal').style.display = 'none';
        }

        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        function getEventIcon(type) {
            const icons = {
                work: 'briefcase',
                meeting: 'users',
                personal: 'user',
                learning: 'graduation-cap',
                development: 'code'
            };
            return icons[type] || 'calendar';
        }

        function formatDate(date) {
            return new Date(date).toLocaleString('id-ID', {
                weekday: 'short', day: 'numeric', month: 'short', year: 'numeric',
                hour: '2-digit', minute: '2-digit'
            });
        }
    </script>
</body>
</html>
