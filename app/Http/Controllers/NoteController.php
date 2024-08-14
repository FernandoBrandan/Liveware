<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    public function index()
    {
        //dd(Note::all());
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Note $note)
    {
        //
    }

    public function edit(Note $note)
    {
        //
    }

    public function update(Request $request, Note $note)
    {
        //
    }

    public function destroy(Note $note)
    {
        //
    }

    public function downloadCSV()
    { 
        
        return view('notes.downloadCSV');
        // $notes = Note::all();
        // $csvExporter = new \Laracsv\Export();
        // $csvExporter->build($notes, ['id', 'title', 'content'])->download();        
        /** otra opcion */
        //use Symfony\Component\HttpFoundation\StreamedResponse;
        //use League\Csv\Writer;
        // https://laravel-excel.com/
        // composer require maatwebsite/excel:^3.1
 
        $filename = "notes_" . date('Ymd') . ".csv";
        $handle = fopen('php://output', 'w');
        // Set headers for the CSV file download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        // Add CSV header
        fputcsv($handle, ['ID', 'Title', 'Content', 'Created At', 'Updated At']);
        // Fetch all notes and write to CSV
        $notes = Note::all();
        foreach ($notes as $note) {
            fputcsv($handle, [
                $note->id,
                $note->title,
                $note->content,
                $note->created_at,
                $note->updated_at
            ]);
        }
        fclose($handle);
        exit;
    }
}
