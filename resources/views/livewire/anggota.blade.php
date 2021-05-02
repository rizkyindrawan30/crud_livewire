<div>
    <h2>Data Mahasiswa</h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <button wire:click="create()" class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Anggota</button>
                @if($isModalOpen)
                @include('livewire.create')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">NIS</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Kelas</th>
                            <th class="px-4 py-2">Jurusan</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($anggota_perpuses as $anggota)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $no }}</td>
                            <td class="border px-4 py-2">{{ $anggota->nis }}</td>
                            <td class="border px-4 py-2">{{ $anggota->nama}}</td>
                            <td class="border px-4 py-2">{{ $anggota->kelas}}</td>
                            <td class="border px-4 py-2">{{ $anggota->jurusan}}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{ $anggota->id }})" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"><i class="fas fa-pencil-alt"></i></button>
                                <button wire:click="delete({{ $anggota->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>