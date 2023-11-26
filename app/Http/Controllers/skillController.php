<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index() 
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','",$skill) . "'";

        return view('dashboard.skill.index')->with(['skill' => $skill]);
    }

    public function update(Request $request) 
    {
        if($request->method() == 'POST') {
            $request->validate([
                '_languange' => 'required',
                '_workflow' => 'required',
            ], [
                '_languange.required' => 'Silahkan masukan bahasa pemrograman yang kamu kuasai',
                '_workflow.required' => 'Silahkan masukan workflow yang kamu kuasai',
            ]);

            metadata::updateOrCreate(['meta_key'=>'_languange'], ['meta_value'=>$request->_languange]);
            metadata::updateOrCreate(['meta_key'=>'_workflow'], ['meta_value'=>$request->_workflow]);

            return redirect()->route('skill.index')->with('success', 'Berhasil melakukan update skill.');
        }    
    }
}
