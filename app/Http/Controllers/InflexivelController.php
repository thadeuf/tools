<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InflexivelController extends Controller
{
    public function index()
    {
        return view('inflexivel');
    }

    public function save(Request $request)
{
    $answers = $request->input('answers');
    $inflexibleAffirmations = $request->input('inflexible');
    $flexibleAffirmations = $request->input('flexible');

    $structuredData = [];

    foreach($inflexibleAffirmations as $index => $affirmation) {
        $structuredData[] = [
            'inflexible' => $affirmation,
            'score' => isset($answers[$index]) ? $answers[$index] : null,
            'flexible' => $flexibleAffirmations[$index]
        ];
    }

    $json_data = json_encode($structuredData, JSON_PRETTY_PRINT);

    // Obtendo a data e hora atual em um formato adequado para o nome do arquivo
    $currentDateTime = now()->format('Y-m-d_H-i-s');
    
    // Renomeando o arquivo para refletir o conteúdo
    $fileName = "inflexivel_" . $currentDateTime . ".json";

    $filePath = storage_path('app/' . $fileName);

    if (file_put_contents($filePath, $json_data) === false) {
        return back()->with('error', 'Ocorreu um erro ao salvar a visão flexível vs inflexível.');
    }

    return redirect('/inflexivel')->with('success', 'Visão salva com sucesso!');
}


public function showResults(Request $request)
{
    $files = Storage::files('/');
    $fileOptions = [];

    foreach ($files as $file) {
        if (strpos($file, 'inflexivel_') === 0) { 
            $fileOptions[] = $file;
        }
    }

    $selectedFile = $request->input('selected_file');
    $results = [];
    if ($selectedFile && in_array($selectedFile, $fileOptions)) {
        $content = Storage::get($selectedFile);
        $results = json_decode($content, true);
    }

    return view('iresults', ['results' => $results, 'fileOptions' => $fileOptions, 'selectedFile' => $selectedFile]);
}



}