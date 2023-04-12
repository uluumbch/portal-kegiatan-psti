<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                <div class="flex justify-end py-2">
                    <button class="btn btn-primary gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          <a href="{{route('admin.create')}}">
                              Buat pengumuman
                            </a>
                    </button>
                </div>
                <div class=" w-full">
                    <table class="table w-full">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Kegiatan</th>
                          <th>Deskripsi</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        <tr>

                          <td class="w-1/3">
                            <div class="flex items-center space-x-3">
                              <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                  <img src="https://daisyui.com/tailwind-css-component-profile-2@56w.png" alt="Avatar Tailwind CSS Component" />
                                </div>
                              </div>
                              <div>
                                <div class="font-bold break-words whitespace-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, nesciunt!</div>
                              </div>
                            </div>
                          </td>
                          <td class="w-2/3 break-words whitespace-normal">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique magni quam accusantium rerum, dolorem vitae minus temporibus vero doloribus labore nihil quidem possimus, delectus vel consequuntur magnam nesciunt provident laboriosam?
                          </td>
                          <th>
                            <button class="btn btn-secondary text-secondary-content btn-sm">edit</button>
                            <button class="btn btn-error btn-sm text-error-content">hapus</button>
                          </th>
                        </tr>
                        <!-- row 2 -->

                      </tbody>
                      <!-- foot -->
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Deskripsi</th>
                          <th></th>
                        </tr>
                      </tfoot>

                    </table>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
