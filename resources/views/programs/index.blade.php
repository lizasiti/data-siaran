<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RRI Pro 2 Sumenep (94.6 FM)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .banner {
            text-align: center;
            padding: 30px;
            background-color: #0056b3;
            color: white;
            font-size: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-container input, .form-container button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="banner">Selamat datang di RRI Pro 2 Sumenep 94.6 FM</div>
    </div>
    <div class="container" id="schedule-pro2">
        <div class="grid">
        @foreach ($programsPro2Today as $program)
    <div class="card">
        <h2>{{ $program->nama_program }}</h2>
        <p><strong>{{ $program->waktu }}</strong></p>
        <p>{{ $program->deskripsi }}</p>
    </div>
@endforeach
        </div>
    </div>
    
    <!-- Jadwal Program Pro2 Today -->
    <div class="container" id="schedule-pro2">
        <h1>Pro2 Today</h1>
        <div class="grid" id="schedule-list-pro2"></div>
    </div>

    <script>
        // Jadwal program siaran Pro2 Today
        let programsPro2Today = [
            { time: "06:00 - 09:00", name: "SPADA", description: "Diskusi interaktif tentang topik aktual." },
            { time: "06:30",         name: "TEKA TEKI SUMENEP", description: "Kuis berbahasa Madura untuk menguji pengetahuan budaya lokal." },
            { time: "07.00 - 08.00", name: "AKU PILIH KAMU", description: "Mengajak pendengar memilih salah satu pilihan seru dengan gimmick kreatif dan interaktif." },
            { time: "10:00 - 12:00", name: "PRO2 HITLIST", description: "Mengulas lagu-lagu hits terbaru." },
            { time: "12:00 - 16:00", name: "SANTAI SIANG", description: "Program siang yang berisi (Dengan format majalah udara)." },
            { time: "16:00 - 20:00", name: "SORE CERIA", description: "Program dengan musik ceria dan obrolan santai di sore hari." },
            { time: "20:00 - 24:00", name: "JAGA MALAM", description: "Musik santai menemani malam hingga tengah malam." }
        ];

        const scheduleContainerPro2 = document.getElementById("schedule-list-pro2");

        // Fungsi untuk menampilkan program siaran
        function displaySchedule() {
            scheduleContainerPro2.innerHTML = ''; // Clear existing content
            programsPro2Today.forEach(program => {
                const card = document.createElement("div");
                card.classList.add("card");
                card.innerHTML = `
                    <h2>${program.name}</h2>
                    <p><strong>${program.time}</strong></p>
                    <p>${program.description}</p>
                `;
                scheduleContainerPro2.appendChild(card);
            });
        }

        // Panggil fungsi untuk pertama kali
        displaySchedule();

        // Menangani pengiriman formulir
        const formBahanSiaran = document.getElementById("form-bahan-siaran");
        formBahanSiaran.addEventListener("submit", function (event) {
            event.preventDefault();

            // Mengambil nilai input dari form
            const time = document.getElementById("time").value;
            const name = document.getElementById("name").value;
            const description = document.getElementById("description").value;

            // Menambahkan bahan siaran ke dalam array
            programsPro2Today.push({ time, name, description });

            // Menampilkan jadwal yang telah diperbarui
            displaySchedule();

            // Reset form setelah submit
            formBahanSiaran.reset();
        });
    </script>

    <!-- Jadwal Program Weekly -->
    <div class="container" id="schedule-weekly">
        <h1>Program WEEKLY</h1>
        <div class="grid" id="schedule-list-weekly"></div>
    </div>

    <script>
        const programsWeekly = [
            { time: "16:00 - 17:00", name: "RESENSI BUKU", description: "Mengulas buku - buku menarik dengan pembahasan ringan dan informatif.", day: "Sabtu" },
            { time: "14:00 - 16:00", name: "TOP 20 COUNTDOWN", description: "Mengulas lagu terpopuler dari Indo dan Inter.", day: "Sabtu" },
            { time: "16:00 - 17:00", name: "PRO2 CLASS", description: "Program edukatif yang menyajikan informasi dan wawasan menarik.", day: "Minggu" },
            { time: "20:00 - 21:00", name: "SINGLE OF THE WEEK", description: "Mengulas 20 lagu terpopuler minggu ini.", day: "Minggu" },
        ];

        const scheduleContainerWeekly = document.getElementById("schedule-list-weekly");
        programsWeekly.forEach(program => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.innerHTML = `
                <h2>${program.name}</h2>
                <p><strong>${program.time}</strong> - <em>${program.day}</em></p>
                <p>${program.description}</p>
            `;
            scheduleContainerWeekly.appendChild(card);
        });
    </script>

</body>
</html>
