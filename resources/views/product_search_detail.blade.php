<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Product Search Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #eee;
        }

        .btn { 
            margin-bottom: 5px;
        }

        .grid {
            position: relative;
            width: 100%;
            background: #fff;
            color: #666666;
            border-radius: 2px;
            margin-bottom: 25px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }

        .grid .grid-body {
            padding: 15px 20px 15px 20px;
            font-size: 1.2em;
            line-height: 1.9em;
        }

        .search table tr td.rate {
            color: #f39c12;
            line-height: 50px;
        }

        .search table tr:hover {
            cursor: pointer;
        }

        .search table tr td.image {
            width: 50px;
        }

        .search table tr td img {
            width: 50px;
            height: 50px;
        }

        .search table tr td.rate {
            color: #f39c12;
            line-height: 50px;
        }

        .search table tr td.price {
            font-size: 1.9em;
            line-height: 50px;
        }

        .search #price1,
        .search #price2 {
            display: inline;
            font-weight: 600;
        }
    </style>

    <style type="text/css">
        .header{
            font-size: 1.9rem;
        }
    </style>

    
   <!--=============== FAVICON ===============-->
   <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

   <!--=============== REMIXICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

   <!--=============== SWIPER CSS ===============-->
   <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body>



    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">

               <!--==================== HEADER ====================-->
   <header class="header" id="header" style="">
    <nav class="nav container">
       <a href="#" class="nav__logo">
          Lumina<span> By Aslan</span>
       </a>

       <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
             <li class="nav__item">
                <a href="#home" class="nav__link active-link">Home</a>
             </li>

             <li class="nav__item">
                <a href="#popular" class="nav__link">Popular</a>
             </li>

             <li class="nav__item">
                <a href="/product-search-detail" class="nav__link">Product</a>
             </li>

             <li class="nav__item">
                <a href="#choose" class="nav__link">Choose</a>
             </li>

             <li class="nav__item">
                <a href="#products" class="nav__link">Products</a>
             </li>
          </ul>

          <!-- Close button -->
          <div class="nav__close" id="nav-close">
             <i class="ri-close-line"></i>
          </div>
       </div>

       <div class="nav__buttons">
          <!-- Theme change button -->
          <i class="ri-moon-line change-theme" id="theme-button"></i>

          <!-- Toggle button -->
          <div class="nav__toggle" id="nav-toggle">
             <i class="ri-menu-line"></i>
          </div>
       </div>
    </nav>
   </header>

        <div class="row">

            <div class="col-md-12">
                <div class="grid search">
                    <div class="grid-body">
                        <div class="row">

                            <div class="col-md-3">
                                <h2 class="grid-title"><i class="fa fa-filter"></i> Filters</h2>
                                <hr>

                                <h4>By category:</h4>
                                @forelse ($category_masters as $category)
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" class="icheck" id="" name="category_search_product" value="{{ $category->category_master_id }}" onclick="handleCheckboxClick('{{ $category->category_master_id }}')" value="{{ $category->category_master_id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                                @empty
                                    <h5>nothing category</h5>
                                @endforelse
{{--                                 
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Design</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Desktop</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Management</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Mobile</label>
                                </div> --}}

                                <div class="padding"></div>

                                <h4>By date:</h4>
                                From
                                <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z"
                                    data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
                                </div>
                                <input type="hidden" id="dtp_input1" value>
                                To
                                <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z"
                                    data-date-format="dd-mm-yyyy" data-link-field="dtp_input2">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
                                </div>
                                <input type="hidden" id="dtp_input2" value>

                                <div class="padding"></div>

                                <h4>By price:</h4>
                                Between <div id="price1">$300</div> to <div id="price2">$800</div>
                                <div class="slider-primary">
                                    <div class="slider slider-horizontal" style="width: 152px;">
                                        <div class="slider-track">
                                            <div class="slider-selection" style="left: 30%; width: 50%;"></div>
                                            <div class="slider-handle round" style="left: 30%;"></div>
                                            <div class="slider-handle round" style="left: 80%;"></div>
                                        </div>
                                        <div class="tooltip top hide" style="top: -30px; left: 50.1px;">
                                            <div class="tooltip-arrow"></div>
                                            <div class="tooltip-inner">300 : 800</div>
                                        </div><input type="text" class="slider" value data-slider-min="0"
                                            data-slider-max="1000" data-slider-step="1" data-slider-value="[300,800]"
                                            data-slider-tooltip="hide">
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-9">
                                <h2><i class="fa fa-file-o"></i> Result</h2>
                                <hr>

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Lamp ...." value="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>

                                <p>Showing all results matching "web development"</p>
                                <div class="padding"></div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown">
                                                Order by <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Name</a></li>
                                                <li><a href="#">Date</a></li>
                                                <li><a href="#">View</a></li>
                                                <li><a href="#">Rating</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default active"><i
                                                    class="fa fa-list"></i></button>
                                            <button type="button" class="btn btn-default"><i
                                                    class="fa fa-th"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover" id="productsTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Image</th>
                                                <th>Product</th>
                                                <th class="text-right">Rating</th>
                                                <th class="text-right">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Product rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>


                                <ul class="pagination">
                                    <li class="disabled"><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>

    <script>
        function handleCheckboxClick(categoryId) {
            // Assuming your server endpoint is /update-category
            var url = '/product-search-by-category';
            
            $.ajax({
                type: 'GET',
                url: url,
                data: { category_id: categoryId },
                success: function(response) {
                    // alert(response.name)
                    updateProductsTable(response);
                    console.log('Category updated successfully');
                },
                error: function(error) {
                    console.error('Error updating category');
                    console.log(error);
                }
            });
        }

        
        function updateProductsTable(products) {
            var tableBody = $('#productsTable tbody');
            tableBody.empty();

            if (products.length === 0) {
                // If the products array is empty, show an info message
                var infoMessage = '<tr><td colspan="5" class="text-center"><h5>No products found</h5></td></tr>';
                tableBody.append(infoMessage);
            } else {
                // Iterate through each product and append a new row to the table
                $.each(products, function (index, product) {
                    var row = '<tr>' +
                        '<td class="number text-center">' + (index + 1) + '</td>' +
                        '<td class="image"><img src="' + '{{ asset("lamp-image/indoor-lamp/indoor-Surface-Mounted-Downlight.png") }}' + '" alt=""></td>' +
                        '<td class="product"><strong>' + product.name + '</strong><br>' + product.description + '</td>' +
                        '<td class="rate text-right"><span>' + generateStarRating(product.rating) + '</span></td>' +
                        '<td class="price text-right">Rp ' + product.price_after + ' <br> <span style="font-size:12px;color:red;">Rp ' + product.price_before + '</span>  </td>' +
                        '</tr>';

                    tableBody.append(row);
                });
            }
        }

        function generateStarRating(rating) {
            // Assuming rating is a number, generate HTML for star rating
            var stars = '';
            for (var i = 0; i < rating; i++) {
                stars += '<i class="fa fa-star"></i>';
            }
            return stars;
        }

    </script>

</body>

</html>
