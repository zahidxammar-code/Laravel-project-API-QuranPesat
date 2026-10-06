<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Qur'an — Islamic Quotes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Public+Sans:wght@400;500;600;700&family=Source+Serif+4:ital,opsz,wght@0,8..60,500;1,8..60,400&display=swap" rel="stylesheet">
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

        .arab {
            font-family: 'Amiri', serif;
        }

        a:focus-visible,
        input:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
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

        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="max-w-xl">
                <h1 class="serif text-3xl md:text-4xl font-medium text-[var(--green-deep)]">Al-Qur'an</h1>
                <p class="mt-3 text-[var(--muted)] leading-relaxed">Pilih surat untuk membaca ayat, transliterasi, dan mendengarkan bacaannya.</p>
            </div>

            <div class="w-full md:w-72">
                <label for="cari" class="sr-only">Cari surat</label>
                <input id="cari" type="search" placeholder="Cari nama atau nomor surat"
                    class="w-full rounded-md border border-[var(--line)] bg-[var(--paper)] px-4 py-2.5 text-sm placeholder:text-[var(--muted)] focus:border-[var(--green)]">
            </div>
        </div>

        <ul id="daftar" class="mt-10 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($quran as $q)
            <li data-cari="{{ strtolower($q['namaLatin']) }} {{ $q['nomor'] }}">
                <a href="{{ route('quran.show', $q['nomor']) }}"
                    class="flex items-center gap-4 rounded-md border border-[var(--line)] bg-[var(--paper)] px-4 py-4 transition-colors hover:border-[var(--green)]">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[var(--green)] text-sm font-semibold text-[var(--paper)]">
                        {{ $q['nomor'] }}
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block truncate font-semibold">{{ $q['namaLatin'] }}</span>
                        <span class="block text-sm text-[var(--muted)]">Lihat detail surat</span>
                    </span>
                    <span class="arab text-2xl text-[var(--green-deep)]" dir="rtl">{{ $q['nama'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>

        <p id="kosong" class="mt-10 hidden text-[var(--muted)]">Surat tidak ditemukan. Coba kata kunci lain.</p>
    </main>

    <footer class="border-t border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-6 text-sm text-[var(--muted)]">
            &copy; {{ date('Y') }} Islamic Quotes
        </div>
    </footer>

    <script>
        const cari = document.getElementById('cari');
        const items = document.querySelectorAll('#daftar li');
        const kosong = document.getElementById('kosong');

        cari.addEventListener('input', () => {
            const kata = cari.value.trim().toLowerCase();
            let tampil = 0;
            items.forEach(li => {
                const cocok = li.dataset.cari.includes(kata);
                li.classList.toggle('hidden', !cocok);
                if (cocok) tampil++;
            });
            kosong.classList.toggle('hidden', tampil > 0);
        });
    </script>
</body>

</html>