<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                            
                <form method="post" action="{{ route('images.store') }}" 
                        enctype="multipart/form-data">
                    @csrf
                    <div class="image">
                        <label><h4>Add image</h4></label>
                        <input type="file" class="form-control" required name="profile_image">
                    </div>
                
                    <div class="post_button">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
      
            </div>
        </div>
    </div>
</div>