<?php

namespace App\Http\Livewire;

use App\Models\AnggotaPerpus;
use Livewire\Component;

class Anggota extends Component
{
    public $anggota_perpuses, $nis, $nama, $kelas, $jurusan, $anggota_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->anggota_perpuses = AnggotaPerpus::all();
        return view('livewire.anggota');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function resetCreateForm()
    {
        $this->nis = '';
        $this->nama = '';
        $this->kelas = '';
        $this->jurusan = '';
    }

    public function store()
    {
        $this->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
        ]);

        AnggotaPerpus::updateOrCreate(['id' => $this->anggota_id], [
            'nis' => $this->nis,
            'nama' => $this->nama,
            'kelas' => $this->kelas,
            'jurusan' => $this->jurusan,
        ]);

        session()->flash('message', $this->anggota_id ? 'AnggotaPerpus update.' : 'AnggotaPerpus create.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $anggota = AnggotaPerpus::findOrFail($id);
        $this->id       = $id;
        $this->nis      = $anggota->nis;
        $this->nama     = $anggota->nama;
        $this->kelas    = $anggota->kelas;
        $this->jurusan  = $anggota->jurusan;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        AnggotaPerpus::find($id)->delete();
        session()->flash('message', 'Studen deleted.');
    }
}
