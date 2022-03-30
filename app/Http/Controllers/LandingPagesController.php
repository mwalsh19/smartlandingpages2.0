<?php

namespace App\Http\Controllers;

use App\LandingPages;
use App\Templates;
use App\Publishers;
use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LandingPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingPages = DB::table('landing_pages')
            ->join('publishers', 'publishers.id', '=', 'landing_pages.publisher')
            ->select('landing_pages.*', 'publishers.publisher')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('landing-pages.index', compact('landingPages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = Templates::all();
        $publishers = Publishers::all();
        $clients = Clients::all();
        return view('landing-pages.create', compact('templates', 'publishers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'path' => 'required|max:255',
            'title' => 'required|max:255',
            'template_id' => 'required',
            'client_id' => 'required',
            'publisher' => 'required',
            'referral_code' => 'max:255',
            'referral_code_intelliapp' => 'max:255',
            'main_title' => 'required|max:255',
            'main_description' => 'required',
            'body_copy' => 'required',
            'phone' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'ga_lp' => 'max:255',
            'ga_tp' => 'max:255',
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background_mobile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body_image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region_graphic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region_graphic_mobile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body_image_4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body_image_4_title' => 'max:255',
            'benef1_caption_title' => 'max:255',
            'benef2_caption_title' => 'max:255',
            'benef3_caption_title' => 'max:255',
            'benef4_caption_title' => 'max:255',
            'benef5_caption_title' => 'max:255',
            'benef6_caption_title' => 'max:255',
            'benef1_caption' => 'max:2000',
            'benef2_caption' => 'max:2000',
            'benef3_caption' => 'max:2000',
            'benef4_caption' => 'max:2000',
            'benef5_caption' => 'max:2000',
            'benef6_caption' => 'max:2000',
            'benef1_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef2_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef3_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef4_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef5_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef6_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filepath = 'uploads/' . $validatedData['path'];

        if ($request->background) {
            $imageBackground = time().rand(1000,9999).'.'.$request->background->extension(); 
            $validatedData['background'] = $imageBackground;
            $request->background->move(public_path($filepath), $imageBackground);
        }

        if ($request->background_mobile) {
            $image = time().rand(1000,9999).'.'.$request->background_mobile->extension(); 
            $validatedData['background_mobile'] = $image;
            $request->background_mobile->move(public_path($filepath), $image);
        }

        if ($request->body_image_2) {
            $image = time().rand(1000,9999).'.'.$request->body_image_2->extension(); 
            $validatedData['body_image_2'] = $image;
            $request->body_image_2->move(public_path($filepath), $image);
        }

        if ($request->region_graphic) {
            $imageBackground = time().rand(1000,9999).'.'.$request->region_graphic->extension(); 
            $validatedData['region_graphic'] = $imageBackground;
            $request->region_graphic->move(public_path($filepath), $imageBackground);
        }

        if ($request->region_graphic_mobile) {
            $image = time().rand(1000,9999).'.'.$request->region_graphic_mobile->extension(); 
            $validatedData['region_graphic_mobile'] = $image;
            $request->region_graphic_mobile->move(public_path($filepath), $image);
        }

        if ($request->body_image_4) {
            $image = time().rand(1000,9999).'.'.$request->body_image_4->extension(); 
            $validatedData['body_image_4'] = $image;
            $request->body_image_4->move(public_path($filepath), $image);
        }

        if ($request->benef1_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef1_figure->extension(); 
            $validatedData['benef1_figure'] = $imageBackground;
            $request->benef1_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef2_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef2_figure->extension(); 
            $validatedData['benef2_figure'] = $imageBackground;
            $request->benef2_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef3_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef3_figure->extension(); 
            $validatedData['benef3_figure'] = $imageBackground;
            $request->benef3_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef4_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef4_figure->extension(); 
            $validatedData['benef4_figure'] = $imageBackground;
            $request->benef4_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef5_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef5_figure->extension(); 
            $validatedData['benef5_figure'] = $imageBackground;
            $request->benef5_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef6_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef6_figure->extension(); 
            $validatedData['benef6_figure'] = $imageBackground;
            $request->benef6_figure->move(public_path($filepath), $imageBackground);
        }

        LandingPages::create($validatedData);
   
        return redirect('/dashboard/landing-pages')->with('success', 'Landing Page was successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function show(LandingPages $landingPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $templates = Templates::all();
        $publishers = Publishers::all();
        $landingPage = LandingPages::findOrFail($id);
        $clients = Clients::all();

        return view('landing-pages.edit', compact('landingPage', 'templates', 'publishers', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validator($request->all(), $id)->validate();

        $validatedData = $this->checkImages($request, $validatedData);

        LandingPages::whereId($id)->update($validatedData);

        if ($request->old_path !== $request->path) {
            //rename('uploads/' . $request->old_path, 'uploads/' . $request->path);
            //copy('exist/test.png'), public_path('copy/test_copy.png'));
            $this->recursive_files_copy('uploads/' . $request->old_path, 'uploads/' . $request->path);
        }

        return redirect('/dashboard/landing-pages')->with('success', 'Landing Page was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LandingPages  $landingPages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landingPage = LandingPages::findOrFail($id);
        $landingPage->delete();

        return redirect('/dashboard/landing-pages')->with('success', 'Landing Page was successfully deleted');
    }

    public function clone($id)
    {
        $clonedLandingPage = [];
        $landingPage = LandingPages::findOrFail($id);
        $original_path = $landingPage->path;

        $clonedLandingPage = $landingPage;
        $clonedLandingPage['title'] = 'cloned-' . $landingPage->title;
        $clonedLandingPage['path'] = 'cloned-' . $landingPage->path;


        $clonedLandingPageObj = json_encode($clonedLandingPage);
        $clonedLandingPageArr = json_decode($clonedLandingPageObj, true);

        $this->recursive_files_copy('uploads/' . $original_path, 'uploads/' . $clonedLandingPage['path']);

        $data = LandingPages::create($clonedLandingPageArr);
        $id = $data->id;

        return redirect('/dashboard/landing-pages/' . $id . '/edit');
    }

    protected function recursive_files_copy($source_dir, $destination_dir)
    {
        // Open the source folder / directory 
        $dir = opendir($source_dir);

        // Create a destination folder / directory if not exist 
        if (!is_dir($destination_dir)){
            mkdir($destination_dir);
        }
        // Loop through the files in source directory 
        while($file = readdir($dir))
        {
            // Skip . and .. 
            if(($file != '.') && ($file != '..'))
            {
                // Check if it's folder / directory or file 
                if(is_dir($source_dir.'/'.$file))
                {
                    // Recursively calling this function for sub directory  
                    $this->recursive_files_copy($source_dir.'/'.$file, $destination_dir.'/'.$file);
                }
                else
                {
                    // Copying the files
                    copy($source_dir.'/'.$file, $destination_dir.'/'.$file);
                }
            }
        }
        
        closedir($dir);
    }

    protected function checkImages($request, array $validatedData)
    {
        $filepath = 'uploads/' . $validatedData['path'];

        if ($request->background) {
            $imageBackground = time().rand(1000,9999).'.'.$request->background->extension(); 
            $validatedData['background'] = $imageBackground;
            $request->background->move(public_path($filepath), $imageBackground);
        }

        if ($request->background_mobile) {
            $image = time().rand(1000,9999).'.'.$request->background_mobile->extension(); 
            $validatedData['background_mobile'] = $image;
            $request->background_mobile->move(public_path($filepath), $image);
        }

        if ($request->body_image_2) {
            $image = time().rand(1000,9999).'.'.$request->body_image_2->extension(); 
            $validatedData['body_image_2'] = $image;
            $request->body_image_2->move(public_path($filepath), $image);
        }

        if ($request->region_graphic) {
            $imageBackground = time().rand(1000,9999).'.'.$request->region_graphic->extension(); 
            $validatedData['region_graphic'] = $imageBackground;
            $request->region_graphic->move(public_path($filepath), $imageBackground);
        }

        if ($request->region_graphic_mobile) {
            $image = time().rand(1000,9999).'.'.$request->region_graphic_mobile->extension(); 
            $validatedData['region_graphic_mobile'] = $image;
            $request->region_graphic_mobile->move(public_path($filepath), $image);
        }

        if ($request->body_image_4) {
            $image = time().rand(1000,9999).'.'.$request->body_image_4->extension(); 
            $validatedData['body_image_4'] = $image;
            $request->body_image_4->move(public_path($filepath), $image);
        }

        if ($request->benef1_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef1_figure->extension(); 
            $validatedData['benef1_figure'] = $imageBackground;
            $request->benef1_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef2_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef2_figure->extension(); 
            $validatedData['benef2_figure'] = $imageBackground;
            $request->benef2_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef3_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef3_figure->extension(); 
            $validatedData['benef3_figure'] = $imageBackground;
            $request->benef3_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef4_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef4_figure->extension(); 
            $validatedData['benef4_figure'] = $imageBackground;
            $request->benef4_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef5_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef5_figure->extension(); 
            $validatedData['benef5_figure'] = $imageBackground;
            $request->benef5_figure->move(public_path($filepath), $imageBackground);
        }

        if ($request->benef6_figure) {
            $imageBackground = time().rand(1000,9999).'.'.$request->benef6_figure->extension(); 
            $validatedData['benef6_figure'] = $imageBackground;
            $request->benef6_figure->move(public_path($filepath), $imageBackground);
        }

        

        return $validatedData;
    }

    protected function validator(array $data, $userId)
    {
        return Validator::make($data, [
            //'path' => 'required|max:255|unique:landing_pages,path,' . $userId,
            'path' => 'required|max:255',
            'title' => 'required|max:255',
            'template_id' => 'required',
            'client_id' => 'required',
            'publisher' => 'required',
            'referral_code' => 'max:255',
            'referral_code_intelliapp' => 'max:255',
            'main_title' => 'required|max:255',
            'main_description' => 'required',
            'body_copy' => 'required',
            'phone' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'ga_lp' => 'max:255',
            'ga_tp' => 'max:255',
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background_mobile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body_image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region_graphic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region_graphic_mobile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body_image_4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body_image_4_title' => 'max:255',
            'benef1_caption_title' => 'max:255',
            'benef2_caption_title' => 'max:255',
            'benef3_caption_title' => 'max:255',
            'benef4_caption_title' => 'max:255',
            'benef5_caption_title' => 'max:255',
            'benef6_caption_title' => 'max:255',
            'benef1_caption' => 'max:2000',
            'benef2_caption' => 'max:2000',
            'benef3_caption' => 'max:2000',
            'benef4_caption' => 'max:2000',
            'benef5_caption' => 'max:2000',
            'benef6_caption' => 'max:2000',
            'benef1_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef2_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef3_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef4_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef5_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'benef6_figure' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}
