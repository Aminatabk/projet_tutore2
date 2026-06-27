<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des Utilisateurs</h2>

    <a href="<?php echo e(route('users.create')); ?>"
       class="btn btn-primary">

        <i class="bi bi-person-plus"></i>
        Ajouter utilisateur

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>

                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($user->id); ?></td>

                    <td><?php echo e($user->name); ?></td>

                    <td><?php echo e($user->email); ?></td>

                    <td>

                        <?php if($user->role == 'admin'): ?>

                            <span class="badge bg-danger">
                                Administrateur
                            </span>

                        <?php elseif($user->role == 'agent'): ?>

                            <span class="badge bg-primary">
                                Agent
                            </span>

                        <?php else: ?>

                            <span class="badge bg-success">
                                Client
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <a href="<?php echo e(route('users.edit',$user->id)); ?>"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="5" class="text-center">

                        Aucun utilisateur trouvé

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/users/index.blade.php ENDPATH**/ ?>