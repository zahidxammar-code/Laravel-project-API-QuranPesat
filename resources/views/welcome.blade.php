<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Islamic Quotes</title>

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
        body { font-family: 'Public Sans', system-ui, sans-serif; background: var(--sand); color: var(--ink); }
        .serif { font-family: 'Source Serif 4', Georgia, serif; }
        a:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased">

    {{-- Header --}}
    <header class="border-b border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-5 flex items-center justify-between">
            <a href="{{ url('/') }}" class="serif text-xl font-medium text-[var(--green-deep)]">Islamic Quotes</a>
        </div>
    </header>

    <main class="flex-grow mx-auto w-full max-w-5xl px-6 py-12 md:py-16">

        {{-- Kutipan utama --}}
        <section aria-labelledby="judul" class="max-w-3xl">
            <h1 id="judul" class="serif text-3xl md:text-4xl font-medium leading-tight text-[var(--green-deep)]">
                Kutipan hari ini
            </h1>
            <p class="mt-3 text-[var(--muted)] leading-relaxed">
                Satu kalimat untuk direnungkan sebelum memulai aktivitas.
            </p>
        </section>

        @isset($quotes)
        <figure class="mt-8 rounded-md bg-[var(--green)] text-[var(--paper)] px-7 py-10 md:px-12 md:py-14">
            <blockquote>
                <p class="serif italic text-2xl md:text-[2rem] leading-[1.45] max-w-3xl">
                    &ldquo;{{ $quotes['quote'] }}&rdquo;
                </p>
            </blockquote>
            <figcaption class="mt-6 flex items-center gap-3 text-sm text-[#D9D2BC]">
                <span class="h-px w-8 bg-[var(--gold)]" aria-hidden="true"></span>
                <span>{{ $quotes['author'] }}</span>
            </figcaption>
        </figure>
        @endisset

        {{-- Menu --}}
        <section aria-labelledby="menu" class="mt-14">
            <h2 id="menu" class="serif text-2xl font-medium text-[var(--green-deep)]">Demo API lainnya</h2>

            <div class="mt-6 grid gap-4 md:grid-cols-3">

                <a href="{{ url('/quran') }}"
                   class="group block rounded-md border border-[var(--line)] bg-[var(--paper)] p-6 transition-colors hover:border-[var(--green)]">
                    <svg class="h-7 w-7 text-[var(--green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 4h6a4 4 0 0 1 4 4v13a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 4h-6a4 4 0 0 0-4 4v13a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <h3 class="mt-5 text-lg font-semibold">Al-Qur'an</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-[var(--muted)]">
                        Baca 114 surah lengkap dengan teks Arab dan terjemahan.
                    </p>
                </a>

                <a href="{{ url('/doa') }}"
                   class="group block rounded-md border border-[var(--line)] bg-[var(--paper)] p-6 transition-colors hover:border-[var(--green)]">
                    <svg class="h-7 w-7 text-[var(--green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/>
                    </svg>
                    <h3 class="mt-5 text-lg font-semibold">Doa Harian</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-[var(--muted)]">
                        Kumpulan doa untuk aktivitas sehari-hari, dari bangun tidur sampai tidur lagi.
                    </p>
                </a>

                <a href="{{ url('/jadwal') }}"
                   class="group block rounded-md border border-[var(--line)] bg-[var(--paper)] p-6 transition-colors hover:border-[var(--green)]">
                    <svg class="h-7 w-7 text-[var(--green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 2"/>
                    </svg>
                    <h3 class="mt-5 text-lg font-semibold">Jadwal Shalat</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-[var(--muted)]">
                        Waktu shalat lima waktu sesuai kota Anda.
                    </p>
                </a>
                

            </div>
        </section>
    </main>

    <footer class="border-t border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-6 text-sm text-[var(--muted)]">
            &copy; {{ date('Y') }} Islamic Quotes
        </div>
        
    </footer>

</body>
</html>