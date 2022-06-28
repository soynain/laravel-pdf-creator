<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CssPdf.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Formulario pdf</title>
</head>

<body>
   <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Generador pdf</a>
        </div>
    </nav>-->


    <div class="pdf-body container-fluid d-flex flex-column vh-100 pe-5 ps-5">
        <div class="doc-header d-flex flex-row mt-3 w-100 justify-content-between align-items-center">
            <img id="company-logo-img" src="/public/img/company-logo.png">
            <h2>Invoice</h2>
        </div>

        <div class="border-purple mt-2"></div>

        <div
            class="pb-5 pt-3 company-invoice-info mt-2 w-100 d-flex flex-row justify-content-between align-items-center">
            <div class="company-data d-flex flex-column">
                <h4>Informal corps</h4>
                <h5>We are always present with you</h5>
            </div>
            <div class="invoice-data">
                <span class="d-flex flex-row">
                    <dt>Date:&nbsp</dt>
                    <span>16/07/1998</span>
                </span>
                <span class="d-flex flex-row">
                    <dt>Invoice&nbsp#:&nbsp</dt>
                    <span>123123i9123</span>
                </span>
                <span class="d-flex flex-row">
                    <dt>Customer ID:&nbsp</dt>
                    <span>1hGbdbasJ</span>
                </span>
            </div>
        </div>

        <div class="border-purple mt-2"></div>

        <div class="mb-4 mt-5 invoice-address-row-container d-flex flex-row w-100 justify-content-between">
            <div class="invoice-address d-flex flex-column">
                <span class="d-flex flex-row justify-content-end">
                    <dt>To:&nbsp</dt><span>Name</span>
                </span>
                <span class="d-flex flex-row justify-content-end">
                    <span>Company Name</span>
                </span>
                <span class="d-flex flex-row justify-content-end">
                    <span>Street Address</span>
                </span>
                <span class="d-flex flex-row justify-content-end">
                    <span>Zip Code</span>
                </span>
                <span class="d-flex flex-row justify-content-end">
                    <span>Phone</span>
                </span>
            </div>
        </div>

        <div class="mt-5 d-flex flex-column w-100 justify-content-center align-items-center">
            <table class="table table-bordered border border-dark mb-5">
                <thead>
                    <th scope="col">Salesperson</th>
                    <th scope="col">Job</th>
                    <th scope="col">Payment terms</th>
                    <th scope="col">Due date</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Roman Gallego</th>
                        <td>Business Man</td>
                        <td>Due upon receipt</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-borderless mt-2 mb-0">
                <thead>
                    <th scope="col">Qty</th>
                    <th scope="col">Description</th>
                    <th scope="col">Unit price</th>
                    <th scope="col">Line total</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">5</th>
                        <td>A bag of bananas</td>
                        <td>$5.13</td>
                        <td>10.26</td>
                    </tr>
                    <tr class="total-row">
                        <td class="text-end"colspan="3">Total:</td>
                        <td colspan="1" class="text-end">$27.90</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>