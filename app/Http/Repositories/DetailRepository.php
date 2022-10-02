<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\DetailInterface;
use App\Http\Traits\DetailTrait;
use App\Models\Detail;

class DetailRepository implements DetailInterface {
    use DetailTrait;

    private $detailModel;

    /*-------------------------------------Constructor-----------------------------------*/

    public function __construct(Detail $detailModel) {
        $this->detailModel = $detailModel;
    }

    /*-------------------------------------Get All Details-----------------------------------*/
    
    public function index() {
        $details = $this->getDetails();

        return view('admin.details.index', compact('details'));
    }

    /*-------------------------------------Create Detail-----------------------------------*/

    public function create() {
        return view('admin.details.create');
    }

    public function store($request) {
        $this->detailModel->create([
            'key' => $request->title,
            'value' => $request->value
        ]);

        session()->flash('success', 'Detail was created successfully.');
        return redirect(route('details.index'));
    }

    /*-------------------------------------Update Detail-----------------------------------*/
    
    public function edit($detailId) {
        $detail = $this->getDetailById($detailId);
        return view('admin.details.edit', compact('detail'));
    }

    public function update($request) {
        $detail = $this->getDetailById($request->detail_id);
        $detail->update([
            'key' => $request->title,
            'value' => $request->value
        ]);

        session()->flash('success', 'Detail was updated successfully.');
        return redirect(route('details.index'));
    }

    /*-------------------------------------Delete Detail-----------------------------------*/

    public function destroy($request) {
        $detail = $this->getDetailById($request->detail_id);
        $detail->delete();

        session()->flash('success', 'Detail was deleted successfully.');
        return redirect(route('details.index'));
    }
}