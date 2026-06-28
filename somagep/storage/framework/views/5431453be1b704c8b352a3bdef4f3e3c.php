<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des Factures</h2>

    <a href="<?php echo e(route('factures.create')); ?>"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Nouvelle facture

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>

                    <th>ID</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            <?php $__currentLoopData = $factures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td><?php echo e($facture->id); ?></td>

                    <td>
                        <?php echo e($facture->montant); ?> FCFA
                    </td>

                    <td>
                        <?php echo e($facture->created_at); ?>

                    </td>

                    <td>

                        <span class="badge bg-success">
                            Payée
                        </span>

                    </td>

                    <td>

                        <a href="<?php echo e(route('factures.edit',$facture->id)); ?>"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/factures/index.blade.php ENDPATH**/ ?>