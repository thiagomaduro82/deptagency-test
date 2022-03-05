<?php
use App\Http\Controllers\ApiController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API - Teste - DeptAgency</title>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <span class="navbar-brand">API-Test DeptAgency</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="row my-2">
            <div class="col">
                <form action="<?php echo e(route('api.search')); ?>" method="post" class="row g-3">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-6">
                        <label for="inputSearch" class="form-label">Search</label>
                        <input type="text" class="form-control" id="inputSearch" name="inputSearch">
                    </div>
                    <div class="col-md-2">
                        <label for="inputOption" class="form-label">options</label>
                        <select id="inputOption" class="form-select" name="inputOption">
                            <option value="author">Author</option>
                            <option value="genre">Genre</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h4>Books List</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ApiController::printData($book['_id'])); ?></td>
                                <td><?php echo e(ApiController::printData($book['titleInfo'])); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>


            </div>

        </div>
    </div>

</body>

</html>
<?php /**PATH /home/thiago/dev/api/resources/views/welcome.blade.php ENDPATH**/ ?>