<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trellows Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

 <style type="text/css">

     .div_center
     {
        text-align: center;
        padding-top: 40px;
     }
     .font_size
     {
        font-size: 40px;
        padding-bottom: 40px;
     }
     .text_colour
     {
        color: black;
        padding-bottom: 20px;
     }
     label
     {
        display: inline-block;
        width: 200px;
     }
     .div_design
     {
        padding-bottom: 15px;
     }


 </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}

                </div>

                @endif

                <div class="div_center">
                    <h1 class="font_size"> Add Product</h1>

        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

            @csrf

                <div class="div_design">
                    <label>Product name	: </label>
                    <input class="text_colour" type="text" name="Product_name" placeholder="Write a Product name" required="">
                </div>

                <div class="div_design">
                    <label>Product Brand : </label>
                    <input class="text_colour" type="text" name="Brand" placeholder="Write a Brand"required="">
                </div>


                <div class="div_design">
                    <label>Product Catagory	: </label>
                    <select class="text_colour" name="catagory"required="">
                        <option value="" selected="" >Add a catagory here</option>

                         @foreach ($catagory as $catagory)

                        <option value="{{$catagory->catagory_name}}" >{{$catagory->catagory_name}}</option>

                        @endforeach

                    </select>
                </div>

                <div class="div_design">
                    <label>Product Quantity : </label>
                    <input class="text_colour" type="number" min="0" name="Quantity" placeholder="Write a Quantity"required="">
                </div>

                <div class="div_design">
                    <label>Cost Price: </label>
                    <input
                        id="costPrice"
                        oninput="calculateSellPrice()"
                        class="text_colour"
                        type="number"
                        name="Cost_price"
                        placeholder="Write a Cost Price"
                        required
                    >
                </div>

                <div class="div_design">
                    <label>Sell Price: </label>
                    <input
                        id="sellPrice"
                        placeholder="Calculated Sell Price"
                        class="text_colour"
                        type="number"
                        name="Sell_Price"
                        readonly
                    >
                </div>

                <div class="div_design">
                    <label>Description : </label>
                    <input class="text_colour" type="text" name="Description" placeholder="Write a Description"required="">
                </div>

                <div class="div_design">
                    <label>Product Image Here: </label>
                <input type="file" name="image"required="">

                </div>

                <div class="div_design">
                    <label>Rating : </label>
                    <input class="text_colour" type="text" name="Rating" placeholder="Write a Rating">
                </div>


                <div class="div_design">
                <input type="Submit" value="Add Product" class="btn btn-primary">
                </div>

        </form>

                </div>
            </div>
        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script>
        function calculateSellPrice() {
            const costPriceInput = document.getElementById('costPrice');
            const sellPriceInput = document.getElementById('sellPrice');

            // Parse the Cost Price value to a number
            const costPrice = parseFloat(costPriceInput.value);

            if (!isNaN(costPrice)) {
                if (costPrice >= 5000) {
                    // Apply 10% discount if Cost Price is 5000 or higher
                    const discountedPrice = costPrice - (costPrice * 0.10);
                    sellPriceInput.value = discountedPrice.toFixed(2); // Set Sell Price with 2 decimal places
                } else {
                    // Set Sell Price as Cost Price for values less than 5000
                    sellPriceInput.value = costPrice.toFixed(2);
                }
            } else {
                // Clear Sell Price if Cost Price is invalid or empty
                sellPriceInput.value = '';
            }
        }
    </script>



  </body>
</html>
