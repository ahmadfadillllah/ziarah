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
                    <label class="label">Nama Peziarah</label>
                    <input class="input--style-4" type="text" name="namapeziarah" wire:model.defer="nama">
                    @error('nama')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Tanggal Meninggal</label>
                            <div class="input-group-icon">
                                <input class="input--style-4 js-datepicker" type="text" name="tanggalmeninggal"
                                    wire:model.lazy="tgl_wafat">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
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
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label class="label">Nama Jenazah</label>
                    <input class="input--style-4" type="text" wire:model.debounce.200ms="namaJenazah">
                    @error('namaJenazah')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                    @if (count($suggestion_name) >= 1)
                    <div class="suggestion-box">
                        @foreach ($suggestion_name as $data)
                        <button type="button" class="sugg-item"
                            wire:click="ubahNama('{{ $data['nama'] }}', '{{ Crypt::encrypt($data['id']) }}')">
                            {{$data['nama']}}
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Email</label>
                            <input class="input--style-4" type="email" name="email" wire:model="email">
                            @error('email')
                            <small style="color: #ff6565">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">No. Handphone (Whatsapp)</label>
                            <input class="input--style-4" type="text" name="nohp" wire:model="no_hp">
                            @error('no_hp')
                            <small style="color: #ff6565">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="container">
                    <label class="label">Jadwal Ziarah</label>
                    <div class="select-wrapper" style="width: 100%; box-shadow: 0 0 5px #99999971; border-radius: 5px; overflow: hidden">
                        <select class="select" wire:model="jadwal">
                            <option disabled="disabled" selected="selected">Choose option</option>
                            <option value="09.30-10.00:WITA">09.30 - 10.00 WITA</option>
                            <option value="10.00-10.30:WITA">10.00 - 10.30 WITA</option>
                            <option value="10.30-11.00:WITA">10.30 - 11.00 WITA</option>
                            <option value="11.00-11.30:WITA">11.00 - 11.30 WITA</option>
                            <option value="15.30-16.00:WITA">15.30 - 16.00 WITA</option>
                            <option value="16.00-16.30:WITA">16.00 - 16.30 WITA</option>
                            <option value="16.30-17.00:WITA">16.30 - 17.00 WITA</option>
                            <option value="17.00-17.30:WITA">17.00 - 17.30 WITA</option>
                        </select>
                    </div>
                    @error('jadwal')
                    <small style="color: #ff6565">{{ $message }}</small>
                    @enderror
                </div>

            <div class="p-t-15">
                <button class="btn btn--radius-2 btn--blue" type="submit" wire:click="simpan">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>
