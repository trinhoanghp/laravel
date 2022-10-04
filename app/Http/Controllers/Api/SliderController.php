<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[];
        
        $sliders = Slider::All();
        foreach ($sliders as $sl)
        {

            $data[] = [
                'id' => $sl->id,
                'type' => $sl->type,
                'name' => $sl->name,
                'description' => $sl->description,
                'image' => $sl->image,
                'image_path' => url($sl->image_path)
            ];
        };
        return $data;
    }

    public function show(Slider $slider)
    {
        //
    }

}
