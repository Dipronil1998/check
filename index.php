<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> 
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <form class="my-5" action="server.php" method="post" enctype="multipart/form-data" onsubmit="return validcap()">
                    <legend>Register your's self</legend>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label mt-4">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group row">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label mt-4"> Phone Number</label>
                            <input type="number" class="form-control" name="phone" placeholder="Enter Number" required
                                maxlength="10" pattern="[0-9]{10}" title="Please enter 10 digit number">
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label mt-4">Upload CV</label>
                            <input class="form-control" name="cv" type="file" id="formFile">
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label mt-4">Upload Proforma</label>
                            <input class="form-control" name="proforma" type="file" id="formFile">
                        </div>
                        <div>
                            <label>Enter Captcha:</label>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" id="capt" class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="textinput">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-block my-2">
                            <button class="btn btn-primary" name="register">Submit</button>
                        </div>
                </form>
                <h6>Captcha not visible <img src="refresh.jpg" width="40px" onclick="cap()"></h6>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

    <i class="fas fa-redo-alt"></i>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
    function cap() {
        var alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e',
            'f', 'g', 'h', 'i',
            'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
        ];
        var a = alpha[Math.floor(Math.random() * 63)];
        var b = alpha[Math.floor(Math.random() * 63)];
        var c = alpha[Math.floor(Math.random() * 63)];
        var d = alpha[Math.floor(Math.random() * 63)];
        var e = alpha[Math.floor(Math.random() * 63)];
        var f = alpha[Math.floor(Math.random() * 63)];

        var final = a + b + c + d + e + f;
        document.getElementById("capt").value = final;
    }

    function validcap() {
        var stg1 = document.getElementById('capt').value;
        var stg2 = document.getElementById('textinput').value;
        if (stg1 == stg2) {
            alert("Form is validated Succesfully");
            return true;
        } else {
            alert("Please enter a valid captcha");
            return false;
        }
    }
    </script>
</body>

</html>