<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Customer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="padding-top: 30px;">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('/updateCustomer/' . $customer['id']) ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" value="<?= old('name', $customer['name']) ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobileNo" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobileNo" name="mobileNo" value="<?= old('mobile', $customer['mobile']) ?>" onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="10" placeholder="Enter Mobile Number">
                        </div>
                        <!-- Error -->
                        <?php if ($validation->getError('mobileNo')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('mobileNo'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" value="<?= old('email', $customer['email']) ?>" disabled>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="1" <?= old('status', $customer['status']) == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="status1">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status0" value="0" <?= old('status', $customer['status']) == 0 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="stauts0">
                                    In Active
                                </label>
                            </div>
                        </div>
                        <!-- Error -->
                        <?php if ($validation->getError('status')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('status'); ?>
                            </div>
                        <?php } ?>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>