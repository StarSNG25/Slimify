<div>
	<flux:field>
		<flux:label>URL</flux:label>
		<flux:input wire:model="originalUrl" type="url" />
		<flux:error name="originalUrl" />
	</flux:field>
	
	<flux:field class="mt-4">
		<flux:label badge="Optional">Short Code</flux:label>
		<flux:input wire:model="shortCode" type="text" />
		<flux:error name="shortCode" />
	</flux:field>
	
	<flux:field class="mt-4">
		<flux:label></flux:label>
		<flux:button variant="primary" wire:click="submit" class="w-full">Shorten</flux:button>
	</flux:field>
	
	@if (!empty($shortUrl))
		<div class="mt-4">
			<flux:badge color="green" class="mx-auto badge-wrap">
				<a href="{{ $shortUrl }}" target="_blank">{{ $shortUrl }}</a>
			</flux:badge>
		</div>
	@endif
	
	<flux:field class="mt-4">
		<flux:label>Delete Code</flux:label>
		<flux:input wire:model="deleteShortCode" type="text" />
		<flux:error name="deleteShortCode" />
	</flux:field>
	
	<flux:field class="mt-4">
		<flux:label></flux:label>
		<flux:button variant="primary" wire:click="delete" class="w-full">Delete</flux:button>
	</flux:field>
</div>
