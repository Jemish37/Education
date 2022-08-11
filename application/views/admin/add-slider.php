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
                
            <?php
            } else {
            ?>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Slider Title</label>
                        <input type="text" id="title" class="form-control" placeholder="Enter Title Name">
                    </div>
                    <div class="form-group">
                        <label>Slider Title 2</label>
                        <input type="text" id="title2" class="form-control" placeholder="Enter Title 2">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label>Slider Image</label>
                        <input type="file" name="file" class="form-control-file">
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
        form.append("title", $("#title").val());
        form.append("title2", $("#title2").val());
        form.append("description", $("#description").val());
        form.append("duration", $("#duration").val());
        form.append('image', $('input[type=file]')[0].files[0]); 

        <?php
        if (isset($data) && count($data) > 0) {
        ?>
            form.append("id", $("#id").val());
        <?php
        }
        ?>
        var settings = {
            "url": "<?= base_url(ADM) ?>/add-sliderdata",
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