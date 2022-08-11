<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit <?= $title ?></h1>
        <a href="<?= base_url(ADM) ?>/add-slider" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Slider</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->

        <?php
        foreach ($data as $key => $value) {
        ?>
    
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="card text-center">
                    <img class="card-img-top" title="Slider Image" src="<?=base_url()?>/src/uploads/<?=$value["attachment"]?>" alt="Card image cap">
                    <div class="card-header" title="Title 1">
                        <?= $value["title"] ?>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title" title="Title 2"><?= $value["title_2"] ?></h5>
                        <p class="card-text" title="Slider Description"><?= $value["description"] ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex">
                            <div class="col-md-6"> <a href="<?= base_url(ADM) ?>/add-slider/<?= $value['id'] ?>" class="btn btn-primary"> Edit </a> </div>
                            <div class="col-md-6"> <button class="btn btn-danger"> Delete </button> </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>


    </div>
</div>
<!-- /.container-fluid -->

<script>

</script>