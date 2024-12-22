<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSSのCDN版を今回は使います（時短のためです） -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <main class="px-2 md:px-0 py-8">
            <div class="bg-white px-4 py-8 container rounded-lg shadow-xl w-full max-w-md mx-auto">
					    <h1 class="text-2xl font-bold mb-8 text-center text-gray-800">
					        アイコン情報詳細
					    </h1>
					
					    <div class="mb-6">
					        <h2 class="block text-gray-700 text-sm font-bold mb-2">
					            アイコン画像
					        </h2>
					        <div class="mt-4">
			                <p class="text-gray-600 text-sm">ここに画像が入ります</p>
					        </div>
					    </div>
					
					    <div class="mb-6">
					        <h2 class="block text-gray-700 text-sm font-bold mb-2">
					            タイトル
					        </h2>
					        <p class="text-gray-700 py-2 px-3">
					            ここにタイトルが入ります
					        </p>
					    </div>
					
					    <div class="mb-6">
					        <h2 class="block text-gray-700 text-sm font-bold mb-2">
					            説明
					        </h2>
					        <p class="text-gray-700 py-2 px-3 whitespace-pre-wrap">
					            ここに説明が入ります
					        </p>
					    </div>
					
					    <div class="flex flex-col gap-8 items-center justify-center">
					        <a href="{{ url('dashboard') }}"
					            class="w-60 text-black text-center border font-bold py-4 px-4 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
					            一覧に戻る
					        </a>
					    </div>
            </div>
        </main>
    </div>
</body>
</html>