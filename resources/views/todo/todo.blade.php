<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpectaList - Interactive Dual Theme</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&family=Nunito:wght@400;700;900&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --transition-speed: 0.3s;
        }

        [data-theme="light"] {
            --bg-color-start: #f4f7fa;
            --bg-color-end: #d9e2ec;
            --surface-color: #eef2f7;
            --border-color-light: #ffffff;
            --border-color-dark: #c8d0e0;
            --text-color-primary: #000000;
            --text-color-secondary: #555555;
            --accent-color-blue: #4a72ff;
            --accent-color-red: #ff4a6b;
            --shadow-light: -8px -8px 16px var(--border-color-light);
            --shadow-dark: 8px 8px 16px var(--border-color-dark);
            --inset-shadow-light: inset -4px -4px 8px var(--border-color-light);
            --inset-shadow-dark: inset 4px 4px 8px var(--border-color-dark);
        }

        [data-theme="dark"] {
            --bg-color-start: #2c3e50;
            --bg-color-end: #233142;
            --surface-color: #283645;
            --border-color-light: #314256;
            --border-color-dark: #1e2a38;
            --text-color-primary: #ffffff;
            --text-color-secondary: #bbbbbb;
            --accent-color-blue: #5a82ff;
            --accent-color-red: #ff5a7b;
            --shadow-light: -6px -6px 12px var(--border-color-light);
            --shadow-dark: 6px 6px 12px var(--border-color-dark);
            --inset-shadow-light: inset -4px -4px 8px var(--border-color-light);
            --inset-shadow-dark: inset 4px 4px 8px var(--border-color-dark);
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, var(--bg-color-start), var(--bg-color-end));
            color: var(--text-color-primary);
            overflow-x: hidden;
            min-height: 100vh;
            transition: background var(--transition-speed), color var(--transition-speed);
        }

        .card,
        .modal-content {
            background: var(--surface-color);
            border: 1px solid var(--border-color-light);
            border-radius: 20px;
            box-shadow: var(--shadow-dark), var(--shadow-light);
            transition: background var(--transition-speed), box-shadow var(--transition-speed);
        }

        .navbar {
            background: color-mix(in srgb, var(--surface-color) 80%, transparent);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color-light);
            transition: background var(--transition-speed), border-bottom var(--transition-speed);
        }

        .navbar-brand {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 1.8rem;
            color: var(--text-color-primary) !important;
            transition: color var(--transition-speed);
        }

        #live-clock,
        .theme-switcher {
            font-family: 'Roboto Mono', monospace;
            font-size: 1rem;
            color: var(--text-color-secondary);
            cursor: pointer;
        }

        .theme-switcher i {
            font-size: 1.2rem;
            transition: transform 0.5s ease;
        }

        .theme-switcher.switching i {
            transform: rotate(180deg);
        }

        h1,
        .display-4 {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            color: var(--text-color-primary);
            letter-spacing: -2px;
            font-size: 3rem;
            /* Adjusted for responsiveness */
            transition: color var(--transition-speed);
        }

        @media (min-width: 768px) {

            h1,
            .display-4 {
                font-size: 4rem;
            }
        }

        .form-control,
        .form-control:focus {
            background: var(--surface-color);
            border: none;
            border-radius: 12px;
            box-shadow: var(--inset-shadow-dark), var(--inset-shadow-light);
            font-weight: 700;
            padding: 0.9rem 1.2rem;
            color: var(--text-color-primary);
            transition: background var(--transition-speed), box-shadow var(--transition-speed), color var(--transition-speed);
        }

        .form-control::placeholder {
            color: var(--text-color-secondary);
            opacity: 0.8;
        }

        .btn {
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.2s ease-in-out;
            border: 1px solid var(--border-color-light);
            box-shadow: var(--shadow-dark), var(--shadow-light);
        }

        .btn:active {
            box-shadow: var(--inset-shadow-dark), var(--inset-shadow-light);
            transform: translateY(2px);
        }

        .btn-primary {
            background-color: var(--accent-color-blue);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: color-mix(in srgb, var(--accent-color-blue) 85%, white);
        }

        .btn-danger {
            background-color: var(--accent-color-red);
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: color-mix(in srgb, var(--accent-color-red) 85%, white);
        }

        .btn-outline-dark {
            color: var(--text-color-secondary);
        }

        .btn-outline-dark.active,
        .btn-outline-dark:hover {
            background-color: var(--text-color-primary);
            color: var(--surface-color);
        }

        .task-item .btn-sm {
            color: var(--text-color-primary);
        }

        .list-group-item {
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--border-color-dark);
            padding: 1.25rem 0.5rem;
            animation: popIn 0.5s ease both;
            opacity: 0;
            color: var(--text-color-primary);
            transition: border-color var(--transition-speed), color var(--transition-speed), transform 0.2s ease-in-out;
        }

        .list-group-item:hover {
            transform: scale(1.01);
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .task-item.is-completed .task-text {
            color: var(--text-color-secondary);
            text-decoration: line-through;
        }

        .progress {
            height: 1rem;
            background-color: var(--surface-color);
            border-radius: 10px;
            padding: 3px;
            box-shadow: var(--inset-shadow-dark), var(--inset-shadow-light);
            transition: background var(--transition-speed), box-shadow var(--transition-speed);
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--accent-color-blue), color-mix(in srgb, var(--accent-color-blue) 60%, var(--accent-color-red)));
            border-radius: 8px;
            transition: width 0.5s ease-in-out;
        }

        .pagination {
            --bs-pagination-border-radius: 10px;
            --bs-pagination-border-width: 0;
            --bs-pagination-color: var(--text-color-primary);
            --bs-pagination-focus-box-shadow: none;
            --bs-pagination-active-bg: var(--accent-color-blue);
            --bs-pagination-active-color: white;
        }

        .page-item .page-link {
            background-color: var(--surface-color);
            margin: 0 4px;
            box-shadow: var(--shadow-dark), var(--shadow-light);
        }

        .modal-title {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
        }

        .celebration-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 1060;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease;
        }

        .celebration-overlay.show {
            opacity: 1;
            pointer-events: auto;
        }

        .celebration-message {
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 3rem;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f00;
            opacity: 0;
            animation: fall 4s ease-out forwards;
        }

        @keyframes fall {
            0% {
                transform: translateY(0vh) rotateZ(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(105vh) rotateZ(720deg);
                opacity: 0;
            }
        }

        .summary-box {
            background: var(--surface-color);
            padding: 0.75rem;
            border-radius: 15px;
            box-shadow: var(--inset-shadow-dark), var(--inset-shadow-light);
            transition: background var(--transition-speed), box-shadow var(--transition-speed);
        }

        .summary-box h4 {
            color: var(--accent-color-blue);
            font-weight: 900;
            transition: color var(--transition-speed);
        }

        .summary-box small {
            font-weight: 700;
            color: var(--text-color-secondary) !important;
            transition: color var(--transition-speed);
        }
    </style>

    <!-- FIX: Inline script to prevent theme flashing -->
    <script>
        (() => {
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
</head>

<body>
    <div class="celebration-overlay" id="celebration-overlay">
        <div class="celebration-message">Kerja Bagus!</div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid col-xl-8 d-flex justify-content-between">
            <a class="navbar-brand" href="{{ route('todo') }}">SpectaList</a>
            <div class="d-flex align-items-center gap-3">
                <div id="live-clock"></div>
                <div class="theme-switcher" id="theme-switcher">
                    <i class="bi bi-moon-stars-fill"></i>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 50px;">
        <h1 class="text-center mb-5">Daftar Tugas Anda</h1>

        <div class="row justify-content-center">
            <div class="col-11 col-lg-10 col-xl-8">
                <div class="card mb-5">
                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success fw-bold" style="border-radius:12px;"> {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('todo.post') }}" method="post" id="add-task-form">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="task" placeholder="Tugas baru..." required
                                    value="{{ old('task') }}">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card p-4">
                    <!-- Summary -->
                    <div class="row text-center mb-4 g-2">
                        <div class="col-4">
                            <div class="summary-box">
                                <h4 class="fw-bold mb-0">{{ $data->total() }}</h4>
                                <small class="text-uppercase">Total</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="summary-box">
                                <h4 class="fw-bold mb-0">{{ $completed_count ?? '...' }}</h4>
                                <small class="text-uppercase">Selesai</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="summary-box">
                                <h4 class="fw-bold mb-0">{{ $pending_count ?? '...' }}</h4>
                                <small class="text-uppercase">Belum</small>
                            </div>
                        </div>
                    </div>

                    <div class="progress-container mb-4">
                        <div class="d-flex justify-content-between mb-1 fw-bold">
                            <span class="small">PROGRESS</span>
                            <span id="progress-text" class="small">0%</span>
                        </div>
                        <div class="progress">
                            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-dark active"
                                data-filter="all">Semua</button>
                            <button type="button" class="btn btn-sm btn-outline-dark"
                                data-filter="active">Aktif</button>
                            <button type="button" class="btn btn-sm btn-outline-dark"
                                data-filter="completed">Selesai</button>
                        </div>
                        <form action="{{ route('todo') }}" method="get" class="w-100 w-md-50">
                            <input type="text" class="form-control form-control-sm" name="search"
                                value="{{ request('search') }}" placeholder="Cari tugas...">
                        </form>
                    </div>

                    <ul class="list-group list-group-flush" id="todo-list">
                        @forelse ($data as $item)
                            <li class="list-group-item task-item @if($item->is_done) is-completed @endif"
                                data-status="{{ $item->is_done ? 'completed' : 'active' }}"
                                style="animation-delay: {{ $loop->index * 50 }}ms">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST"
                                            class="d-inline me-3 toggle-status-form">
                                            @csrf @method('put')
                                            <input type="hidden" name="task" value="{{ $item->task }}">
                                            <input type="hidden" name="is_done" value="{{ $item->is_done ? '0' : '1' }}">
                                            <button type="submit" class="btn btn-sm p-0 fs-3"
                                                style="color: var(--accent-color-blue); box-shadow:none; border:none; background:transparent;">
                                                <i
                                                    class="bi {{ $item->is_done ? 'bi-check-circle-fill' : 'bi-circle' }}"></i>
                                            </button>
                                        </form>
                                        <span class="task-text fs-5 fw-bold">{{ $item->task }}</span>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $item->id }}"><i
                                                class="bi bi-pencil-fill"></i></button>
                                        <button class="btn btn-sm delete-btn" data-form-id="delete-form-{{ $item->id }}"><i
                                                class="bi bi-x-lg"></i></button>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('todo.delete', ['id' => $item->id]) }}" method="POST"
                                            class="d-none"> @csrf @method('delete') </form>
                                    </div>
                                </div>
                            </li>
                            <div class="collapse" id="collapse-{{ $item->id }}">
                                <div class="p-3 mb-2" style="background: var(--bg-color-start); border-radius: 12px;">
                                    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf @method('put')
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="task" value="{{ $item->task }}"
                                                required>
                                            <input type="hidden" name="is_done" value="{{ $item->is_done }}">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center p-5">
                                <p class="fs-4 fw-bold">Tidak ada tugas!</p>
                                <p>Mulai tambahkan tugas baru di atas.</p>
                            </div>
                        @endforelse
                    </ul>

                    @if ($data->hasPages())
                        <div class="d-flex justify-content-center mt-4"> {{ $data->links() }} </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin menghapus tugas ini secara permanen?</div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Batal</button><button type="button" class="btn btn-danger"
                        id="confirmDeleteBtn">Hapus</button></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.7.77/Tone.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- Theme Manager ---
            const themeSwitcher = document.getElementById('theme-switcher');
            const themeIcon = themeSwitcher.querySelector('i');
            const htmlEl = document.documentElement;

            const setTema = (theme) => {
                htmlEl.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
                themeIcon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
            };

            const currentTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            setTema(currentTheme);

            themeSwitcher.addEventListener('click', () => {
                themeSwitcher.classList.add('switching');
                const newTheme = htmlEl.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                setTema(newTheme);
                themeSwitcher.addEventListener('transitionend', () => {
                    themeSwitcher.classList.remove('switching');
                }, { once: true });
            });

            // --- Celebration & Confetti ---
            const celebrationOverlay = document.getElementById('celebration-overlay');
            function createConfetti() {
                const colors = ['#5a82ff', '#ff5a7b', '#ffd700', '#00ff7f', '#ffffff'];
                for (let i = 0; i < 150; i++) {
                    const confetti = document.createElement('div');
                    confetti.classList.add('confetti');
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDelay = Math.random() * 2 + 's';
                    confetti.style.width = (Math.random() * 8 + 5) + 'px';
                    confetti.style.height = (Math.random() * 8 + 5) + 'px';
                    confetti.style.opacity = Math.random() * 0.5 + 0.5;
                    celebrationOverlay.appendChild(confetti);
                    confetti.addEventListener('animationend', () => { confetti.remove(); });
                }
            }

            // --- Sound Engine ---
            let synth;
            const playSound = (type) => { if (!synth) return; switch (type) { case 'add': synth.triggerAttackRelease('C5', '16n'); break; case 'complete': synth.triggerAttackRelease('G5', '16n'); break; case 'delete': synth.triggerAttackRelease('C4', '16n'); break; case 'hover': synth.triggerAttackRelease('E6', '64n', Tone.now(), 0.3); break; case 'celebrate': synth.triggerAttackRelease('C6', '8n'); break; } };
            document.body.addEventListener('click', () => { if (!synth) { synth = new Tone.Synth({ volume: -12, oscillator: { type: 'sine' }, envelope: { attack: 0.005, decay: 0.1, sustain: 0.3, release: 1 } }).toDestination(); } }, { once: true });

            // --- Live Clock ---
            const clockEl = document.getElementById('live-clock');
            const updateClock = () => { const now = new Date(); const time = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }); clockEl.textContent = time; };
            setInterval(updateClock, 1000);
            updateClock();

            // --- Progress Bar ---
            const updateProgress = () => {
                const allTasks = document.querySelectorAll('.task-item');
                const progressText = document.getElementById('progress-text');
                const progressBar = document.getElementById('progress-bar');

                if (allTasks.length === 0) {
                    progressBar.style.width = '0%';
                    progressText.textContent = '0%';
                    return;
                }

                const completedTasks = document.querySelectorAll('.task-item.is-completed');
                const pendingTasks = document.querySelectorAll('.task-item.is-pending'); // ⬅️ Tambahan

                const percentage = Math.round((completedTasks.length / allTasks.length) * 100);
                progressBar.style.width = percentage + '%';
                progressText.textContent = percentage + '%';

                // (Opsional: kalau mau tampilkan jumlahnya juga)
                console.log(`Total: ${allTasks.length}, Done: ${completedTasks.length}, Belum: ${pendingTasks.length}`);

                if (percentage === 100 && !celebrationOverlay.classList.contains('show')) {
                    celebrationOverlay.classList.add('show');
                    createConfetti();
                    playSound('celebrate');
                    setTimeout(() => { celebrationOverlay.classList.remove('show'); }, 5000);
                }
            };


            // --- Custom Delete Modal Logic ---
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            let formToSubmit = null;
            document.querySelectorAll('.delete-btn').forEach(button => { button.addEventListener('click', (e) => { formToSubmit = e.currentTarget.dataset.formId; deleteModal.show(); playSound('delete'); }); });
            document.getElementById('confirmDeleteBtn').addEventListener('click', () => { if (formToSubmit) { const form = document.getElementById(formToSubmit); const item = form.closest('.list-group-item'); item.style.transition = 'transform 0.3s ease, opacity 0.3s ease'; item.style.transform = 'scale(0.9)'; item.style.opacity = '0'; setTimeout(() => form.submit(), 300); } });

            // --- Task Filters ---
            const filterButtons = document.querySelectorAll('[data-filter]');
            filterButtons.forEach(button => { button.addEventListener('click', (e) => { filterButtons.forEach(btn => btn.classList.remove('active')); const target = e.currentTarget; target.classList.add('active'); const filter = target.dataset.filter; document.querySelectorAll('.task-item').forEach(item => { item.style.display = ''; if (filter !== 'all' && item.dataset.status !== filter) { item.style.display = 'none'; } }); }); });

            // --- Sound Triggers & Initializations ---
            document.getElementById('add-task-form')?.addEventListener('submit', () => playSound('add'));
            document.querySelectorAll('.toggle-status-form').forEach(form => form.addEventListener('submit', () => playSound('complete')));
            document.querySelectorAll('button, a, input').forEach(el => el.addEventListener('mouseenter', () => playSound('hover')));
            updateProgress();
        });
    </script>
</body>

</html>