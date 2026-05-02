<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Flowral | Workspace</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    <style>
        body {
            background-color: #f5fafb;
            color: #171d1e;
        }

        .bg-gradient-primary-cta {
            background: linear-gradient(135deg, #316574, #81b4c5);
        }
    </style>
</head>

<body class="font-body antialiased flex flex-col min-h-screen">
    <!-- TopAppBar Component -->
    <x-landing.navbar></x-landing.navbar>

    <!-- Hero Section -->
    <x-landing.main></x-landing.main>

    <!-- Footer Component -->
    <x-landing.footer></x-landing.footer>

</body>

</html>
