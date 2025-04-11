<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRI Pro 2 Sumenep (94.6 FM)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
        /* Mengatur warna latar belakang dan font */
        body {
            display: flex;
            min-height: 100vh;
            background-color: white;
            font-family: 'Arial', sans-serif;
            color: black;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar h2 {
            text-align: center;
            padding: 15px 0;
            margin: 0;
            font-weight: bold;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: left;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: white;
            color: #007bff;
        }

        /* Konten utama */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
            transition: margin-left 0.3s;
            background-color: white;
        }

        .main-content.collapsed {
            margin-left: 80px;
        }

        /* Dashboard */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #007bff;
            text-align: center;
            transition: transform 0.3s ease;
            border: 1px solid #007bff;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #007bff;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Tombol */
        button {
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: white;
            color: #007bff;
            border: 1px solid #007bff;
        }

        /* Responsif */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar.collapsed {
                width: 100%;
            }

            .main-content {
                padding: 10px;
                margin-left: 0;
            }
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="sidebar" id="sidebar">
        <h2>PRO 2</h2>
        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/shift_penyiaran">Rekap Shift</a></li>
            <li><a href="/data_siaran">Data Siaran</a></li>
            <li><a href="/programs">Info Pro2</a></li>
            <li><a href="/jadwal-siaran">Jadwal Siaran</a></li>
            <li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>


        </ul>


    </div>

    <div class="main-content" id="main-content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('main-content').classList.toggle('collapsed');
        }
    </script>
    <script
        type="text/javascript"
        src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>