<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= $title ?? 'Badminton Club' ?></title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec1337",
                        "primary-dark": "#b80f2b",
                        "background-light": "#f8f6f6",
                        "background-dark": "#181112",
                        "card-dark": "#271c1d",
                        "border-dark": "#39282b",
                        "text-muted": "#b99da1"
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Lexend', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-background-dark text-slate-100 min-h-screen flex flex-col font-display selection:bg-primary selection:text-white overflow-x-hidden">

    <header class="sticky top-0 z-50 w-full border-b border-solid border-b-border-dark bg-background-dark/80 backdrop-blur-md px-6 py-4">
        <div class="layout-container mx-auto flex max-w-[1280px] items-center justify-between">
            <div class="flex items-center gap-3 text-white">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white">
                    <span class="material-symbols-outlined text-xl">sports_tennis</span>
                </div>
                <h2 class="text-xl font-bold leading-tight tracking-tight">Klub Badminton</h2>
            </div>
            <nav class="hidden md:flex flex-1 justify-center gap-8">
                <a class="text-primary transition-colors text-sm font-bold" href="/anggota">Daftar Anggota</a>
            </nav>
        </div>
    </header>

    <main class="flex-1 py-10 px-6">
        <?= $this->renderSection('content'); ?>
    </main>

    <footer class="border-t border-border-dark bg-background-dark py-8 px-6 text-center">
        <p class="text-xs text-text-muted">© <?= date('Y') ?> Sistem Manajemen Klub Badminton.</p>
    </footer>

</body>
</html>