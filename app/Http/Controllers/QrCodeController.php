<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;    // For QR Code generation
use QrReader;                          // For reading QR Codes from images
use Illuminate\Support\Facades\Auth;

class QrCodeController extends Controller
{
    // Generate QR Code
    public function generate()
    {
        $user = auth()->user();
      //  $user = Auth::user();
     //   dd($user);

        // Generate QR code with custom data (e.g., a URL)
        $result = Builder::create()
            ->data($user->email) // Change this to dynamic data as needed
            ->size(300)
            ->build();

        // Save QR code to public storage (optional)
        $path = storage_path('app/public/qrcode/'.$user->id.'qrcode.png');
        $result->saveToFile($path);

        // Return QR code as inline data URI to display it
        return view('qr-code-generate', ['qrCode' => $result->getDataUri()]);
    }

    // Display form to upload a QR code image for reading
    public function showReaderForm()
    {
        return view('qr-code-reader-form');
    }

    // Process uploaded QR code image
    public function read(Request $request)
    {
        // Validate uploaded file
        $request->validate([
            'qr_image' => 'required|image'
        ]);

        // Process the uploaded image
        $image = $request->file('qr_image');
        $qrCodeReader = new QrReader($image->getPathname()); // Initialize QrReader with the image file path
        $decodedText = $qrCodeReader->text(); // Decode the QR code content

        return view('qr-code-result', ['decodedText' => $decodedText]);
    }
}
