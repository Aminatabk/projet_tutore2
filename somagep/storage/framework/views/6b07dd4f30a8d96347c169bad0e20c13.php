<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        Gestion des consommations
    </h2>

    <a href="<?php echo e(route('consommations.create')); ?>"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Nouvelle consommation

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-info">

                <tr>
                    <th>ID</th>
                    <th>Abonné</th>
                    <th>Ancien Index</th>
                    <th>Nouvel Index</th>
                    <th>Consommation</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $consommations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consommation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($consommation->id); ?></td>

                    <td>
                        <?php echo e($consommation->abonne->nom ?? 'N/A'); ?>

                    </td>

                    <td><?php echo e($consommation->ancienne_valeur); ?></td>

                    <td><?php echo e($consommation->nouvelle_valeur); ?></td>

                    <td>
                        <span class="badge bg-primary">
                            <?php echo e($consommation->consommation); ?> m³
                        </span>
                    </td>

                    <td>

                        <a href="<?php echo e(route('consommations.edit',$consommation->id)); ?>"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="<?php echo e(route('consommations.destroy',$consommation->id)); ?>"
                              method="POST"
                              class="d-inline">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cette consommation ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="6" class="text-center">
                        Aucune consommation enregistrée
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/consommations/index.blade.php ENDPATH**/ ?>