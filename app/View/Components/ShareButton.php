<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShareButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $shareButton;
    public function __construct($slug,$title)
    {
        $this->shareButton = \Share::page($slug,
            $title)
            ->facebook()
            ->linkedin()
            ->twitter()
            ->pinterest();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.share-button');
    }
}
