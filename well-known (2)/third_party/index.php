<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- //main css -->
    <link href="assets/dist/css/style.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
   <!-- //main js -->
   <script type="text/javascript" src="assets/dist/js/script.js"></script>
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

   <!-- //title -->
    <title>Digital Portal | Co-Operative Insurance Company PLC</title>
    <!-- add icon link -->
    <link rel="icon" href="assets/dist/img/logo.png"
        type="image/x-icon" />

</head>
<body class="bg shadow-lg">
    <div class="container py-4">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-9 shadow-main">
                    <div class="card shadow-main border-primary p-2 mb-2 bg-white rounded">
                        <div class="card-header shadow-main text-white p-6 mb-4  bg-white rounded">
                            <div class="header-pattern"></div>
                            <div class="header-content">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="company-logo me-3 rounded shadow-main">
                                        <img src="assets/dist/img/logo.png" width="40">
                                    </div>
                                    <div>
                                        <h4 class="page-title mb-0">
                                            <i class="fas fa-clock header-icon"></i>
                                            Third Party Insurance Policy Renewal
                                        </h4>
                                        <div class="header-badge">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Official Insurance Portal
                                        </div>

                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <small>
                                        <i class="fas fa-building me-2"></i>
                                        Co-operative Insurance Company PLC
                                    </small>
                                    <small class="header-badge">
                                        <i class="fas fa-clock me-1"></i>
                                        Quick Renewal Process
                                    </small>
                                </div>
                            </div>
                        </div>
                        <!-- Rest of the form content remains the same -->
                        <div class="card-body p-2 shadow-main p-3 mb-5 bg-white rounded">
                            <div class="mb-3">
                                <small class="text-danger">* Required fields</small>
                            </div>
                            <form name="thirdparty" method="post" action="confirm_payment.php" class="needs-validation" novalidate>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="tpolicy" id="tpolicy" class="form-control shadow-sm" class="form-control" placeholder="Third party policy number" oninput="this.value = this.value.toUpperCase()" required>
                                            <!-- PYB209000020 -->
                                            <label for="policyNumber" class="required-field">Third Party Policy No</label>
                                            <div class="invalid-feedback">Please enter policy number</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <button class="btn btn-primary px-2" type="button" name="search" id="search" value="Search">
                                            <i class="fas fa-search me-2"></i>Search
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control vehi" id="txtVehicleNumber" name="txtVehicleNumber" disabled placeholder="Enter vehicle number" required>
                                            <label for="vehicleNumber" class="required-field">Vehicle No</label>
                                            <div class="invalid-feedback">Please enter vehicle number</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control name" id="txtCustName" name="txtCustName" disabled placeholder="Enter customer name" required>
                                            <label for="customerName" class="required-field">Customer Name</label>
                                            <div class="invalid-feedback">Please enter customer name</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control period" id="txtCoverPeriod" name="txtCoverPeriod" disabled placeholder="Enter cover period" required>
                                            <label for="coverPeriod" class="required-field">Cover Period</label>
                                            <div class="invalid-feedback">Please enter cover period</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control pre" id="txtOutstandingPre" name="txtOutstandingPre" disabled placeholder="Enter premium" required>
                                            <label for="premium" class="required-field">Outstanding Premium</label>
                                            <div class="invalid-feedback">Please enter outstanding premium</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control pay" id="txtPaymentAmount" name="txtPaymentAmount" disabled placeholder="Enter payment amount" required>
                                            <label for="paymentAmount" class="required-field">Payment Amount</label>
                                            <div class="invalid-feedback">Please enter payment amount</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control shadow-sm" id="txtMobile" name="txtMobile" placeholder="Enter mobile number" pattern="[0-9]{10}" required>
                                            <label for="mobileNo" class="required-field">Mobile No</label>
                                            <div class="invalid-feedback">Please enter valid mobile number</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="chkTerms" name="chkTerms" value="tc" required>
                                            <label class="form-check-label required-field" for="terms">
                                               <strong> I have Read & Agreed to the <a href="#" class="text-primary">Terms & Conditions</a>
                                            </label></strong>
                                            <div class="invalid-feedback">You must agree to the terms and conditions</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="payment-methods">
                                                <img src="assets/dist/img/visa.png" class="img-fluid" width="80px" alt="Visa" class="me-2">
                                                <img src="assets/dist/img/unionpay.jpg" class="img-fluid" width="60px" alt="unionpay" class="me-2">
                                            </div>
                                            <div class="paybtn mb-5 mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center mt-9 text-muted">
                            <small>
                                <img class="mb-9" src="assets/dist/img/logo.png" alt="" width="24">
                                Co-operative Insurance House” No.74/5, Grandpass Road, Colombo 14.<br>
                                Tel: <a href="tel:0112557009" class="text-decoration-none">0112 557009</a> | <a href="tel:0112 2472796" class="text-decoration-none">0112 2472796</a> |
                                Email: <a href="mailto:info@coopinsu.com" class="text-decoration-none">info@coopinsu.com</a> | <a href="mailto:medical.unit@coopinsu.com" class="text-decoration-none">medical.unit@coopinsu.com</a> |
                                Web: <a href="https://www.ci.lk/" class="text-decoration-none">www.ci.lk</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <!-- //formValidation js -->
   <script type="text/javascript" src="assets/dist/js/formValidation.js"></script>
</body>

</html>