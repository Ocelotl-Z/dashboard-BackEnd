<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $company = User::find(auth()->user()->id)->company;
        return view('admin.companies.index', compact('company'));
    }

    public function update(Request $request, Company $company)
    {

        $request->validate([
            'logo' => 'image',
            'name' => 'string|max:120|min:4'
        ]);

        if ($request->logo) {

            if ($company->logo_path) {
                Storage::disk('public')->delete($company->logo_path);
            }

            $filePath = Storage::disk('public')->put('companies_logos', $request->logo);

            $company->update([
                'name' => $request->name,
                'logo_path' => $filePath
            ]);
            
        } else {

            $company->update([
                'name' => $request->name
            ]);
        }

        return redirect()->route('admin.companies.index', $company)->with('success', 'Datos Actualizados');
    }
}
