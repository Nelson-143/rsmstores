<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // Correct import
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class AdsGeneratorController extends Controller
{
    public function index()
    {
        return view('Adsgenerator.index');
    }
    public function generateAd(Request $request)
{
    Log::info('Generating ad with request data:', $request->all());

    $request->validate([
        'photo' => 'required|image|max:1024', // Max 1MB
        'overlay_text' => 'nullable|string|max:50',
        'watermark' => 'nullable|boolean',
    ]);

    Log::info('Validation successful');

    try {
        // Base transformations
// Base transformations: Focus on improving image quality without resizing
$transformations = [
    ['effect' => 'improve'], // Enhance image quality
    ['quality' => 'auto:best'], // Optimize quality for the best balance of clarity and size
    ['effect' => 'blur:200'], // Apply a strong blur to the background
];

// Add overlay text transformation if provided
if ($request->overlay_text) {
    $transformations[] = [
        'overlay' => [
            'font_family' => 'Glamified', // Modern and professional font
            'font_size' => 70,
            'font_weight' => 'bold',
            'text' => $request->overlay_text,
            'color' => 'white',
            'background' => 'rgba:0,0,0,0.5', // Semi-transparent black background for enhanced readability
        ],
        'gravity' => 'center', // Place the text in the center of the image
        'y' => 0, // Keep text centered
    ];
}

// Add watermark transformation if enabled
if ($request->watermark) {
    $transformations[] = [
        'overlay' => 'your_watermark_image', // Replace with your watermark asset
        'width' => 150, // Resize the watermark
        'opacity' => 50, // Make it semi-transparent
        'gravity' => 'south_east',
        'x' => 20, // Position 20px from the right
        'y' => 20, // Position 20px from the bottom
    ];
}

// Keep the image intact without resizing while blurring the background
$transformations[] = [
    'flags' => 'region_relative', // Apply effects without resizing the whole image
    'gravity' => 'auto' // Ensure focus stays on the center of the image
];


// Add a subtle vignette effect for a professional look
//$transformations[] = ['effect' => 'vignette:50']; // Softer vignette for attention focus


        // Debugging: Log the transformations
        Log::info('Transformations:', $transformations);

        // Upload the image to Cloudinary with transformations
        $uploadedFileUrl = Cloudinary::upload(
            $request->file('photo')->getRealPath(),
            [
                'folder' => 'ad_generator',
                'transformation' => $transformations
            ]
        )->getSecurePath();

        Log::info('File uploaded successfully to Cloudinary');

        // Pass the uploaded image URL to the view
        return view('Adsgenerator.index', ['ad_image' => $uploadedFileUrl]);

    } catch (\Exception $e) {
        Log::error('Error generating ad:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Failed to generate ad: ' . $e->getMessage());
    }
}
}