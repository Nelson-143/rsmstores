@extends('layouts.tabler')

@section('content')
<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white text-center">
                    <h2>Create Your Custom Ads</h2>
                    <p class="text-muted">Upload an image and customize your ad with overlays, watermarks, and adjustments 📸
                </div>
                <div class="card-body">
                    <form action="{{ route('ads.generator.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6 text-center"> 
                                <h4>Upload Image</h4>
                                <div class="card p-3 border rounded">
                                    <img id="image-preview" class="img-fluid rounded shadow-sm" src="{{ asset('assets/img/demo/image-placeholder.svg') }}" alt="Preview" />
                                    <input type="file" class="form-control mt-2" id="image" name="photo" accept="image/*" onchange="previewImage();">
                                    <small class="text-muted">JPG or PNG, max 1MB</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Customize Ad</h4>
                                <label class="form-label">Overlay Text</label>
                                <input type="text" class="form-control" name="overlay_text" placeholder="Enter promotional text">
                                
                                <label class="form-label mt-2">Watermark (optional)</label>
                                <input type="text" class="form-control" name="watermark" placeholder="Enter watermark text">
                                
                                <label class="form-label mt-2">Color Adjustments</label>
                                <select class="form-select" name="color_filter">
                                    <option value="none">None</option>
                                    <option value="grayscale">Grayscale</option>
                                    <option value="sepia">Sepia</option>
                                    <option value="contrast">High Contrast</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Generate Ad</button>
                        </div>
                    </form>

                    <!-- Display the generated ad image -->
                    @if (isset($ad_image))
                        <div class="mt-4 text-center">
                            <h4>Generated Ad</h4>
                            <img src="{{ $ad_image }}" alt="Generated Ad" class="img-fluid rounded shadow-sm">
                            <a href="{{ $ad_image }}" download="generated-ad.png" class="btn btn-success mt-3">Download Ad</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage() {
    var input = document.getElementById('image');
    var preview = document.getElementById('image-preview');
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection