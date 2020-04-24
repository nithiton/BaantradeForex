<?php

namespace App\View\Components;

use App\Models\Ads;
use Illuminate\View\Component;

class WidgetAreaAds extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $ads = Ads::limit(6)->get();
        return view('layouts.components.widget_area_ad',['ads'=>$ads]);
    }
}
