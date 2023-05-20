<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alertInfo extends Component
{
    public $message;
    public $type;

    public function __construct($type = '')
    {
        $this->message = session()->get('message');
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-info');
    }
}
