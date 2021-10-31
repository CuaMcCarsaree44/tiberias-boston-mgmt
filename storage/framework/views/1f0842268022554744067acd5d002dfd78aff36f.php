<?php $__env->startSection('title', 'Manajemen Jemaat'); ?>
<?php $__env->startSection('content'); ?>

    <main id="main-container">

        <?php echo $__env->make('crm/template/topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex d-md-block flex-column justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2 text-uppercase">
                        <?php echo e($function === 'create' ? 'Mendaftarkan Jemaat Baru' : 'Data Jemaat ' . $data->name); ?>

                    </h1>
                </div>
            </div>
        </div>

         <!-- Page Content -->
         <div class="content">
             <div class="block block-rounded block-bordered">

                <?php echo e(Form::open([
                    'url' => $endpoint,
                    'method' => $method,
                    'files' => true
                ])); ?>


                    <?php if($function === 'update'): ?> <input type="hidden" value="<?php echo e($data->id); ?>" name="id" /> <?php endif; ?>


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
                                    <?php if($function === 'update'): ?> value="<?php echo e($data->name); ?>" <?php endif; ?>
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
                                        <?php if($function === 'update'): ?> value="<?php echo e($data->phone); ?>" <?php endif; ?>
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
                                    ><?php if($function === 'update'): ?><?php echo e($data->address); ?><?php endif; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <?php if($function === 'update'): ?>
                        <hr />
                        <div class="row mt-1">
                            <div class="col-12 col-md-3 font-weight-bold lead">Penyuntingan Region</div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-12 col-md-3 font-weight-bold">Region Terpilih: <?php echo e($data->district->name); ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="row mt-1">
                        <div class="col-12 col-md-3 font-weight-bold">Provinsi <strong class="text-danger">*</strong></div>
                        <div class="col-6">
                            <select required id="province-jemaat" class="btn btn-primary" onchange="new MemberViewModel().fetchRegencyData()">
                                <option selected value="">-Pilih Provinsi-</option>
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                    <?php if($function === 'update'): ?>
                        <hr />
                        <div class="row mt-1">
                            <div class="col-12 col-md-3 font-weight-bold">Penyuntingan Dokumen KK dan Akte Baptis</div>
                        </div>


                        

                        <div class="row mt-1">
                            <?php $__currentLoopData = $data->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $set): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-12 d-flex mt-1">   
                                    <a target="_blank" class="flex-fill" href="<?php echo e(asset($set->document_link)); ?>">     
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-download"></i> Unduh <?php echo e($key === 0 ? 'KK Terunggah' : 'Akte Baptis Terunggah'); ?>

                                        </button>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="kk-jemaat"><?php if($function === 'update'): ?> Upload Ulang <?php endif; ?> Foto KK (Optional)</label>
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
                                <label for="akte-baptis-jemaat"><?php if($function === 'update'): ?> Upload Ulang <?php endif; ?> Foto Akte Baptis (Optional)</label>
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

                <?php echo e(Form::close()); ?>

                
             </div>
         </div>

         <!-- END Page Content -->

    </main>

    <script type="text/javascript" src="<?php echo e(asset('/js/plugin/cukx-validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/js/js-modules/services/indonesia-services.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/js/js-modules/viewmodel/member-viewmodel.js')); ?>"></script>

    <?php if($function === 'update'): ?>
        <script type="text/javascript">
            document.getElementById('province')
            new MemberViewModel().fetchRegionInformation(<?php echo $data->district->id; ?>)
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yosuakristianto/Documents/Tiberias/diakonia-mgmt/resources/views/crm/member/upsert.blade.php ENDPATH**/ ?>