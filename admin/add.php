<?php 
session_start();

if (!isset($_SESSION['aname'])) {
    header('location: index.php');
  }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <script type="text/javascript">
            function fileValidation() {
                var fileInput = document.getElementById('upload_image');
                var filePath = fileInput.value;
                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    alert('Please upload file having extensions .jpeg/.jpg/.png only.');
                    fileInput.value = '';
                    return false;
                }
            }
        </script>
        <title> Add Item - T7S</title>

        <script src="../js/admin/uc/jquery.min.js"></script>
        <script src="../js/admin/uc/bootstrap.min.js"></script>

        <script src="../js/admin/uc/croppie.js"></script>
        
        <link rel="stylesheet" href="../css/admin/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/admin/croppie.css" />
        <link rel="stylesheet" href="../css/user/style.css">

        <script>
            $(document).ready(function() {

                var image_crop = $('#image_demo').croppie({

                    viewport: {
                        width: 250,
                        height: 250,
                        type: 'square' //circle
                    },
                    boundary: {
                        width: 300,
                        height: 300
                    }

                });

                $('#upload_image').on('change', function() {

                    var reader = new FileReader();
                    reader.onload = function(event) {
                        image_crop.croppie('bind', {
                            url: event.target.result
                        }).then(function() {
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#uploadimageModal').modal('show');
                });

                $('.crop_image').click(function() {
                    image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function(response) {
                        $.ajax({
                            url: "server.php",
                            type: "POST",
                            data: {
                                "image": response
                            },
                            success: function(data) {
                                $('#uploadimageModal').modal('hide');
                                $('#uploaded_image').html(data);
                            }
                        });
                    })
                });

            });
        </script>

    </head>

    <body>
        <div class="container">
            <form id="rendered-form" method="post" action="server.php" enctype="multipart/form-data">
                <div class="rendered-form">
                    <div class="">
                        <h1 id="control-5757856" align="center">ADD ITEM - ADMIN</h1></div>
                    <div class="fb-text form-group field-pname">
                        <label for="pname" class="fb-text-label">ITEM NAME</label>
                        <input placeholder="Item Name" maxlength="35" type="text" class="form-control" name="pname" id="pname" required="">
                    </div>
                    <div class="fb-text form-group field-text2">
                        <label for="pprice" class="fb-text-label">ITEM PRICE</label>
                        <input placeholder="Item Price eg : 1234.12 " maxlength="10" pattern="[0-9]+(\.){1}[0-9]{2}" type="text" class="form-control" name="pprice" id="pprice" required="">
                    </div>
                    <div class="fb-select form-group field-pcat">
                        <label for="pcat" class="fb-select-label">CATEGORY</label>
                        <select class="form-control" name="pcat" id="pcat" required="">
                            <option value="nike" id="pcat-1">Nike</option>
                            <option value="adidas" id="pcat-2">Adidas</option>
                            <option value="men" id="pcat-3">Men</option>
                            <option value="women" id="pcat-4">Women</option>
                            <option value="kids" id="pcat-5">Kids</option>
                        </select>
                    </div>
                    <div class="fb-textarea form-group field-pdes">
                        <label for="pdes" class="fb-textarea-label">DESCRIPTON</label>
                        <input placeholder="Item Description" maxlength="300" type="text" class="form-control" name="pdes" id="pdes" required="">
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Select Item Image</div>
                        <div class="panel-body" align="center">
                            <?php include_once('errors.php'); ?>
                                <input type="file" onchange="fileValidation();" name="upload_image" id="upload_image" required="" />

                                <br />
                                <div id="uploaded_image"></div>
                        </div>
                    </div>

                    <div class="fb-button form-group field-button-1573367339944">
                        <button type="submit" value="addbtn" class="btn-primary btn" name="addbtn" id="addbtn">ADD ITEM</button>
                        <a value="back" class="btn-danger btn" href="dashboard.php" name="back" id="back">Go Back</a>
                    </div>
                </div>
            </form>
            <p>You have logged as <?php echo $_SESSION['aname'] ?><a href="add.php"> | ADD ITEM  </a><a href="delete.php"> | DELETE ITEM | </a><a href="server.php?logout=1">  LOGOUT | </a></p>
        </div>

    </body>

    </html>

    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px; margin-top:30px"></div>
                        </div>
                        <div class="col-md-4" style="padding-top:30px;">
                            <br />
                            <br />
                            <br/>
                            <button class="btn btn-success crop_image">Crop</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>