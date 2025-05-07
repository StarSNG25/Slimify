<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="apple-mobile-web-app-title" content="Link Shortener">
		<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

		<title>{{ config('app.name', 'Laravel') }} | Star_SNG</title>
		
		<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
		
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
{{--		<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}

		<!-- Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		@fluxAppearance
	</head>
	<body class="font-sans text-gray-900 antialiased">
		<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-black">
			<div>
				<a href="/" wire:navigate>
					<x-application-logo class="w-20 h-20 sm:w-28 sm:h-28" />
				</a>
			</div>

			<div class="w-full sm:max-w-md mt-6 px-6 py-4 outline bg-white dark:bg-black dark:outline-red-600 shadow-md overflow-hidden sm:rounded-lg">
				{{ $slot }}
			</div>
		</div>
		@fluxScripts
	</body>
</html>
