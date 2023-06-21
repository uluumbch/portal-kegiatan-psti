<x-app-layout>
    {{-- scheck if pendaftar kegiatan is empty --}}
    @if (count($pendaftarKegiatan) == 0)
        <div class="flex items-center justify-center h-screen">
            <div class="text-center">
                <h1 class="text-4xl font-bold">Belum ada pendaftar</h1>
                <a href="{{ route('dashboard') }}"
                    class="btn btn-primary btn-sm w-full my-1">Kembali</a>
            </div>
        </div>
    @else
    <h2>Pendaftar pada kegiatan: {{ $pendaftarKegiatan[0]->kegiatan->nama }}</h2>
    <span>Jumlah Pendaftar : {{ count($pendaftarKegiatan) }}</span>
    <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal terdaftar</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            @forelse ($pendaftarKegiatan as $item)
                <tr>
              <td>
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                      <img class="max-h-32" src="data:image/jpeg;base64,{{ $item->user->foto }}"
                                        alt="{{ $item->user->nama }}" />
                    </div>
                  </div>
                  <div>
                    <div class="font-bold">{{ $item->user->name }}</div>
                    <div class="text-sm opacity-50">{{ $item->user->email }}</div>
                  </div>
                </div>
              </td>
              <td>
                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
              </td>
            </tr>
            @empty
                
            @endforelse
            
            
          </tbody>
          <!-- foot -->
          <tfoot>
            <tr>
                <th>Nama</th>
                <th>Tanggal terdaftar</th>
            </tr>
          </tfoot>
          
        </table>
      </div>
    @endif
</x-app-layout>