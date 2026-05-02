<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {

        dd($request->all());

        // try {
        //     $request->validate([
        //         'title' => 'required|string|max:255',
        //         'slug' => 'required|string|max:255|unique:pages,slug',
        //         'content' => 'required|string',
        //         'page_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //         'meta_description' => 'nullable|string|max:255',
        //         'meta_title' => 'nullable|string|max:255',
        //         'meta_keys' => 'nullable|string|max:255',
        //         'meta_tags' => 'nullable|string|max:255',
        //         'status' => 'required|boolean',
        //         'sorting' => 'integer|nullable|min:0',
        //     ]);

        //     $data = $request->all();
        //     $data['slug'] = Str::slug($data['slug']);

        //     // Handle banner upload
        //     if ($request->hasFile('page_banner')) {
        //         $banner = $request->file('page_banner');
        //         $bannerName = time() . '_' . $banner->getClientOriginalName();
        //         $banner->move(public_path('storage/pages'), $bannerName);
        //         $data['page_banner'] = 'pages/' . $bannerName;
        //     }

        //     Page::create($data);

        //     return redirect()
        //         ->route('admin.pages.index')
        //         ->with('success', 'Page created successfully.');
        // } catch (\Exception $e) {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with('error', 'Error creating page: ' . $e->getMessage());
        // }
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
                'content' => 'required|string',
                'page_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta_description' => 'nullable|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_keys' => 'nullable|string|max:255',
                'meta_tags' => 'nullable|string|max:255',
                'status' => 'required|in:0,1',
                'sorting' => 'integer|nullable|min:0',
            ]);

            $data = $request->all();
            $data['slug'] = Str::slug($data['slug']);

            // Handle banner upload
            if ($request->hasFile('page_banner')) {
                // Delete old banner if exists
                if ($page->page_banner && file_exists(public_path('storage/' . $page->page_banner))) {
                    unlink(public_path('storage/' . $page->page_banner));
                }

                $banner = $request->file('page_banner');
                $bannerName = time() . '_' . $banner->getClientOriginalName();
                $banner->move(public_path('storage/pages'), $bannerName);
                $data['page_banner'] = 'pages/' . $bannerName;
            }

            $page->update($data);

            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Page updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating page: ' . $e->getMessage());
        }
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }
}
