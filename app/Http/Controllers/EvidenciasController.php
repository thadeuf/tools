<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EvidenciasController extends Controller
{
    /**
     * Mostra a página de pensamentos ansiosos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evidencias');
    }

    public function save(Request $request)
    {
        $data = [
            'pensamento' => $request->input('pensamento'),
            'a_favor'    => $request->input('a_favor'),
            'contra'     => $request->input('contra')
        ];
        
        $json_data = json_encode($data, JSON_PRETTY_PRINT);
    
        // Obtendo a data e hora atual em um formato adequado para o nome do arquivo
        $currentDateTime = now()->format('Y-m-d_H-i-s');
        $fileName = "evidencia_" . $currentDateTime . ".json";
    
        $filePath = storage_path('app/' . $fileName);
    
        if (file_put_contents($filePath, $json_data) === false) {
            return back()->with('error', 'Ocorreu um erro ao salvar as evidências.');
        }
    
        return redirect('/evidencias')->with('success', 'Evidências salvas com sucesso!');
    }
    
    public function showResults(Request $request)
    {
        $files = Storage::files('/');
        $fileOptions = [];
    
        foreach ($files as $file) {
            if (strpos($file, 'evidencia_') === 0) { 
                $fileOptions[] = $file;
            }
        }
    
        $selectedFile = $request->input('selected_file');
        $result = [];
        if ($selectedFile && in_array($selectedFile, $fileOptions)) {
            $content = Storage::get($selectedFile);
            $result = json_decode($content, true);
        }
    
        return view('eresults', [
            'results' => $result, 
            'fileOptions' => $fileOptions, 
            'selectedFile' => $selectedFile
        ]);
    }
    

}