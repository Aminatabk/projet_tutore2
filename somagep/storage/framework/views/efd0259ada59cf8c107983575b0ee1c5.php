<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">
        Mon espace client
    </h2>

    <div class="alert alert-info">
        Bienvenue <?php echo e(auth()->user()->name); ?>

    </div>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card card-dashboard">

                <div class="card-body text-center">

                    <h1>
                        <?php echo e(App\Models\Facture::count()); ?>

                    </h1>

                    Mes Factures

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-dashboard">

                <div class="card-body text-center">

                    <h1>
                        <?php echo e(App\Models\Consommation::count()); ?>

                    </h1>

                    Mes Consommations

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-dashboard">

                <div class="card-body text-center">

                    <h1>
                        <?php echo e(App\Models\Reclamation::count()); ?>

                    </h1>

                    Mes Réclamations

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/client/dashboard.blade.php ENDPATH**/ ?>