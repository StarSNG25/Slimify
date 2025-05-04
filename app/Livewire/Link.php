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
	
	public function submit()
	{
		try
		{
			$this->validate([
				'originalUrl' => 'required|url'
			]);
			
			$shortCode = !empty($this->shortCode) ? $this->shortCode : Str::random(6);
			
			$link = LinkModel::create([
				'short_code' => $shortCode,
				'original_url' => $this->originalUrl
			]);
			
			$this->shortUrl = url('/' . $shortCode);
			
			$this->reset('originalUrl', 'shortCode');
		}
		catch (QueryException $exception)
		{
			if ($exception->getCode() == 23000)
				$this->addError('shortCode', 'The short code already exists.');
			return;
		}
	}
	
	public function delete()
	{
		LinkModel::where('short_code', $this->shortCode)->delete();
		
		$this->reset('originalUrl', 'shortCode');
	}
	
    public function render()
    {
        return view('livewire.link');
    }
}
