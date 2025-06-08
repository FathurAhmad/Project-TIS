<!-- Modal Tambah/Edit -->
<head>
    <link rel="stylesheet" href="{{ asset('css/kegiatan.css') }}">
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
</head> 

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
