@extends('templates.main')
    @section('content')


    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
            <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg"
                class="max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Portal Informasi Kegiatan PSTI</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                    exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    {{-- card --}}
    <div class="card card-side bg-base-100 shadow-xl">
        <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"/></figure>
        <div class="card-body">
          <h2 class="card-title">New movie is released!</h2>
          <p>Click the button to watch on Jetflix app.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
      <div class="card card-side bg-base-100 shadow-xl">
        <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"/></figure>
        <div class="card-body">
          <h2 class="card-title">New movie is released!</h2>
          <p>Click the button to watch on Jetflix app.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
@endsection
