<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{
    //

    public function index()
    {
        $pages = ['Anúncios'];
        $announcements = Announcement::all();
        return view('announcement.announcement_index', compact('pages','announcements'));
    }
    
    public function create()
    {
        $pages = ['Anúncios','Novo'];
        $companies = Company::all();
        return view('announcement.announcement_create', compact('pages','companies'));
    }
    public function edit($id)
    {
        $pages = ['Anúncios','Editar'];
        $announcement = Announcement::findOrFail($id);
        return view('announcement.announcement_edit', compact('pages', 'announcement'));
    }

    public function store(Request $request)
    {
        $announcement = new Announcement();
        
        $announcement['note'] = $request->input('note');
        $announcement['company_id'] = $request->input('company_id');

        $announcement = $announcement::create([
            'note' => $request->input('note'),
            'company_id' => $request->input('company_id'),
        ]);

        $images = $request->allFiles('images');

        $nameCompany = Company::findOrFail($request->input('company_id'))->name;
        
        //dd($images);
        
        if($announcement){

            for ($i=0; $i < count($images['images']); $i++) { 
                $file = $images['images'][$i];
    
                $image = new Image();
                $image->description = '';
                $image->path = $file->store('empresa/'.$nameCompany.'/anuncios/'.$announcement->id);
                $image->announcement_id = $announcement->id;
                $image->save();
                unset($image);
    
            }
            $notification = [
                'message' => 'Anúncio incluído com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success',
            ];
            
        }else{
                $notification = [
                    'message' => 'Erro ao incluir anúncio, tente novamente.',
                    'title' => 'Erro:',
                    'alert-type' => 'error',
                ];

        }

        return Redirect::back()->with($notification);
    }
}
