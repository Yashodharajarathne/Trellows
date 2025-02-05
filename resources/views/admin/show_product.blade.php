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

     .center
     {
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top:40px;
     }
     .font_size
     {
        text-align: center;
        font-size:40px;
        padding-top: 20px
     }

     .img_size
     {
        width: 1900px;
        height: 140px;
     }
     .th_color
     {
        background: rgb(8, 8, 62);
     }
     .th_deg
     {
        padding: 30px;
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

              <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product name</th>
                        <th class="th_deg">Product Brand</th>
                        <th class="th_deg">Product Catagory</th>
                        <th class="th_deg">Product Quantity</th>
                        <th class="th_deg">Cost price</th>
                        <th class="th_deg">Sell Price</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Rating</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>

                    @foreach ($product as $product)

                        <tr>
                            <td>{{$product->Product_name}}</td>
                            <td>{{$product->Brand}}</td>
                            <td>{{$product->catagory}}</td>
                            <td>{{$product->Quantity}}</td>
                            <td>{{$product->Cost_price}}</td>
                            <td>{{$product->Sell_price}}</td>
                            <td>{{$product->Description}}</td>
                            <td>

                                 <img class="img_size" src="/product/{{$product->image}}" >

                            </td>
                            <td>{{$product->Rating}}</td>

                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this')" href="{{url('delete_product',$product->id)}}">Delete</a>
                            </td>

                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                            </td>

                        </tr>

                    @endforeach


                </table>

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
  </body>
</html>
