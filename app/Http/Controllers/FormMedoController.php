<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormMedoController extends Controller
{
    public function index()
    {
        return view('formmedo');
    }

    public function save(Request $request)
    {
        $data = $request->input('answers');
        $json_data = json_encode($data, JSON_PRETTY_PRINT);

        // Obtendo a data e hora atual em um formato adequado para o nome do arquivo
        $currentDateTime = now()->format('Y-m-d_H-i-s');
        $fileName = "answers_" . $currentDateTime . ".json";

        $filePath = storage_path('app/' . $fileName);

        if (file_put_contents($filePath, $json_data) === false) {
            return back()->with('error', 'Ocorreu um erro ao salvar as respostas.');
        }

        return redirect('/formmedo')->with('success', 'Respostas salvas com sucesso!');
    }

public function showResults(Request $request)
{
    $files = Storage::files('/');
    $fileOptions = [];

    foreach ($files as $file) {
        if (strpos($file, 'answers_') === 0) { 
            $fileOptions[] = $file;
        }
    }

    $selectedFile = $request->input('selected_file');
    $result = [];
    if ($selectedFile && in_array($selectedFile, $fileOptions)) {
        $content = Storage::get($selectedFile);
        $result = json_decode($content, true);
    }

    return view('results', ['results' => $result, 'fileOptions' => $fileOptions, 'selectedFile' => $selectedFile]);
}



}
