<?php

namespace App\Application\Controllers\Website;



use App\Application\Controllers\AbstractController;
use App\Application\Controllers\Controller;
use App\Application\Model\Page;
use App\Application\Model\User;
use App\Application\Model\News;
use App\Application\Model\Site;
use App\Application\Model\Formation;
use App\Application\Model\Medias;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(layoutHomePage('website'));
        
    }

    public function welcome(){
        //dd(Page::where('title->en', 'About us')->first());
        $director_speech = page(1);
//        $news = News::latest()
//                    ->limit(5)
//                    ->get();
//        $sites = Site::latest()
//                    ->limit(5)
//                    ->get();
//        $formations = Formation::latest()
//                    ->limit(5)
//                    ->get();
//        $galleries = Medias::latest()
//                    ->with('filesmedia:medias_id,url as src')
//                    ->where('type',1)
//                    ->limit(5)
//                    ->get();
//        $collections = collect([]);
//        foreach ($galleries as $gallery) {
//            $collections = $collections->merge($gallery->filesmedia->slice(0,10));
//        }
        $images = explode(';', img_cam());
//        dd($images);
       $imag=["imag"=>url('/'.env('UPLOAD_PATH').'/'.img_cam())];
        return view(layoutHomePage('website'), compact('director_speech', 'news', 'sites', 'formations', 'collections','images'));
    }

    public function deleteImage($model, $id, Request $request)
    {
        if (auth()->check()) {
            if (file_exists(public_path(env('UPLOAD_PATH') . DS . $request->name))) {
                $model = 'App\\Application\\Model\\' . ucfirst($model);
                $filed = $request->has('filed_name') ? $request->get('filed_name') : 'image';
                if (class_exists($model)) {
                    $item = $model::findorFail($id);
                    if (json_decode($item->{$filed})) {
                        $array = [];
                        foreach (json_decode($item->{$filed}) as $file) {
                            if ($file != $request->name) {
                                $array[] = $file;
                            }
                        }
                        $item->{$filed} = json_encode($array);
                        $item->save();
                        alert()->success("Done Delete", "Done");
                        return redirect()->back();
                    }
                    alert()->error("Filed not found", "Error");
                    return redirect()->back();
                }
                alert()->error("Class not exists", "Error");
                return redirect()->back();
            }
            alert()->error("File not exists", "Error");
            return redirect()->back();
        }
        abort('404');
    }

}
