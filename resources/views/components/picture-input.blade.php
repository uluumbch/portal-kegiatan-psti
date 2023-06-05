<div class="flex items-center justify-between" x-data="preview()">
    <div class="avatar">
        <div class="w-24 rounded-full">
          <img id="preview"  src="https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png" alt="Profile Picture Default Png@nicepng.com">
        </div>
    </div> 
    <div class="">
        <button type="button" @click="document.getElementById('foto').click()" class="relative btn btn-primary flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
              </svg>
              
            Pilih gambar
            <input @change="showPreview(event)" type="file" name="foto" id="foto" class="absolute inset-0 -z-10 opacity-0">
        </button>
    </div>
    <script>
        function preview(){
            return {
                showPreview: (event)=> {
                    if(event.target.files.length > 0){
                        let src = URL.createObjectURL(event.target.files[0]);
                        let preview = document.getElementById("preview");
                        preview.src = src;
                    }
                }
            }
        }
    </script>
</div>