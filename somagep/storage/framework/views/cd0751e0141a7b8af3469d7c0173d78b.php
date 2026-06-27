<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Tableau de bord</h2>
        <p class="text-muted">
            Bienvenue dans le système de gestion SOMAGEP
        </p>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold text-primary">
                    <?php echo e(App\Models\Abonne::count()); ?>

                </h1>
                <h5>Abonnés</h5>
                <p class="text-muted">
                    Nombre total d'abonnés enregistrés
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold text-success">
                    <?php echo e(App\Models\Facture::count()); ?>

                </h1>
                <h5>Factures</h5>
                <p class="text-muted">
                    Nombre total de factures générées
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold text-warning">
                    <?php echo e(App\Models\Paiement::count()); ?>

                </h1>
                <h5>Paiements</h5>
                <p class="text-muted">
                    Paiements enregistrés dans le système
                </p>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h4 class="mb-3">
                    Aperçu du système
                </h4>

                <p>
                    Cette plateforme permet la gestion des abonnés,
                    des consommations, des factures, des paiements,
                    des réclamations et des utilisateurs de la SOMAGEP.
                </p>

            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/dashboard/index.blade.php ENDPATH**/ ?>