<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SizeInterface;
use App\Http\Traits\SizeTrait;
use App\Http\Traits\SizeUnitsTrait;
use App\Models\Size;
use App\Models\SizeUnit;

class SizeRepository implements SizeInterface {
    use SizeTrait, SizeUnitsTrait;

    private $sizeModel;
    private $sizeUnitsModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Size $sizeModel, SizeUnit $sizeUnitsModel) {
        $this->sizeModel = $sizeModel;
        $this->sizeUnitsModel = $sizeUnitsModel;
    }

    /*-------------------------------------Get All Sizes-----------------------------------*/

    public function index() {
        $sizes = $this->getSizes();

        return view('admin.sizes.index', compact('sizes'));
    }

    /*-------------------------------------Create Size-----------------------------------*/

    public function create() {
        $sizeUnits = $this->getSizeUnits();

        return view('admin.sizes.create', compact('sizeUnits'));
    }

    public function store($request) {
        $this->sizeModel->create([
            'size' => $request->size,
            'size_unit_id' => $request->size_unit_id
        ]);

        session()->flash('success', 'Size created successfully');
        return redirect(route('sizes.index'));
    }

    /*-------------------------------------Update Size-----------------------------------*/

    public function edit($sizeId) {
        $size = $this->getSizeById($sizeId);
        $sizeUnits = $this->getSizeUnits();

        return view('admin.sizes.edit', compact('size', 'sizeUnits'));
    }

    public function update($request) {
        $size = $this->getSizeById($request->size_id);

        $size->update([
            'size' => $request->size,
            'size_unit_id' => $request->size_unit_id
        ]);

        session()->flash('success', 'Size updated successfully');
        return redirect(route('sizes.index'));
    }

    /*-------------------------------------Delete Size-----------------------------------*/

    public function destroy($request) {
        $size = $this->getSizeById($request->size_id);

        $size->delete();

        session()->flash('success', 'Size deleted successfully');
        return redirect(route('sizes.index'));
    }
}