<?php

namespace App\Livewire;

use App\Models\Link as LinkModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Link extends Component
{
	public string $originalUrl;
	public string $shortCode;
	public string $shortUrl;
	public string $deleteShortCode;
	
	public function submit(): void
	{
		try
		{
			$this->validate([
				'originalUrl' => 'required|url',
				'shortCode' => 'nullable|string|regex:/^[A-Za-z0-9_-]*$/'
			]);
			
			if (!empty($this->shortCode))
				$shortCode = $this->shortCode;
			else
				do
					$shortCode = Str::random(6);
				while (LinkModel::where('short_code', $shortCode)->exists());
			
			$link = LinkModel::create([
				'user_id' => auth()->id(),
				'short_code' => $shortCode,
				'original_url' => $this->originalUrl
			]);
			
			$this->shortUrl = url('/' . $shortCode);
			
			$this->reset('originalUrl', 'shortCode', 'deleteShortCode');;
		}
		catch (QueryException $exception)
		{
			if ($exception->getCode() == 23000)
				$this->addError('shortCode', 'The short code already exists.');
		}
	}
	
	public function delete(): void
	{
		LinkModel::where('short_code', $this->deleteShortCode)->delete();
		
		$this->reset('originalUrl', 'shortCode', 'shortUrl', 'deleteShortCode');
	}
	
    public function render()
    {
        return view('livewire.link');
    }
}
