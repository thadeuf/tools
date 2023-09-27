<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProblemasController extends Controller
{
    /**
     * Mostra a página de pensamentos ansiosos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('problemas');
    }

    public function save(Request $request)
{
    // Pega todos os dados do formulário
    $data = $request->all();
    
    // Codifica os dados em JSON
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Obtendo a data e hora atual em um formato adequado para o nome do arquivo
    $currentDateTime = now()->format('Y-m-d_H-i-s');
    $fileName = "problemas_" . $currentDateTime . ".json";

    $filePath = storage_path('app/' . $fileName);

    // Tenta salvar os dados em um arquivo .json
    if (file_put_contents($filePath, $json_data) === false) {
        return back()->with('error', 'Ocorreu um erro ao salvar os dados.');
    }

    return redirect('/problemas')->with('success', 'Dados salvos com sucesso!');
}
    

public function showResults(Request $request)
{
    $files = Storage::files('/');
    $fileOptions = [];

    foreach ($files as $file) {
        if (strpos($file, 'problemas_') === 0) { 
            $fileOptions[] = $file;
        }
    }

    //$selectedFile = $request->input('selected_file');
    $selectedFile = $request->query('selected_file');

    $result = [];
    if ($selectedFile && in_array($selectedFile, $fileOptions)) {
        $content = Storage::get($selectedFile);
        $result = json_decode($content, true);
    }

    return view('proresults', ['results' => $result, 'fileOptions' => $fileOptions, 'selectedFile' => $selectedFile]);
}

}