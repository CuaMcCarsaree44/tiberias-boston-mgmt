@extends('template.master')
@section('title', 'Manajemen Jemaat')
@section('content')

    <main id="main-container">

        @include('crm/template/topbar')

        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex d-md-block flex-column justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2 text-uppercase">
                        {{ $function === 'create' ? 'Mendaftarkan Jemaat Baru' : 'Data Jemaat ' . $data->name }}
                    </h1>
                </div>
            </div>
        </div>

         <!-- Page Content -->
         <div class="content">
             <div class="block block-rounded block-bordered">

                {{ Form::open([
                    'url' => $endpoint,
                    'method' => $method,
                    'files' => true
                ]) }}

                    @if($function === 'update') <input type="hidden" value="{{ $data->id }}" name="id" /> @endif


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama-jemaat">Nama Jemaat <strong class="text-danger">*</strong></label>
                                <input 
                                    type="text" 
                                    class="form-control anti-xss cant-pre-space" 
                                    id="nama-jemaat" 
                                    name="name"
                                    maxlength="100"
                                    placeholder="Nama Jemaat (e.g. Prisiela Evita)" 
                                    required
                                    @if($function === 'update') value="{{ $data->name }}" @endif
                                    />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone-jemaat">Nomor Telepon <strong class="text-danger">*</strong></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">(08)</span>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control anti-xss cant-space input-number-only" 
                                        id="phone-jemaat" 
                                        name="phone"
                                        placeholder="Nomor Telepon Jemaat (TIDAK PERLU INPUT 0 ATAU +62 LAGI)" 
                                        required
                                        @if($function === 'update') value="{{ $data->phone }}" @endif
                                        />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat-jemaat">Alamat Lengkap <strong class="text-danger">*</strong></label>
                                <textarea 
                                    class="form-control anti-xss cant-pre-space" 
                                    id="alamat-jemaat" 
                                    name="address"
                                    placeholder="Alamat Lengkap (e.g. Boston Square - Kota Wisata. RK 1/ 42 - 45. C, Ciangsana, Kec. Gn. Putri, Bogor, Jawa Barat 16968)" 
                                    style="resize: none;"
                                    rows="5"
                                    cols="51"
                                    maxlength="255"
                                    required
                                    >@if($function === 'update'){{$data->address}}@endif</textarea>
                            </div>
                        </div>
                    </div>

                    @if($function === 'update')
                        <hr />
                        <div class="row mt-1">
                            <div class="col-12 col-md-3 font-weight-bold lead">Penyuntingan Region</div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-12 col-md-3 font-weight-bold">Region Terpilih: {{ $data->district->name }}</div>
                        </div>
                    @endif

                    <div class="row mt-1">
                        <div class="col-12 col-md-3 font-weight-bold">Provinsi <strong class="text-danger">*</strong></div>
                        <div class="col-6">
                            <select required id="province-jemaat" class="btn btn-primary" onchange="new MemberViewModel().fetchRegencyData()">
                                <option selected value="">-Pilih Provinsi-</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-md-3 font-weight-bold">Kabupaten <strong class="text-danger">*</strong></div>
                        <div class="col-6">
                            <select required id="regency-jemaat" name="regency_id" class="btn btn-primary" onchange="new MemberViewModel().fetchRegionData()">
                                <option selected value="">-Pilih Kabupaten-</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-md-3 font-weight-bold">Region <strong class="text-danger">*</strong></div>
                        <div class="col-6">
                             <select required id="district-jemaat" name="district_id" class="btn btn-primary">
                                <option selected value="">-Pilih Region-</option>
                            </select>
                        </div>
                    </div>

                    @if($function === 'update')
                        <hr />
                        <div class="row mt-1">
                            <div class="col-12 col-md-3 font-weight-bold">Penyuntingan Dokumen KK dan Akte Baptis</div>
                        </div>


                        

                        <div class="row mt-1">
                            @foreach($data->documents as $key => $set)

                                <div class="col-12 d-flex mt-1">   
                                    <a target="_blank" class="flex-fill" href="{{ asset($set->document_link) }}">     
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-download"></i> Unduh {{ $key === 0 ? 'KK Terunggah' : 'Akte Baptis Terunggah' }}
                                        </button>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="kk-jemaat">@if($function === 'update') Upload Ulang @endif Foto KK (Optional)</label>
                                <input 
                                    type="file" 
                                    accept="image/*"
                                    class="form-control" 
                                    id="kk-jemaat" 
                                    name="kk"
                                    />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="akte-baptis-jemaat">@if($function === 'update') Upload Ulang @endif Foto Akte Baptis (Optional)</label>
                                <input 
                                    type="file" 
                                    accept="image/*"
                                    class="form-control" 
                                    id="akte-baptis-jemaat" 
                                    name="akte-baptis"
                                    />
                            </div>
                        </div>
                    </div>

                    <strong class="text-danger">* PASTIKAN BAHWA DATA YANG ANDA INPUT SUDAH BENAR </strong>

                    <div class="row mt-3">
                        <div class="col-12 d-flex">
                            <button type="submit" class="btn btn-primary flex-fill">
                                Daftarkan Jemaat
                            </button>
                        </div>
                    </div>

                {{ Form::close() }}
                
             </div>
         </div>

         <!-- END Page Content -->

    </main>

    <script type="text/javascript" src="{{ asset('/js/plugin/cukx-validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/js-modules/services/indonesia-services.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/js-modules/viewmodel/member-viewmodel.js') }}"></script>

    @if($function === 'update')
        <script type="text/javascript">
            document.getElementById('province')
            new MemberViewModel().fetchRegionInformation({!! $data->district->id !!})
        </script>
    @endif
@endsection

