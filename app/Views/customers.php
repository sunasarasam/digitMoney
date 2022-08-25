<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Customers</title>
</head>

<body>
    <div class="container" style="padding-top: 30px;">
        <div class="row pb-5 text-right" style="padding-bottom: 10px;">
            <a href="<?php echo base_url() . '/addCustomer'; ?>" class="btn btn-success">Add Customer</a>
        </div>
        <?php if (session()->getFlashdata('status')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo "<h4>" . session()->getFlashdata('status') . "</h4>"; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $customer) : ?>
                        <tr>
                            <td><?php echo $customer['id']; ?></td>
                            <td><?php echo $customer['name']; ?></td>
                            <td><?php echo $customer['mobile']; ?></td>
                            <td><?php echo $customer['email']; ?></td>
                            <td><?php echo $customer['status']; ?></td>
                            <td><?php echo $customer['createdDate']; ?></td>
                            <td>
                                <form action="<?php echo base_url() . '/deleteCustomer/' . $customer['id']; ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <a href="<?php echo base_url() . '/editCustomer/' . $customer['id']; ?>">
                                        <i class="fa fa-edit btn btn-warning btn-sm"></i>
                                    </a> |
                                    <a>
                                        <button type="submit" class="fa fa-trash btn btn-danger btn-sm"></button>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
</body>

</html>