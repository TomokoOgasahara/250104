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
                    新規アイコン登録
                </h1>
                <form action="{{ url('/icon/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            アイコン画像
                        </label>
                        <div class="relative border-2 border-gray-300 border-dashed rounded-md p-6 mt-1">
                            <input id="image" name="image" type="file"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="text-center">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                <p class="mt-1 text-sm text-gray-600">クリックまたはドラッグ＆ドロップで画像をアップロード</p>
                            </div>
                        </div>
                    </div>
                    <div id="imagePreviewContainer" class="mt-4 hidden">
                        <h2 class="text-sm font-bold">プレビュー表示</h2>
                        <div id="imagePreview"></div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            タイトル
                        </label>
                        <p class="text-sm mb-3 text-gray-600">アイコンにつけるタイトルを設定してください。</p>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 border-gray-200 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="title" type="text" name="title" required>

                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            説明
                        </label>
                        <p class="text-sm mb-3 text-gray-600">アイコンの説明を設定してください。</p>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 border-gray-200 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="description" name="description" rows="4"></textarea>
                    </div>
                    <div class="flex flex-col gap-8 items-center justify-center">
                        <button
                            class="w-60 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-4 px-4 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                            type="submit">
                            登録する
                        </button>
                        <a href="{{ url('dashboard') }}"
                            class="w-60 text-black text-center border font-bold py-4 px-4 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">一覧に戻る</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
