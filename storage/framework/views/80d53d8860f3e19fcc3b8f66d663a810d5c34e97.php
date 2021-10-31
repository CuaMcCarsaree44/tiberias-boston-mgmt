<?php $__env->startSection('title', 'Manajemen Jemaat'); ?>
<?php $__env->startSection('content'); ?>

    <main id="main-container">

        <?php echo $__env->make('crm/template/topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex d-md-block flex-column justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2 text-uppercase">Manajemen Jemaat</h1>

                    <p>
                        Tambah, kelola, dan cari data Jemaat Gereja Tiberias Boston Square.
                    </p>
                </div>
            </div>
        </div>

         <!-- Page Content -->
         <div class="content">
             <div class="block block-rounded block-bordered">

                <div class="row">
                    <div class="col-12 col-md-3 mt-1 mt-md-0 d-flex d-flex">
                        <select id="region_id" class="btn btn-primary flex-fill">
                            <option selected value="">SELURUH REGION</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 mt-1 mt-md-0 d-flex">
                        <input type="text" class="form-control flex-fill" id="search" placeholder="Cari">
                    </div>

                    <div class="col-12 col-md-1 mt-1 mt-md-0 d-flex">
                        <button type="button" class="btn btn-primary flex-fill" id="search-btn" onclick="new MemberViewModel().fetchMemberList()">
                            <i class="fa fa-search mr-1"></i> Cari
                        </button>
                    </div>

                    <div class="col-12 col-md-4 order-12 mt-1 mt-md-0 d-flex">
                        <button type="button" class="btn btn-primary flex-fill" onclick="location.href = '/crm/member/create';">
                            <i class="fa fa-plus mr-1"></i> Tambah Jemaat
                        </button>
                    </div>
                </div>

                 <div id="datalist" class="block-content"></div>
             </div>
         </div>

         <!-- END Page Content -->

    </main>

    <script type="text/javascript" src="<?php echo e(asset('/js/js-modules/services/member-services.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/js/js-modules/services/indonesia-services.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/js/js-modules/viewmodel/member-viewmodel.js')); ?>"></script>

    <script type="text/javascript">
        const viewmodel = new MemberViewModel();
        viewmodel.fetchMemberList();
        viewmodel.fetchUsedRegionList();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yosuakristianto/Documents/Tiberias/diakonia-mgmt/resources/views/crm/member/list.blade.php ENDPATH**/ ?>