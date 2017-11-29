<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use File;
use App\Http\Requests\StoreSlide;
use App\Http\Requests\UpdateSlide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listSlide'] = Slide::paginate(config('customer.page'));

        return view('admin.listslide', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-edit-slide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlide $request)
    {
        $image_path = '';
        if ($request->hasFile('image_path')) {
            $image_path = $request->file('image_path')->getClientOriginalName();
            $image_path = time() . $image_path;
            $request->file('image_path')->move(config('customer.image_path.slides'), $image_path);
        }
        Slide::create([
            'name' => $request['name'],
            'link' => $request['link'],
            'description' => $request['description'],
            'image_path' => $image_path,
            'status' => $request['status'],
        ]);

        return redirect()->route('admin.slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['slide'] = Slide::find($id);

        return view('admin.add-edit-slide', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlide $request, $id)
    {
        $slide = Slide::where('id', $id);
        if ($request->hasFile('image_path')) {
            $old_image = $slide->image_path;
            if(file_exists(config('customer.image_path.slides') . $old_image))
                File::delete(config('customer.image_path.slides') . $old_image);
            $image_path = $request->file('image_path')->getClientOriginalName();
            $image_path = time().$image_path;
            $request->file('image_path')->move(config('customer.image_path.slides'), $image_path);
            $slide->update([
                'image_path' => $image_path
            ]);
        }
        $slide->update([
            'name' => $request['name'],
            'link' => $request['link'],
            'description' => $request['description'],
            'status' => $request['status'],
        ]);

        return redirect()->route('admin.slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_image = Slide::find($id)->image_path;
        if (file_exists(config('customer.image_path.slides') . $old_image)) {
            File::delete(config('customer.image_path.slides') . $old_image);
        }
        $slide = Slide::find($id);
        $slide->delete();

        return redirect()->route('admin.slide.index');
    }
}
