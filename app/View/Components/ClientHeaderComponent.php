<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\MenuLinks\Repositories\MenuLinkRepository;

class ClientHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public MenuLinkRepository $repository)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $links = $this->repository->all();


        return view('components.client-header-component', compact('links'));
    }
}
