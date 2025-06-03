<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
	public LoginForm $form;
 
	/**
	 * Handle an incoming authentication request.
	 */
	public function login(): void
	{
		$this->validate();
  
		$this->form->authenticate();
  
		Session::regenerate();
  
		$this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
	}
}; ?>

<div>
	<!-- Session Status -->
	<x-auth-session-status class="mb-4" :status="session('status')" />
	
	<flux:field>
		<flux:button class="w-full" href="{{ route('google.login') }}">
			<x-icon-google class="w-5 h-5" />
			Log in with Google
		</flux:button>
	</flux:field>
	
	<flux:separator text="or" class="my-4" />
	
	<form wire:submit="login">
		<!-- Email Address -->
		<flux:field>
			<flux:label>{{ __('Email') }}</flux:label>
			<flux:input wire:model="form.email" type="email" autofocus required />
			<flux:error name="form.email" />
		</flux:field>
		
		<!-- Password -->
		<flux:field class="mt-4">
			<flux:label>{{ __('Password') }}</flux:label>
			<flux:input wire:model="form.password" type="password" autofocus autocomplete="current-password" required />
			<flux:error name="form.password" />
		</flux:field>
		
		<!-- Remember Me -->
		<flux:field variant="inline" class="mt-4">
			<flux:checkbox wire:model="form.remember" />
			<flux:label>{{ __('Remember me') }}</flux:label>
		</flux:field>
		
		<div class="flex items-center justify-end mt-4">
			@if (Route::has('password.request'))
				<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
					{{ __('Forgot your password?') }}
				</a>
			@endif
			
{{--			<x-primary-button class="ms-3">{{ __('Log in') }}</x-primary-button>--}}
			<flux:button variant="primary" type="submit" class="ms-3">{{ __('Log in') }}</flux:button>
		</div>
	</form>
</div>
