<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Models\PartnerSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerSliderController extends BaseController
{
    public function index()
    {
        $this->setPageTitle('Partner Sliders', 'List of Partner Sliders');
        $partnerSliders = PartnerSlider::ordered()->get();
        return view('admin.partner-sliders.index', compact('partnerSliders'));
    }

    public function create()
    {
        $this->setPageTitle('Partner Sliders', 'Create Partner Slider');
        return view('admin.partner-sliders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'required|string|max:255',
            'link_label' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sorting' => 'nullable|integer|min:0'
        ]);

        $params = $request->except('_token');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logoPath = $logo->storeAs('partner-sliders', $logoName, 'public');
            $params['logo'] = $logoPath;
        }

        // Set default values
        $params['link_label'] = $params['link_label'] ?? 'Visit';
        $params['status'] = $request->has('status') ? 1 : 0;
        $params['sorting'] = $params['sorting'] ?? 0;

        $partnerSlider = PartnerSlider::create($params);

        if (!$partnerSlider) {
            return $this->responseRedirectBack('Error occurred while creating partner slider.', 'error', true, true);
        }

        return $this->responseRedirect('admin.partner-sliders.index', 'Partner slider created successfully.', 'success', false, false);
    }

    public function edit($id)
    {
        $partnerSlider = PartnerSlider::find($id);
        
        if (!$partnerSlider) {
            return $this->responseRedirectBack('Partner slider not found.', 'error', true, true);
        }

        $this->setPageTitle('Partner Sliders', 'Edit Partner Slider');
        return view('admin.partner-sliders.edit', compact('partnerSlider'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'required|string|max:255',
            'link_label' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sorting' => 'nullable|integer|min:0'
        ]);

        $params = $request->except('_token');
        $partnerSlider = PartnerSlider::find($params['id']);

        if (!$partnerSlider) {
            return $this->responseRedirectBack('Partner slider not found.', 'error', true, true);
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partnerSlider->logo) {
                Storage::disk('public')->delete($partnerSlider->logo);
            }
            
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logoPath = $logo->storeAs('partner-sliders', $logoName, 'public');
            $params['logo'] = $logoPath;
        }

        // Set default values
        $params['link_label'] = $params['link_label'] ?? 'Visit';
        $params['status'] = $request->has('status') ? 1 : 0;
        $params['sorting'] = $params['sorting'] ?? 0;

        $partnerSlider->update($params);

        if (!$partnerSlider) {
            return $this->responseRedirectBack('Error occurred while updating partner slider.', 'error', true, true);
        }

        return $this->responseRedirect('admin.partner-sliders.index', 'Partner slider updated successfully.', 'success', false, false);
    }

    public function delete($id)
    {
        $partnerSlider = PartnerSlider::find($id);

        if (!$partnerSlider) {
            return $this->responseRedirectBack('Partner slider not found.', 'error', true, true);
        }

        // Delete logo file
        if ($partnerSlider->logo) {
            Storage::disk('public')->delete($partnerSlider->logo);
        }

        $partnerSlider->delete();

        if (!$partnerSlider) {
            return $this->responseRedirectBack('Error occurred while deleting partner slider.', 'error', true, true);
        }

        return $this->responseRedirect('admin.partner-sliders.index', 'Partner slider deleted successfully.', 'success', false, false);
    }
}
