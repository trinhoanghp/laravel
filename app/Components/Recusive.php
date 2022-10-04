<?php

namespace App\Components;

use App\Models\Category;
use App\Models\Menu;

class Recusive {
    private $html;
    public function __construct()
    {
        $this->html = '';
    }


    // public function menuRecusive($parentIdMenu, $parentId = 0, $text = '')
    // {
    //     $data = Menu::where('parent_id', $parentId)->get();
    //     foreach ($data as $dataItem) {
    //         // dd($parentIdMenuEdit);
    //         if( !empty($parentIdMenu)  && $parentIdMenu == $dataItem->id) {
               
    //             $this->html .= '<option selected value="' . $dataItem->id .'">' . $text . $dataItem->name . '</option>';
    //         } else {
    //             $this->html .= '<option value="' . $dataItem->id .'">' . $text . $dataItem->name . '</option>';
    //         }

    //         $this->menuRecusive($parentIdMenu, $dataItem->id, $text . '--');
    //     }

    //     return $this->html;

    // }
    public function categoryRecusive($parentIdCategory, $parentId = 0, $text = '')
    {
        $data = Category::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            // dd($parentIdMenuEdit);
            if( !empty($parentIdCategory)  && $parentIdCategory == $dataItem->id) {
               
                $this->html .= '<option selected value="' . $dataItem->id .'">' . $text . $dataItem->name . '</option>';
            } else {
                $this->html .= '<option value="' . $dataItem->id .'">' . $text . $dataItem->name . '</option>';
            }

            $this->categoryRecusive($parentIdCategory, $dataItem->id, $text . '--');
        }

        return $this->html;

    }
    


}