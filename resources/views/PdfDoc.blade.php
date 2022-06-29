<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{public_path('css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <style>
         table {
            width: 78.3rem;
        }

        tr:not(:last-child),
        td:not(:last-child),
        th {
            border: 1px solid black !important;
            font-size: 1.5rem;
        }
        td:last-child{
            font-size: 1.5rem;
        }
        tr:last-child{
            font-size: 1.5rem;
        }
        h2{
            font-size: 2.3rem;
        }

        h4,h5{
            font-size: 1.7rem;
        }

        span{
            font-size: 1.5rem;
        }
        .pdf-body {
            width: 84.5rem;
        }

        .company-logo.img {
            height: 100px;
            width: 300px;
        }

        .border-purple {
            border: 2px solid black;
            width: 78.3rem;
        }

        .invoice-address {
            width: 19rem;
        }

        .doc-header{
            width: 100%;
            display: -webkit-box;
            -webkit-box-pack: justify;
            -webkit-box-align: center;
        }
    
        .company-invoice-info {
            width: 100%;
            display: -webkit-box;    
            -webkit-box-pack:justify;    
        }

        .company-data {
            display: -webkit-box;
            -webkit-box-flex: 0;
            -webkit-box-orient: vertical;
            width: 50%;
            padding:25px;
        }

        .invoice-data {
            display: -webkit-box;
            width: 50%;
            -webkit-box-orient: vertical;
            padding:25px;
            -webkit-box-pack: end;
        }

        .invoice-address-row-container{
            margin-top: 2rem;
            display: -webkit-box;
            width: 100%;
            -webkit-box-pack: justify;
            -webkit-box-orient: horizontal;
        }

        .invoice-address{
            display: -webkit-box;
            -webkit-box-orient: vertical;
            width: 30%;
        }

        .total-row:last-child>td {
            border: none !important;
        }
    </style>
    <title>Formulario pdf</title>
</head>

<body>
    <div class="pdf-body container-fluid d-flex flex-column vh-100 pe-5 ps-5">
        <div class="doc-header">
            <img id="company-logo-img" src="{{public_path('img/company-logo.png')}}">
            <h2>Invoice</h2>
        </div>

        <div class="border-purple mt-2"></div>

        <div class="company-invoice-info">
            <div class="company-data">
                <h4>Informal corps</h4>
                <h5>We are always present with you</h5>
            </div>
            <div class="invoice-data">
                <span style="display: -webkit-box;-webkit-box-orient:horizontal;">
                    <dt>Date:&nbsp;</dt>
                    <span>@php echo date('Y-m-d') @endphp</span>
                </span>
                <span style="display: -webkit-box;-webkit-box-orient:horizontal;">
                    <dt>Invoice&nbsp#:&nbsp;</dt>
                    <span>123123i9123</span>
                </span>
                <span style="display: -webkit-box;-webkit-box-orient:horizontal;">
                    <dt>Customer ID:&nbsp;</dt>
                    <span>1hGbdbasJ</span>
                </span>
            </div>
        </div>

        <div class="border-purple mt-2"></div>
        <div class="invoice-address-row-container">
            <div class="invoice-address">
                <span style="display: -webkit-box;-webkit-box-pack:end;">
                    <dt>To:&nbsp</dt><span>{{$invoiceData['name']}}</span>
                </span>
                <span style="display: -webkit-box;-webkit-box-pack:end;">
                    <span>{{$invoiceData['company-name']}}</span>
                </span>
                <span style="display: -webkit-box;-webkit-box-pack:end;">
                    <span>{{$invoiceData['street-address']}}</span>
                </span>
                <span style="display: -webkit-box;-webkit-box-pack:end;">
                    <span>{{$invoiceData['zip-code']}}</span>
                </span>
                <span style="display: -webkit-box;-webkit-box-pack:end;">
                    <span>{{$invoiceData['phone-number']}}</span>
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
                        <th scope="row">{{$invoiceData['salesperson-name']}}</th>
                        <td>{{$invoiceData['job']}}</td>
                        <td>{{$invoiceData['payment-terms']}}</td>
                        <td>{{$invoiceData['due-date']}}</td>
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
                    @foreach($jsonProductsArray as $row)
                    <tr>
                        <th scope="row">{{$row->quantity}}</th>
                        <td>{{$row->description}}</td>
                        <td>{{$row->unitPrice}}</td>
                        <td>{{(float)$row->quantity*(float)$row->unitPrice}}</td>
                    </tr>
                    @endforeach
                    <tr class="total-row">
                        <td class="text-end" colspan="3">Total:</td>
                        @php
                        $acomulator=0;
                            foreach($jsonProductsArray as $sum){
                                $acomulator+=(float)((float)$sum->quantity*(float)$sum->unitPrice);
                            }
                           echo '<td colspan="1" class="text-end">'.$acomulator.'</td>';
                        @endphp
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>