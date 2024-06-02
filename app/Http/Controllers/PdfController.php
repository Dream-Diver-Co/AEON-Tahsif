<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToText\Pdf;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function uploadPdf(Request $request)
    // {
    //     $request->validate([
    //         'pdf_file' => 'required|mimes:pdf|max:2048', // Adjust max file size as needed
    //     ]);

    //     $pdfFilePath = $request->file('pdf_file')->path();

    //     // Set the path to the pdftotext binary using the configured path in config/pdf.php
    //     $poppler = 'C:\Users\nuruddin\Downloads\xpdf-tools-win-4.04\xpdf-tools-win-4.04\bin64\pdftotext.exe';

    //     $pdfContent = Pdf::getText($pdfFilePath, $poppler);

    //     // Now you need to parse the $pdfContent variable to extract the required data
    //     // You can use regex or any other parsing logic based on your specific PDF structure

    //     // Example: Extracting data from lines in the PDF
    //     // $data = [];
    //     // $lines = explode("\n", $pdfContent);
    //     // foreach ($lines as $line) {
    //     //     // Implement your data extraction logic here
    //     //     // Assuming you extract the data into an associative array with keys matching the input field names
    //     //     $data['plm'] = 'extracted_plm_data';
    //     //     $data['colour'] = 'extracted_colour_data';
    //     //     // ... and so on
    //     // }

    //     return response()->json($pdfContent);
    // }

    public function uploadPdf(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // Adjust max file size as needed
        ]);

        if ($request->input('select_buyer_upload') == 1) {
            $pdfFilePath = $request->file('pdf_file')->store('uploads', 'public');

            // Get the public path of the stored file
            $publicFilePath = Storage::disk('public')->path($pdfFilePath);
            Log::info('File path: ' . $pdfFilePath);

            // Assuming the Flask server is running on http://127.0.0.1:5000
            $flaskServerUrl = env('PYTHON_API_URL', "http://44.219.8.97:5000") . '/extract_table';

            // Make a POST request to the Flask server
            $client = new Client();
            $response = $client->post($flaskServerUrl, [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($publicFilePath, 'r'),
                        'filename' => basename($publicFilePath),
                    ],
                ],
            ]);

            // Get the JSON response from the Flask server
            $jsonResponse = $response->getBody()->getContents();

            // Return the JSON response as the HTTP response
            return response()->json($jsonResponse);
        }

        if ($request->input('select_buyer_upload') == 2) {
            $pdfFilePath = $request->file('pdf_file')->store('uploads', 'public');

            // Get the public path of the stored file
            $publicFilePath = Storage::disk('public')->path($pdfFilePath);
            Log::info('File path: ' . $pdfFilePath);

            // Assuming the Flask server is running on http://127.0.0.1:5000
            $flaskServerUrl = env('PYTHON_API_URL', 'http://44.219.8.97:5000') . '/extract_mrp';

            // Make a POST request to the Flask server
            $client = new Client();
            $response = $client->post($flaskServerUrl, [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($publicFilePath, 'r'),
                        'filename' => basename($publicFilePath),
                    ],
                ],
            ]);

            // Get the JSON response from the Flask server
            $jsonResponse = $response->getBody()->getContents();

            // Return the JSON response as the HTTP response
            return response()->json($jsonResponse);

            // return response()->json(['data' => null]);
        }

        if ($request->input('select_buyer_upload') == 3) {
            $pdfFilePath = $request->file('pdf_file')->store('uploads', 'public');

            // Get the public path of the stored file
            $publicFilePath = Storage::disk('public')->path($pdfFilePath);
            Log::info('File path: ' . $pdfFilePath);

            // Assuming the Flask server is running on http://127.0.0.1:5000
            $flaskServerUrl = env('PYTHON_API_URL', 'http://44.219.8.97:5000') . '/extract_ack';

            // Make a POST request to the Flask server
            $client = new Client();
            $response = $client->post($flaskServerUrl, [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($publicFilePath, 'r'),
                        'filename' => basename($publicFilePath),
                    ],
                ],
            ]);

            // Get the JSON response from the Flask server
            $jsonResponse = $response->getBody()->getContents();

            // Return the JSON response as the HTTP response
            return response()->json($jsonResponse);

            // return response()->json(['data' => null]);
        }
    }
}