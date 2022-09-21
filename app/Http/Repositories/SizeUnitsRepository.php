<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SizeUnitsInterface;
use App\Http\Traits\SizeUnitsTrait;
use App\Models\SizeUnit;

class SizeUnitsRepository implements SizeUnitsInterface {
    use SizeUnitsTrait;

    private $sizeUnitsModel;
    
    /*-------------------------------------Constructor-----------------------------------*/
    
    public function __construct(SizeUnit $sizeUnitsModel) {
        $this->sizeUnitsModel = $sizeUnitsModel;
    }

    /*-------------------------------------Get All Size Units-----------------------------------*/

    public function index() {
        $sizeUnits = $this->getSizeUnits();

        return view('admin.size-units.index', compact('sizeUnits'));
    }

    /*-------------------------------------Create Size Unit-----------------------------------*/

    public function create() {
        return view('admin.size-units.create');
    }

    public function store($request) {
        $this->sizeUnitsModel->create([
            'unit' => $request->unit
        ]);

        session()->flash('success', 'Size Unit created successfully');
        return redirect(route('size-unit.index'));
    }

    /*-------------------------------------Update Size Unit-----------------------------------*/

    public function edit($sizeUnitId) {
        $sizeUnit = $this->getSizeUnitsById($sizeUnitId);

        return view('admin.size-units.edit', compact('sizeUnit'));
    }

    public function update($request) {
        $sizeUnit = $this->getSizeUnitsById($request->size_unit_id);

        $sizeUnit->update([
            'unit' => $request->unit
        ]);

        session()->flash('success', 'Size Unit updated successfully');
        return redirect(route('size-unit.index'));
    }

    /*-------------------------------------Delete Size Unit-----------------------------------*/

    public function destroy($request) {
        $sizeUnit = $this->getSizeUnitsById($request->size_unit_id);

        $sizeUnit->delete();

        session()->flash('success', 'Size Unit deleted successfully');
        return redirect(route('size-unit.index'));
    }
}