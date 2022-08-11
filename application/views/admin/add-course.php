<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit <?= $title ?></h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($data) && count($data) > 0) {
            ?>
                <form>
                    <div class="form-group d-none">
                        <label>Course ID</label>
                        <input type="text" id="id" class="form-control" value="<?= $data["id"] ?>" >
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" id="name" class="form-control" value="<?= $data["name"] ?>" placeholder="Enter Course Name">
                    </div>
                    <div class="form-group">
                        <label>Course Short Description</label>
                        <input type="text" id="shortDescription" class="form-control" value="<?= $data["short_desc"] ?>" placeholder="Enter Course Short Description">
                    </div>
                    <div class="form-group">
                        <label>Course Long Description</label>
                        <input type="text" id="longDescription" class="form-control" value="<?= $data["long_desc"] ?>" placeholder="Enter Course Long Description">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="number" id="duration" class="form-control" value="<?= $data["duration"] ?>" placeholder="Enter Course Duration">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" id="price" class="form-control" value="<?= $data["price"] ?>" placeholder="Enter Course Price">
                    </div>
                    <button type="submit" id="add" class="my-2 btn btn-primary">Update</button>
                </form>
            <?php
            } else {
            ?>
                <form>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Course Name">
                    </div>
                    <div class="form-group">
                        <label>Course Short Description</label>
                        <input type="text" id="shortDescription" class="form-control" placeholder="Enter Course Short Description">
                    </div>
                    <div class="form-group">
                        <label>Course Long Description</label>
                        <input type="text" id="longDescription" class="form-control" placeholder="Enter Course Long Description">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="number" id="duration" class="form-control" placeholder="Enter Course Duration">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" id="price" class="form-control" placeholder="Enter Course Price">
                    </div>
                    <button type="submit" id="add" class="my-2 btn btn-primary">Add</button>
                </form>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    $("#add").click(function() {
        event.preventDefault();

        var form = new FormData();
        form.append("name", $("#name").val());
        form.append("shortDescription", $("#shortDescription").val());
        form.append("longDescription", $("#longDescription").val());
        form.append("duration", $("#duration").val());
        form.append("price", $("#price").val());
        <?php
        if (isset($data) && count($data) > 0) {
        ?>
            form.append("id", $("#id").val());
        <?php
        }
        ?>
        var settings = {
            "url": "<?= base_url(ADM) ?>/add-coursedata",
            "method": "POST",
            "data": form,
            "contentType": false,
            "processData": false,
        };

        $.ajax(settings).done(function(response) {
            let res = JSON.parse(response);
            if (res.status) {
                Swal.fire('Good job!', res.msg, 'success');
            } else {
                Swal.fire('Opps', res.msg, 'error');
            }
        });
    });
</script>