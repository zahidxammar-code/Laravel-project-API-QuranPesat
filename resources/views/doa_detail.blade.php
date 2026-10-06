@php $doa = $doa['data'] ?? $doa; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $doa['nama'] }} — Islamic Quotes</title>

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
        body { font-family: 'Public Sans', system-ui, sans-serif; background: var(--sand); color: var(--ink); }
        .serif { font-family: 'Source Serif 4', Georgia, serif; }
        .arab { font-family: 'Amiri', serif; }
        a:focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased">

    <header class="border-b border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-5 flex items-center justify-between">
            <a href="{{ url('/') }}" class="serif text-xl font-medium text-[var(--green-deep)]">Islamic Quotes</a>

        </div>
    </header>

    <main class="flex-grow mx-auto w-full max-w-4xl px-6 py-10 md:py-14">

        <a href="{{ route('doa.index') }}" class="inline-flex items-center gap-2 text-sm text-[var(--muted)] hover:text-[var(--green)]">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
            Kembali ke daftar doa
        </a>

        {{-- Header doa --}}
        <section class="mt-6 rounded-md bg-[var(--green)] px-7 py-10 text-center text-[var(--paper)] md:px-12 md:py-12">
            <p class="text-sm text-[#D9D2BC]">{{ $doa['grup'] }}</p>
            <h1 class="serif mt-2 text-2xl md:text-3xl font-medium leading-snug">{{ $doa['nama'] }}</h1>

            @if (!empty($doa['tag']))
            <ul class="mt-5 flex flex-wrap justify-center gap-2">
                @foreach ($doa['tag'] as $t)
                <li class="rounded-full border border-[#5B8079] px-3 py-0.5 text-xs text-[#D9D2BC]">{{ $t }}</li>
                @endforeach
            </ul>
            @endif
        </section>

        {{-- Isi doa --}}
        <div class="mt-8 divide-y divide-[var(--line)] rounded-md border border-[var(--line)] bg-[var(--paper)]">

            <section class="px-5 py-7 md:px-8">
                <p class="arab text-3xl md:text-4xl leading-[2.1] text-[var(--green-deep)]" dir="rtl">{{ $doa['ar'] }}</p>
            </section>

            <section class="px-5 py-6 md:px-8">
                <h2 class="text-sm font-semibold text-[var(--green)]">Latin</h2>
                <p class="mt-2 italic leading-relaxed text-[var(--muted)]">{{ $doa['tr'] }}</p>
            </section>

            <section class="px-5 py-6 md:px-8">
                <h2 class="text-sm font-semibold text-[var(--green)]">Artinya</h2>
                <p class="mt-2 leading-relaxed">{{ $doa['idn'] }}</p>
            </section>

            @if (!empty($doa['tentang']))
            <section class="px-5 py-6 md:px-8">
                <h2 class="text-sm font-semibold text-[var(--green)]">Keterangan dan sumber</h2>
                <p class="mt-2 text-sm leading-relaxed text-[var(--muted)] whitespace-pre-line">{{ $doa['tentang'] }}</p>
            </section>
            @endif
        </div>
    </main>

    <footer class="border-t border-[var(--line)]">
        <div class="mx-auto max-w-5xl px-6 py-6 text-sm text-[var(--muted)]">
            &copy; {{ date('Y') }} Islamic Quotes
        </div>
    </footer>

</body>
</html>