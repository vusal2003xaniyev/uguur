<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tələbə məlumatları</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="./assets/main.js"></script>
    <?php require_once "./app/studentController.php"?>
    <?php require_once "../CodeWorld/payment.php"?>
</head>

<body class="container">
    <h1 class="display-4">Tələbə məlumatları</h1>
    <button data-toggle="modal" data-target="#add" class="btn btn-outline-info float-right">Əlavə et</button>
    <table class="table table-striped">
        <tr>
            <th>S/N</th>
            <th>Ad Soyad</th>
            <th>E-poçt</th>
            <th>Əlaqə nömrəsi</th>
            <th>Təlim paketi</th>
            <th>Ödəniş miqdarı</th>
            <th>Qeydiyyat tarixi</th>
            <th>Əməliyyatlar</th>
        </tr>
        <?php foreach($students as $key=>$student){?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$student['fullname']?></td>
            <td><?=$student['email']?></td>
            <td><?=$student['phone']?></td>
            <td><?=$student['package']?></td>
            <td><?=$pay[$student['package']]?></td>
            <td><?=$student['kqt']?></td>
            <td>
                <button onclick="delStudent(<?=$student['id']?>,'<?=$student['fullname']?>')" class="btn btn-outline-danger">Sil</button>
                <button onclick="updStudent(<?=$student['id']?>)" class="btn btn-outline-success">Redakte et</button>
            </td>

        </tr>
        <?php }?>
    </table>
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Məlumatlar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="fullname" class="col-form-label">Ad Soyad:</label>
                            <input type="text" class="form-control" name="fullname" id="fullname">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">E-poçt:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Əlaqə nömrəsi:</label>
                            <input type="phone" onfocusout="phoneCheck(this.value)" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="package" class="col-form-label">Təlim paketi:</label>
                            <select name="package" id="package" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Seçim edin</option>
                                <option value='full-stack'>Full-Stack proqramlaşdırma</option>
                                <option value='front-end'>Front-End Proqramlaşdırma</option>
                                <option value='back-end'>Back_end Proqramlaşdırma</option>
                                <option value='python'>Python Proqramlaşdırma Dili</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                            <button name="add_student" id="add_student" class="btn btn-primary">Yadda saxla</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Redakte paneli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" id="edit_id" name="edit_id"/>
                        <div class="form-group">
                            <label for="edit_fullname" class="col-form-label">Ad Soyad:</label>
                            <input type="text" class="form-control" name="fullname" id="edit_fullname">
                        </div>
                        <div class="form-group">
                            <label for="edit_email" class="col-form-label">E-poçt:</label>
                            <input type="email" class="form-control" name="email" id="edit_email">
                        </div>
                        <div class="form-group">
                            <label for="edit_phone" class="col-form-label">Əlaqə nömrəsi:</label>
                            <input type="phone" class="form-control" onfocusout="editphoneCheck(this.value)" name="phone" id="edit_phone">
                        </div>
                        <div class="form-group">
                            <label for="edit_package" class="col-form-label">Təlim paketi:</label>
                            <select name="package" id="edit_package" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Seçim edin</option>
                                <option value='full-stack'>Full-Stack proqramlaşdırma</option>
                                <option value='front-end'>Front-End Proqramlaşdırma</option>
                                <option value='back-end'>Back_end Proqramlaşdırma</option>
                                <option value='python'>Python Proqramlaşdırma Dili</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                            <button name="edit_student" id="edit_student" class="btn btn-primary">Yadda saxla</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>