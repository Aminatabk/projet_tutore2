<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des Réclamations</h2>

    <a href="<?php echo e(route('reclamations.create')); ?>"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Nouvelle réclamation

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>Sujet</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $reclamations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reclamation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($reclamation->id); ?></td>

                    <td>
                        <strong><?php echo e($reclamation->sujet); ?></strong>
                    </td>

                    <td><?php echo e($reclamation->description); ?></td>

                    <td>

                        <span class="badge bg-warning">
                            <?php echo e($reclamation->statut); ?>

                        </span>

                    </td>

                    <td>

                        <a href="<?php echo e(route('reclamations.edit',$reclamation->id)); ?>"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                        <form action="<?php echo e(route('reclamations.destroy',$reclamation->id)); ?>"
                              method="POST"
                              class="d-inline">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cette réclamation ?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>
                    <td colspan="5" class="text-center">
                        Aucune réclamation trouvée
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/reclamations/index.blade.php ENDPATH**/ ?>