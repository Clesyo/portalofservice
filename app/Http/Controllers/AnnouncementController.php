<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
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
        return Redirect::back();
    }
}
