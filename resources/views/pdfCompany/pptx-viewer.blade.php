<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">PPTX Viewer</h1>
        <div class="aspect-w-16 aspect-h-9">


            <iframe src="https://docs.google.com/gview?url={{ urlencode($fileUrl) }}&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>
        </div>
    </div>
</x-app-layout>
