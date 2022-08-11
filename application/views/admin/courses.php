<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit <?= $title ?></h1>
        <a href="<?= base_url(ADM) ?>/add-course" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Course</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->

        <?php
        foreach ($data as $key => $value) {
        ?>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                    <figure class="mu-latest-course-img">
                        <a href="#"><img src="src/img/courses/1.jpg" class="img-fluid" alt="img"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                            <a href="#"><?= $value["name"] ?></a>
                            <span class="float-right"><i class="fa fa-clock-o"></i><?= $value["duration"] ?> Days</span>
                        </figcaption>
                    </figure>
                    <h4><a href="#"> <?= $value["short_desc"] ?> </a></h4>
                    <p><?= $value["long_desc"] ?></p>

                    <div class="row my-2">
                        <div class="col-md-4 my-auto">$<?= $value["price"] ?></div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <a class="my-auto btn btn-sm mx-2 btn-dark" href="<?= base_url(ADM) ?>/add-course/<?= $value['id'] ?>"> Edit </a>
                            <a class="my-auto btn btn-sm mx-2 btn-danger" href="<?= base_url(ADM) ?>/delete-course/<?= $value['id'] ?>"> Delete </a>
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