<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ColorInterface;
use App\Http\Traits\ColorTrait;
use App\Models\Color;

class ColorRepository implements ColorInterface {
    use ColorTrait;

    private $colorModel;
    
    /*-------------------------------------Constructor-----------------------------------*/
    
    public function __construct(Color $colorModel) {
        $this->colorModel = $colorModel;
    }

    /*-------------------------------------Get All Colors-----------------------------------*/

    public function index() {
        $colors = $this->getColors();

        return view('admin.colors.index', compact('colors'));
    }

    /*-------------------------------------Create Color-----------------------------------*/

    public function create() {
        return view('admin.colors.create');
    }

    public function store($request) {
        $this->colorModel->create([
            'name' => $request->name,
            'hexa' => $request->hexa
        ]);

        session()->flash('success', 'Color created successfully');
        return redirect(route('colors.index'));
    }

    /*-------------------------------------Update Color-----------------------------------*/

    public function edit($colorId) {
        $color = $this->getColorById($colorId);

        return view('admin.colors.edit', compact('color'));
    }

    public function update($request) {
        $color = $this->getColorById($request->color_id);

        $color->update([
            'name' => $request->name,
            'hexa' => $request->hexa
        ]);

        session()->flash('success', 'Color updated successfully');
        return redirect(route('colors.index'));
    }

    /*-------------------------------------Delete Color-----------------------------------*/

    public function destroy($request) {
        $color = $this->getColorById($request->color_id);

        $color->delete();

        session()->flash('success', 'Color deleted successfully');
        return redirect(route('colors.index'));
    }
}