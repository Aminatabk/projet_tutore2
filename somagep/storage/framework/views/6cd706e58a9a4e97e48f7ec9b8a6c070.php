<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
    Tableau de bord Administrateur
</h2>

<div class="row">

    <!-- Abonnés -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <h1>
                    <?php echo e(App\Models\Abonne::count()); ?>

                </h1>

                <h5>Abonnés</h5>

            </div>

        </div>

    </div>

    <!-- Consommations -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-droplet-fill"></i>
                </div>

                <h1>
                    <?php echo e(App\Models\Consommation::count()); ?>

                </h1>

                <h5>Consommations</h5>

            </div>

        </div>

    </div>

    <!-- Factures -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-receipt"></i>
                </div>

                <h1>
                    <?php echo e(App\Models\Facture::count()); ?>

                </h1>

                <h5>Factures</h5>

            </div>

        </div>

    </div>

    <!-- Utilisateurs -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-person-badge-fill"></i>
                </div>

                <h1>
                    <?php echo e(App\Models\User::count()); ?>

                </h1>

                <h5>Utilisateurs</h5>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">
            Activités récentes
        </h5>

    </div>

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>

            </thead>

            <tbody>

            <?php $__currentLoopData = App\Models\Abonne::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td><?php echo e($abonne->id); ?></td>

                    <td>
                        <strong><?php echo e($abonne->nom); ?></strong>
                    </td>

                    <td><?php echo e($abonne->email); ?></td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>