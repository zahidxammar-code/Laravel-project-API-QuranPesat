<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Quotes — Temukan Inspirasi Harimu</title>
    <!-- Google Fonts & Tailwind CSS CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,400&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .quote-font {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-[#D2B48C] text-[#4A3B32] min-h-screen flex flex-col justify-between selection:bg-[#D7CCC8]">

    <!-- Main Content / Hero Section -->
    <main class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="max-w-2xl w-full text-center space-y-8">
            
            <!-- Judul & Deskripsi -->
            <div class="space-y-3">
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-[#3E2723]">
                    Welcome to the Quotes App
                </h1>
                <p class="text-[#5C4033] text-base md:text-lg font-medium">
                    Ruang tenang untuk meresapi kata-kata penuh makna setiap harinya.
                </p>
            </div>

            
            @if(isset($quotes))
            <div class="relative bg-[#FAF6F0] border border-[#E3DCD2] p-8 md:p-12 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 group">
                <!-- Aksen Tanda Kutip Estetik di Background -->
                <div class="absolute top-4 left-6 text-6xl text-[#D2B48C] opacity-40 quote-font select-none">“</div>
                
                <div class="relative z-10 space-y-6">
                    <p class="quote-font italic text-2xl md:text-3xl text-[#3E2723] leading-relaxed">
                        "{{ $quotes['quote'] }}"
                    </p>
                    
                    <div class="inline-block border-t border-[#E3DCD2] pt-4 px-6">
                        <span class="text-sm font-semibold tracking-wide uppercase text-[#795548]">
                            — {{ $quotes['author'] }}
                        </span>
                    </div>
                </div>
            </div>
            
            @endif

        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-xs text-[#5C4033] font-medium">
        &copy; {{ date('Y') }} Quotes App. 
    </footer>

</body>
</html>