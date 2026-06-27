<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        Gestion des abonnés
    </h2>

    <a href="<?php echo e(route('abonnes.create')); ?>"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Ajouter un abonné

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $abonnes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($abonne->id); ?></td>
                    <td><?php echo e($abonne->nom); ?></td>
                    <td><?php echo e($abonne->email); ?></td>
                    <td><?php echo e($abonne->telephone); ?></td>
                    <td><?php echo e($abonne->adresse); ?></td>

                    <td>

                        <a href="<?php echo e(route('abonnes.edit',$abonne->id)); ?>"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="<?php echo e(route('abonnes.destroy',$abonne->id)); ?>"
                              method="POST"
                              class="d-inline">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cet abonné ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="6" class="text-center">

                        Aucun abonné enregistré

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/abonnes/index.blade.php ENDPATH**/ ?>