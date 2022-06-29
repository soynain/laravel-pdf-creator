<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .backStep2-btn{width:11.5rem;}
    </style>
    <title>Generate PDF</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Generador pdf</a>
        </div>
    </nav>

    <div class="container-fluid w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="card w-75 card-form-container">
            <div class="card-header">
                Please fill the information that is asked in the inputs
            </div>
            <div class="card-body">
                <form onsubmit="return anhidarProductos(event)" action="/generate-pdf" method="post" class="row g-3 form-principal">
                    <div class="w-100 person-tocharge-details-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" placeholder="Name of the person to charge"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="company-name class=" form-label">Company Name:</label>
                            <input type="text" name="company-name" placeholder="Type the company's name"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="street-address" class="form-label">Street address:</label>
                            <input type="text" name="street-address" placeholder="Address from the company"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="zip-code" class="form-label">Zip Code:</label>
                            <input placeholder="Zip Code" type="number" name="zip-code" class="form-control"
                               >
                        </div>
                        <div class="mb-3">
                            <label for="phone-number" class="form-label">Phone number:</label>
                            <input type="tel" name="phone-number" class="form-control"
                                placeholder="Type your phone number" >
                        </div>
                        <button class="btn btn-primary w-100 step2-button">
                            Go to step 2: fill salesperson details.
                        </button>
                    </div>

                    <div class="w-100 sales-person-details-form">
                        <div class="mb-3">
                            <label for="salesperson-name" class="form-label">Salesperson:</label>
                            <input type="text" name="salesperson-name" placeholder="Name of the salesperson"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="job" class="form-label">Job:</label>
                            <input type="text" name="job" placeholder="Salesperson's position" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="payment-terms" class="form-label">Payment terms:</label>
                            <input type="text" name="payment-terms" placeholder="Terms of payment" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="due-date" class="form-label">Salesperson:</label>
                            <input onfocusout="(this.type='text')" onfocus="(this.type='date')" type="text"
                                name="due-date" placeholder="Due date" class="form-control">
                        </div>
                        <div class="d-flex flex-row w-100 button-container mb-3">
                            <button class="w-50 btn btn-danger button-back-step1">Back to the start</button>
                            <button class="w-50 btn btn-primary step3-btn">Step 3: product details</button>
                        </div>
                    </div>

                    <div class="d-flex flex-column justify-content-between w-100 row-for-products-container">
                        <button class="btn btn-danger backStep2-btn">← Go back to step 2</button>
                        <div class="details-aux-cont d-flex flex-row justify-content-between w-100">
                            <div class="p-3 product-form w-50">
                                <div class="mb-3">
                                    <label for="qty-product" class="form-label">Qty:</label>
                                    <input type="number" min="0" name="qty-product"
                                        placeholder="How much? (from 0 to up)" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea style="resize:none" class="form-control" name="description"
                                        placeholder="Description of the product"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="unit-price" class="form-label">Unit price:</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                        <input type="text" name="unit-price" placeholder="Price per piece"
                                            class="form-control">
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 addProduct-btn">
                                    Add product
                                </button>
                            </div>
                            <div class="p-3 product-table-section w-50">
                                <table class="table w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Unit price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="productBodyForRows"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success w-100 send-form" value="Generate pdf invoice and save invoice details"/>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        const card_size_dynamic = document.querySelector('.card-form-container');
        const personToChargeDetailsForm = document.querySelector('.person-tocharge-details-form');
        const salesPersonDetailsForm = document.querySelector('.sales-person-details-form');
        const productDetailsForm = document.getElementsByClassName('row-for-products-container')[0];

        const buttonForSending = document.querySelector('.send-form');
        const stepTwoBtn = document.querySelector('.step2-button');
        const stepOneBackBtn=document.querySelector('.button-back-step1');
        const stepThreeBtn=document.querySelector('.step3-btn');
        const stepTwoBackBtn=document.querySelector('.backStep2-btn');

        card_size_dynamic.classList.remove('w-75'); card_size_dynamic.classList.add('w-50');
        buttonForSending.style.display = 'none';
        salesPersonDetailsForm.style.display = 'none';
        productDetailsForm.classList.remove('d-flex', 'flex-column', 'justify-content-between');
        productDetailsForm.style.display = 'none';

        stepTwoBtn.addEventListener('click', (e) => {
            e.preventDefault();
            personToChargeDetailsForm.style.display = 'none';
            salesPersonDetailsForm.removeAttribute('style');
        })

        stepOneBackBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            salesPersonDetailsForm.style.display='none';
            personToChargeDetailsForm.removeAttribute('style');
        });
        
        stepThreeBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            salesPersonDetailsForm.style.display='none';
            card_size_dynamic.classList.remove('w-50'); card_size_dynamic.classList.add('w-75');
            productDetailsForm.classList.add('d-flex', 'flex-column', 'justify-content-between');
            productDetailsForm.removeAttribute('style');
            buttonForSending.removeAttribute('style');
        });

        stepTwoBackBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            card_size_dynamic.classList.remove('w-75'); card_size_dynamic.classList.add('w-50');
            productDetailsForm.classList.remove('d-flex', 'flex-column', 'justify-content-between');
            productDetailsForm.style.display = 'none';
            buttonForSending.style.display='none';

            salesPersonDetailsForm.removeAttribute('style');
        });
    </script>
    <script>
        let jsonOfProducts=[];
        const productBodyForRows=document.getElementsByClassName('productBodyForRows')[0];
        const addProductToInvoiceBtn=document.querySelector('.addProduct-btn');
        addProductToInvoiceBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            let quantity=document.getElementsByName('qty-product')[0].value;
            let description=document.getElementsByName('description')[0].value;
            let unitPrice=document.getElementsByName('unit-price')[0].value;
            console.log(quantity,description,unitPrice);

            let firstColumn=document.createElement('td');
            firstColumn.innerText=quantity;
            let secondColumn=document.createElement('td');
            secondColumn.innerText=description;
            let thirdColumn=document.createElement('td');
            thirdColumn.innerText='$'.concat(unitPrice);

            let rowBody=document.createElement('tr');
            rowBody.appendChild(firstColumn);
            rowBody.appendChild(secondColumn);
            rowBody.appendChild(thirdColumn);

            productBodyForRows.appendChild(rowBody);
            jsonOfProducts.push({quantity,description,unitPrice});
            console.log(jsonOfProducts);
        });

        async function anhidarProductos(e){
            e.preventDefault();
            let formBody=document.querySelector('.form-principal');
         //   console.log(formBody);
            let formDataToBeSended=new FormData(formBody);
            formDataToBeSended.append('jsonproducts',JSON.stringify(jsonOfProducts));
            //return true;
            fetch('/generate-pdf',{
                method:'POST',
                redirect:'follow',
                body:formDataToBeSended
            }).then(response=>{
               if(response.redirected){
                window.location.href=response.url;
               }
            }).catch(err=>{
                console.log(err);
            });
         //   return false;
        }
    </script>
</body>

</html>