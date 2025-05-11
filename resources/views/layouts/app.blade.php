<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="Shorten, track, and manage your links with ease and privacy.">
		
		<title>{{ ucfirst(Route::currentRouteName()) . ' | ' . config('app.name') }}</title>
		
		<meta property="og:title" content="{{ ucfirst(Route::currentRouteName()) }}">
		<meta property="og:site_name" content="{{ config('app.name') }}">
		<meta property="og:description" content="Shorten, track, and manage your links with ease and privacy.">
		<meta property="og:image" content="{{ asset('images/opengraph-icon.png') }}">
		<meta property="og:url" content="{{ config('app.url') }}">
		<meta property="og:type" content="website">
		
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="{{ config('app.name') }}">
		<meta name="twitter:description" content="Shorten, track, and manage your links with ease and privacy.">
		<meta name="twitter:image" content="{{ asset('images/opengraph-icon.png') }}">
		<meta name="twitter:url" content="{{ config('app.url') }}">
		
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
		<link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
		
		<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
		
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
{{--		<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}
		
		<!-- Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		@fluxAppearance
	</head>
	<body class="font-sans antialiased">
		<div class="min-h-screen bg-gray-100 dark:bg-black">
			<livewire:layout.navigation />
			
			<!-- Page Heading -->
			@if (isset($header))
				<header class="bg-white dark:bg-black shadow">
					<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
						{{ $header }}
					</div>
				</header>
			@endif
			
			<!-- Page Content -->
			<main>
				{{ $slot }}
			</main>
		</div>
		@fluxScripts
	</body>
</html>
