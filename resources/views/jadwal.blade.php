<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Shalat — Islamic Quotes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&family=Source+Serif+4:ital,opsz,wght@0,8..60,500;1,8..60,400&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        :root {
            --sand: #E8E3D6;
            --paper: #F6F3EB;
            --ink: #1F2A26;
            --muted: #5E6A64;
            --line: #CFC8B6;
            --green: #1E4D45;
            --green-deep: #153A34;
            --gold: #B08D3C;
        }

        body {
            font-family: 'Public Sans', system-ui, sans-serif;
            background: var(--sand);
            color: var(--ink);
        }

        .serif {
            font-family: 'Source Serif 4', Georgia, serif;
        }

        a:focus-visible,
        select:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
        }

        td,
        th {
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col antialiased">

    <header class="border-b border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-5 flex items-center justify-between">
            <a href="{{ url('/') }}" class="serif text-xl font-medium text-[var(--green-deep)]">Islamic Quotes</a>

            <a href="{{ url('/') }}"
                class="inline-flex items-center gap-2 rounded-md border border-[var(--line)] bg-[var(--paper)] px-4 py-2 text-sm font-medium text-[var(--green)] transition-colors hover:border-[var(--green)] hover:bg-[var(--green)] hover:text-[var(--paper)]">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
                Kembali
            </a>
        </div>
    </header>

    <main class="flex-grow mx-auto w-full max-w-5xl px-6 py-12 md:py-16">

        <div class="max-w-xl">
            <h1 class="serif text-3xl md:text-4xl font-medium text-[var(--green-deep)]">Jadwal Shalat</h1>
            <p class="mt-3 text-[var(--muted)] leading-relaxed">Pilih provinsi dan kabupaten/kota untuk melihat jadwal shalat bulan ini.</p>
        </div>

        {{-- Pilih lokasi --}}
        <div class="mt-8 grid gap-4 rounded-md border border-[var(--line)] bg-[var(--paper)] p-5 md:grid-cols-2 md:p-6">
            <div>
                <label for="provinsi" class="text-sm font-medium">Provinsi</label>
                <select id="provinsi"
                    class="mt-1.5 w-full rounded-md border border-[var(--line)] bg-white px-3 py-2.5 text-sm focus:border-[var(--green)]">
                    <option value="">Pilih provinsi</option>
                    @foreach ($provinsi as $p)
                    <option value="{{ $p }}">{{ $p }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="kabkota" class="text-sm font-medium">Kabupaten/Kota</label>
                <select id="kabkota" disabled
                    class="mt-1.5 w-full rounded-md border border-[var(--line)] bg-white px-3 py-2.5 text-sm focus:border-[var(--green)] disabled:bg-[var(--sand)] disabled:text-[var(--muted)]">
                    <option value="">Pilih kabupaten/kota</option>
                </select>
            </div>
        </div>

        {{-- Hasil --}}
        <section id="hasil" class="mt-12 hidden" aria-live="polite">
            <h2 id="info" class="serif text-2xl font-medium text-[var(--green-deep)]"></h2>
            <p id="info-sub" class="mt-1 text-[var(--muted)]"></p>

            <div id="kartu-hari-ini" class="mt-6 hidden rounded-md bg-[var(--green)] px-6 py-8 text-[var(--paper)] md:px-10">
                <p id="label-hari" class="text-sm text-[#D9D2BC]"></p>
                <dl id="hari-ini" class="mt-5 grid grid-cols-2 gap-x-4 gap-y-6 sm:grid-cols-5"></dl>
            </div>

            <div class="mt-6 overflow-x-auto rounded-md border border-[var(--line)] bg-[var(--paper)]">
                <table class="w-full min-w-[640px] text-left text-sm">
                    <thead class="border-b border-[var(--line)] text-[var(--muted)]">
                        <tr>
                            <th class="px-4 py-3 font-medium">Tanggal</th>
                            <th class="px-4 py-3 font-medium">Imsak</th>
                            <th class="px-4 py-3 font-medium">Subuh</th>
                            <th class="px-4 py-3 font-medium">Terbit</th>
                            <th class="px-4 py-3 font-medium">Dhuha</th>
                            <th class="px-4 py-3 font-medium">Dzuhur</th>
                            <th class="px-4 py-3 font-medium">Ashar</th>
                            <th class="px-4 py-3 font-medium">Maghrib</th>
                            <th class="px-4 py-3 font-medium">Isya</th>
                        </tr>
                    </thead>
                    <tbody id="tabel" class="divide-y divide-[var(--line)]"></tbody>
                </table>
            </div>
        </section>

        <p id="status" class="mt-10 hidden text-[var(--muted)]"></p>
    </main>

    <footer class="border-t border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-6 text-sm text-[var(--muted)]">
            &copy; {{ date('Y') }} Islamic Quotes
        </div>
    </footer>

    <script>
        const provinsi = document.getElementById('provinsi');
        const kabkota = document.getElementById('kabkota');
        const hasil = document.getElementById('hasil');
        const info = document.getElementById('info');
        const infoSub = document.getElementById('info-sub');
        const tabel = document.getElementById('tabel');
        const hariIni = document.getElementById('hari-ini');
        const kartuHari = document.getElementById('kartu-hari-ini');
        const labelHari = document.getElementById('label-hari');
        const status = document.getElementById('status');

        const NAMA = {
            subuh: 'Subuh',
            dzuhur: 'Dzuhur',
            ashar: 'Ashar',
            maghrib: 'Maghrib',
            isya: 'Isya'
        };

        function tampilStatus(teks) {
            status.textContent = teks;
            status.classList.toggle('hidden', !teks);
        }

        function reset() {
            hasil.classList.add('hidden');
            kartuHari.classList.add('hidden');
            tabel.innerHTML = hariIni.innerHTML = '';
            tampilStatus('');
        }

        provinsi.addEventListener('change', async () => {
            kabkota.innerHTML = '<option value="">Pilih kabupaten/kota</option>';
            kabkota.disabled = true;
            reset();
            if (!provinsi.value) return;

            tampilStatus('Memuat daftar kabupaten/kota...');
            try {
                const res = await fetch(`{{ url('/jadwal/kabkota') }}?provinsi=${encodeURIComponent(provinsi.value)}`);
                const list = await res.json();
                list.forEach(k => kabkota.add(new Option(k, k)));
                kabkota.disabled = false;
                tampilStatus('');
            } catch (e) {
                tampilStatus('Daftar kabupaten/kota gagal dimuat. Coba pilih provinsi lagi.');
            }
        });

        kabkota.addEventListener('change', async () => {
            reset();
            if (!kabkota.value) return;
            tampilStatus('Memuat jadwal...');

            try {
                const res = await fetch(`{{ url('/jadwal/data') }}?provinsi=${encodeURIComponent(provinsi.value)}&kabkota=${encodeURIComponent(kabkota.value)}`);
                const data = await res.json();
                const jadwal = data.jadwal ?? [];

                info.textContent = data.kabkota;
                infoSub.textContent = `${data.provinsi} · ${data.bulan_nama ?? data.bulan} ${data.tahun}`;

                const today = new Date().getDate();

                tabel.innerHTML = jadwal.map(j => `
            <tr class="${Number(j.tanggal) === today ? 'bg-[#E3EBE6] font-semibold' : ''}">
                <td class="px-4 py-2.5">${j.tanggal}</td>
                <td class="px-4 py-2.5">${j.imsak}</td>
                <td class="px-4 py-2.5">${j.subuh}</td>
                <td class="px-4 py-2.5">${j.terbit}</td>
                <td class="px-4 py-2.5">${j.dhuha}</td>
                <td class="px-4 py-2.5">${j.dzuhur}</td>
                <td class="px-4 py-2.5">${j.ashar}</td>
                <td class="px-4 py-2.5">${j.maghrib}</td>
                <td class="px-4 py-2.5">${j.isya}</td>
            </tr>`).join('');

                const t = jadwal.find(j => Number(j.tanggal) === today);
                if (t) {
                    labelHari.textContent = `Hari ini, tanggal ${today}`;
                    hariIni.innerHTML = Object.entries(NAMA).map(([k, label]) => `
                <div>
                    <dt class="text-sm text-[#D9D2BC]">${label}</dt>
                    <dd class="serif mt-1 text-3xl font-medium">${t[k]}</dd>
                </div>`).join('');
                    kartuHari.classList.remove('hidden');
                }

                tampilStatus('');
                hasil.classList.remove('hidden');
            } catch (e) {
                tampilStatus('Jadwal gagal dimuat. Coba pilih lokasi lagi.');
            }
        });
    </script>
</body>

</html>