<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit <?= $title ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-8 col-md-12 mb-4">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">About Content</label>
                    <textarea class="form-control" id="about_text" id="exampleFormControlTextarea1" rows="3">
                        <?= $data["about_text"] ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Video Link</label>
                    <input type="text" class="form-control" id="about_video" value="<?= $data["about_video"] ?>" placeholder="Enter Video Link">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });


    $("button").click(function() {
        event.preventDefault();
        tinyMCE.triggerSave();

        var form = new FormData();
        form.append("about_text", $("#about_text").val());
        form.append("about_video", $("#about_video").val());

        var settings = {
            "url": "<?= base_url(ADM) ?>/update-aboutdata",
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