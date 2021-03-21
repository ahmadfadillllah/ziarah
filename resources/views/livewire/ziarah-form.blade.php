<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <img src="{{ asset('form/images/logo.png') }}" alt="" srcset="" width="150px"
                    style="display: block; margin: auto;">
                <center>
                    <h2 class="title">PENDAFTARAN ZIARAH KUBUR TPK MACANDA</h2>
                </center>
                <div class="input-group">
                    <label class="label">Nama Peziarah*</label>
                    <input class="input--style-4" type="text" name="namapeziarah" wire:model.defer="nama">
                    @error('nama')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Email*</label>
                            <input class="input--style-4" type="email" name="email" wire:model.defer="email">
                            @error('email')
                            <small style="color: #ff6565">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Jenis Kelamin</label>
                            <div class="p-t-10">
                                <label class="radio-container m-r-45">Pria
                                    <input type="radio" name="jeniskelamin" wire:model.defer="jenis_kelamin"
                                        value="pria">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Wanita
                                    <input type="radio" name="jeniskelamin" wire:model.defer="jenis_kelamin"
                                        value="wanita">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('jenis_kelamin')
                            <small style="color: #ff6565; margin-top: 8px; display: inline-block">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="input-group">
                    <label class="label">No. Handphone* (Whatsapp)</label>
                    <input class="input--style-4" type="text" name="nohp" wire:model.defer="no_hp">
                    @error('no_hp')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>


                <div class="row row-space">
                    <div class="col-2">

                        <div class="input-group">
                            <label class="label">Nama Jenazah*</label>
                            <input class="input--style-4" type="text" wire:model.debounce.100ms="namaJenazah">
                            @error('namaJenazah')
                            <small style="color: #ff6565">{{ $message }}</small>
                            @enderror
                            @if (count($suggestion_name) >= 1)
                            <div class="suggestion-box">
                                @foreach ($suggestion_name as $data)
                                <button type="button" class="sugg-item"
                                    wire:click="dapatkanDataLenkap('{{ Crypt::encrypt($data['id']) }}')">
                                    @if ($data['blok'] !== null)
                                    {{"({$data['blok']})"}}
                                    @endif
                                    {{$data['nama']}}
                                </button>
                                @endforeach
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-2">

                        <div class="input-group">
                            <label class="label">Alamat jenazah</label>
                            <input class="input--style-4" type="text" disabled value="{{ $alamat_jenazah }}">
                        </div>

                    </div>
                </div>

                <div class="container">
                    <label class="label">Tanggal ziarah*</label>
                    <div class="select-wrapper"
                        style="width: 100%; box-shadow: 0 0 5px #99999971; border-radius: 5px; overflow: hidden">
                        <select class="select" wire:model.defer="tanggal">
                            <option selected="selected" wire:click="$set('daftar_jadwal', [])">Pilih Tanggal</option>
                            @foreach ($tanggal as $_tanggal)
                            <option @if( $tanggal===$_tanggal['id']) selected @endif value="{{ $_tanggal['id'] }}">
                                {{$_tanggal['tanngal']}} - {{$_tanggal['bulan']}} - {{$_tanggal['tahun']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @error('jadwal')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>

                <div class="container" style="margin-top: 5px">
                    <label class="label">Jadwal Ziarah*</label>
                    <div class="select-wrapper"
                        style="width: 100%; box-shadow: 0 0 5px #99999971; border-radius: 5px; overflow: hidden">
                        <select class="select" wire:model.defer="jadwal">
                            <option selected="selected" wire:click="$set('waktu_ziarah', [])">Pilih Jam</option>
                            @foreach ($waktu_ziarah as $waktu)
                            @if ($waktu['id'] === null)
                            <option disabled>{{$waktu['jadwal']}}</option>
                            @else
                            <option @if( $jadwal===$waktu['id']) selected @endif value="{{ $waktu['id'] }}">
                                {{$waktu['jadwal']}}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @error('jadwal')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>

                <div class="p-t-15">
                    <button class="btn btn--radius-2 btn--blue" type="submit" wire:click="simpan" wire:target='simpan'
                        wire:loading.attr='disabled' wire:loading.class='btn-disabled'>
                        <span wire:target='simpan' wire:loading.class='d-none'>Submit</span>
                        <span class="d-none" wire:target='simpan' wire:loading.class.remove='d-none'>Mengirim</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('onActionInfo', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.title,
                text: event.detail.message,
            });
        })
    </script>

</div>
