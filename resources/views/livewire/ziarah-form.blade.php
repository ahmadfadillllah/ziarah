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
                    <input class="input--style-4" type="text" required name="nohp" wire:model.defer="no_hp">
                    @error('no_hp')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>


                <div class="row row-space">
                    <div class="col-2">

                        <div class="input-group" x-data="{isOpen: false}">
                            <label class="label">Nama Jenazah*</label>
                            <input class="input--style-4" type="text" wire:model.debounce.500ms="namaJenazah"
                                x-on:input="isOpen = true">
                            @error('namaJenazah')
                            <small style="color: #ff6565">{{ $message }}</small>
                            @enderror
                            <div class="suggestion-box" x-show="isOpen" x-on:click.away="isOpen = false">
                                {{-- <span class="d-none" wire:target='namaJenazah' wire:loading.class.remove='d-none'
                                    style="text-align: center; display: inline-block; position: relative; width: 100%">memuat...</span> --}}
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
                        <select class="select" wire:model="tanggal_dipilih">
                            <option selected="selected" wire:click="$set('daftar_jadwal', [])">Pilih Tanggal</option>

                            @foreach ($tanggal_ziarah as $_tanggal)
                            @if ($_tanggal['id'] === null)
                            <option disabled>
                                {{$_tanggal['pesan']}}
                            </option>
                            @else
                            <option @if( $tanggal_dipilih===$_tanggal['id']) selected @endif
                                value="{{ $_tanggal['id'] }}" class="text-align: justify">
                                {{$_tanggal['tanggal']}} -
                                {{ date('F',strtotime("01-".$_tanggal['bulan']."-".date("Y")))}} -
                                {{$_tanggal['tahun']}}
                            </option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                    @error('tanggal_dipilih')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>

                <div class="container" style="margin-top: 5px">
                    <label class="label">Jadwal Ziarah*</label>
                    <div class="select-wrapper"
                        style="width: 100%; box-shadow: 0 0 5px #99999971; border-radius: 5px; overflow: hidden">
                        <select class="select" wire:model.defer="waktu_dipilih">
                            <option selected="selected" wire:click="$set('waktu_ziarah', [])">Pilih Jam</option>
                            @foreach ($waktu_ziarah as $waktu)
                            @if ($waktu['id'] === null)
                            <option disabled>{{$waktu['pesan']}}</option>
                            @else
                            <option @if( $waktu_dipilih===$waktu['id']) selected @endif value="{{ $waktu['id'] }}">
                                {{$waktu['dari']}} - {{$waktu['sampai']}} : {{$waktu['tipe']}}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @error('waktu_dipilih')
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

    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2021 <a href="https://covid19.sulselprov.go.id/" class="font-weight-bold ml-1"
                        target="_blank">Satgas Covid-19</a>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://infocorona.makassar.go.id/" class="nav-link" target="_blank">Info Corona</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://covid19.sulselprov.go.id/data" class="nav-link" target="_blank">Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

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
