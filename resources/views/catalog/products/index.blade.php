@extends('../layouts/backend_layout')

@section('title','Catalog Product Page')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12" style="display:flex;">
                    <div class="col-sm-4">
                        <h1>Products</h1>
                    </div>
                    

                    <div class="col-sm-8">
                        <div class="float-right">
                            <a class="btn btn-primary" href="/Admin/Product/Create">
                                <i class="fas fa-plus-square"></i>
                                Add new
                            </a>

                            <button type="submit" name="download-catalog-pdf" class="btn bg-purple" formaction="/Admin/Product/DownloadCatalogPDF">
                                <i class="far fa-file-pdf"></i>
                                Download catalog as PDF
                            </button>

                            <div class="btn-group">
                                <button type="button" class="btn btn-success">
                                    <i class="fas fa-download"></i>
                                    Export
                                </button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">&nbsp;</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-item">
                                        <button type="submit" name="exportxml-all" formaction="/Admin/Product/ExportToXml">
                                            <i class="far fa-file-code"></i>
                                            Export to XML (all found)
                                        </button>
                                    </li>
                                    <li class="dropdown-item">
                                        <button type="button" id="exportxml-selected">
                                            <i class="far fa-file-code"></i>
                                            Export to XML (selected)
                                        </button>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <button type="submit" name="exportexcel-all" formaction="/Admin/Product/ExportToExcel">
                                            <i class="far fa-file-excel"></i>
                                            Export to Excel (all found)
                                        </button>
                                    </li>
                                    <li class="dropdown-item">
                                        <button type="button" id="exportexcel-selected">
                                            <i class="far fa-file-excel"></i>
                                            Export to Excel (selected)
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <button type="button" name="importexcel" class="btn bg-olive" data-toggle="modal" data-target="#importexcel-window">
                                <i class="fas fa-upload"></i>
                                Import
                            </button>

                            <button type="button" id="delete-selected" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                Delete (selected)
                            </button>

                            <div id="delete-selected-action-confirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-selected-action-confirmation-title">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="delete-selected-action-confirmation-title">Are you sure?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to perform this action?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="delete-selected-action-confirmation-submit-button" class="btn btn-primary float-right">
                                                Yes
                                            </button>
                                            <span class="btn btn-default float-right margin-r-5" data-dismiss="modal">No, cancel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

      <!-- Product Search -->
      <div class="card card-default color-palette-box collapsed-card" style="=">
          
        <div class="card-header" >
            <h3 class="card-title">
                <i class="fas fa-search"></i>
                Search
            </h3>
            <div type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <h3 class="card-title">
                    <i style="margin-right: 10px;" class="fa toggle-icon fa-plus"></i>
                </h3>
            </div>
        </div>



            <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
        <form action="{{ route('catalog-product-search') }}" method="GET">
            @csrf
                    <div class="form-group">
                        <div title="A product name." data-toggle="tooltip" class="ico-help"> <label>Product Name</label> <i class="fas fa-question-circle"></i></div>
                        <input type="text" class="form-control" id="SearchName" name="SearchName" placeholder="Enter ...">
                    </div>

                    <div class="form-group ">
                        <div title="Search by a specific category." data-toggle="tooltip" class="ico-help"> <label>Category</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-0">
                            <option value="">- Select Category -</option>
                            <select class="form-control"  data-val="true" data-val-required="The Category field is required." id="SearchCategoryId" name="SearchCategoryId"><option selected="selected" value="0">All</option>
                            @forelse ($productcategories as $pc)
                                <option value="1">{{ $pc->name }}</option>
                            @empty
                                
                            @endforelse
                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group ">
                        <div title="Check to search in subcategories." data-toggle="tooltip" class="ico-help"> <label>Search subcategories</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-0">
                            <input class="check-box" data-val="true" data-val-required="The Search subcategories field is required." id="SearchIncludeSubCategories" name="SearchIncludeSubCategories" type="checkbox" value="true" />
                        </div>
                    </div>

                    <div class="form-group ">
                        <div title="Search by a specific manufacturer." data-toggle="tooltip" class="ico-help"> <label>Manufacturer</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-0">
                        <select class="form-control" data-val="true" data-val-required="The Manufacturer field is required." id="SearchManufacturerId" name="SearchManufacturerId"><option selected="selected" value="0">All</option>
                        <option value="1">Apple</option>
                        <option value="2">HP</option>
                        <option value="3">Nike</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div title="Search by a specific vendor." data-toggle="tooltip" class="ico-help"> <label>Vendor</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-0">
                        <select class="form-control" data-val="true" data-val-required="The Vendor field is required." id="SearchVendorId" name="SearchVendorId"><option selected="selected" value="0">All</option>
                            <option value="1">Vendor 1</option>
                            <option value="2">Vendor 2</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div title="Search by a specific warehouse." data-toggle="tooltip" class="ico-help"> <label>Warehouse</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-8">
                        <select class="form-control" data-val="true" data-val-required="The Warehouse field is required." id="SearchWarehouseId" name="SearchWarehouseId"><option selected="selected" value="0">All</option>
                        <option value="1">Warehouse 1 (New York)</option>
                        <option value="2">Warehouse 2 (Los Angeles)</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div title="Search by a product type." data-toggle="tooltip" class="ico-help"> <label>Product type</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-8">
                        <select class="form-control" data-val="true" data-val-required="The Product type field is required." id="SearchProductTypeId" name="SearchProductTypeId"><option selected="selected" value="0">All</option>
                        <option value="5">Simple</option>
                        <option value="10">Grouped (product with variants)</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div title="Search by a &quot;Published&quot; property." data-toggle="tooltip" class="ico-help"> <label>Published</label> <i class="fas fa-question-circle"></i></div>
                        <div class="col-md-0">
                        <select class="form-control" data-val="true" data-val-required="The Published field is required." id="SearchPublishedId" name="SearchPublishedId"><option selected="selected" value="0">All</option>
                        <option value="1">Published only</option>
                        <option value="2">Unpublished only</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div title="Enter product SKU and click Go." data-toggle="tooltip" class="ico-help"> <label>Go directly to product SKU</label> <i class="fas fa-question-circle"></i></div>
                        <input class="form-control text-box single-line" id="GoDirectlyToSku" name="GoDirectlyToSku" type="text" value />
                        <span class="input-group-append">
                            <button type="submit" id="go-to-product-by-sku" name="go-to-product-by-sku" class="btn btn-info btn-flat">
                            Go
                            </button>
                        </span>
                    </div>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="text-center col-12">
                    <button type="submit" id="search-products" class="btn btn-primary btn-search">
                    <i class="fas fa-search"></i>
                    Search
                    </button>
                </div>
            </div>
        </form>
            </div>
        <!-- /.card-body -->
      </div>
      <!-- End Product Search -->

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-search"></i>
            </button>
            <h3 class="card-title">Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">


          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Picture</th>
                  <th>Product Name</th>
                  <th>SKU</th>
                  <th>Price</th>
                  <th>Stock Quantity</th>
                  <th>Published</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->image ? $product->image : 'empty' }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->is_sold }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->size }}</td>
                        <td> <a href="">Edit</a> </td>
                       
                    </tr>
                    @empty
                    <h5>no data</h5>
                    @endforelse
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Picture</th>
                  <th>Product Name</th>
                  <th>SKU</th>
                  <th>Price</th>
                  <th>Stock Quantity</th>
                  <th>Published</th>
                  <th>Edit</th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


@push('css')
        <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/Dashboard-ERP/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/Dashboard-ERP/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/Dashboard-ERP/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush


@push('js')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('backend/Dashboard-ERP/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/Dashboard-ERP/dist/js/adminlte.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



@endpush