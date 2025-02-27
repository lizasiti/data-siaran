@extends('layouts.template')

@section('content')

<h1>Dashboard</h1>
<div class="dashboard">
    <div class="card">
        <h3><a href="{{ route('penyiar.index') }}" class="dashboard-link">Penyiar</a></h3>
    </div>
</div><br>


    <!-- Profil PR02 -->
    <div class="bg-primary rounded-lg shadow-lg p-6 relative">
        <!-- Desain Background -->
        <div class="absolute top-0 left-0 w-full h-full bg-pink-300 -z-10 rounded-lg"></div>
        <div class="absolute top-0 left-0 w-full h-full border-4 border-white -z-10 rounded-lg"></div> <br>
        
        <!-- Header -->
        <div class="flex justify-center items-center mb-4 w-full">
            <h2 class="text-2xl font-bold text-gray-800 text-center w-full">Profil PR02</h2>
        </div>

        <!-- Konten Profil -->
        <div class="bg-white p-4 rounded-lg shadow-md border border-gray-300">
            <table class="w-full text-sm">
                <tbody>
                    <tr class="border-b bg-blue-900 text-black">
                    <td class="font-semibold p-2 w-1/3">Format Program</td>
                    <td class="p-2">Music and Life Style</td>
                 </tr>

                    <tr class="border-b">
                        <td class="font-semibold p-2 w-1/3">Tag Line</td>
                        <td class="p-2">Teman Terbaik Kamu</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Call Station</td>
                        <td class="p-2">94.6 Pro 2 Sumenep... Teman Terbaik Kamu</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Semboyan Instansi</td>
                        <td class="p-2">Sekali Di Udara Tetap Di Udara</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Segmentasi</td>
                        <td class="p-2">15 - 30 Tahun</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Pendidikan</td>
                        <td class="p-2">SMP - S1</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">SES</td>
                        <td class="p-2">A - B - C (Menengah)</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Sasaran Wilayah</td>
                        <td class="p-2">Kabupaten / Kota</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Sapaan</td>
                        <td class="p-2">Teman Pro2</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Promina Persona Orang Kedua</td>
                        <td class="p-2">Kamu</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Pola Program</td>
                        <td class="p-2">Pola Blok dan Kapsul dengan Pendekatan Narrowcasting (Segmented)</td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Klasifikasi Dan Persentasi Siaran</td>
                        <td class="p-2">
                            Informasi dan Berita        : 20% <br>
                            Hiburan/Musik               : 50% <br>
                            Pendidikan                  : 10% <br>
                            Budaya                      : 10% <br>
                            Iklan/ILM/Filter/Penunjang  : 10% <br>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-2">Komposisi Musik</td>
                        <td class="p-2">Lagu Indonesia: 60% | Lagu Mancanegara: 40%</td>
                    </tr>
                    <tr>
                        <td class="font-semibold p-2">Durasi Siaran</td>
                        <td class="p-2">19 Jam</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
