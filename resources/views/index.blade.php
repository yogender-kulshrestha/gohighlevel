@extends('layouts.master')

@section('title', 'Index')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
@endsection

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
@endsection

@section('style')
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Sub Accounts</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0 px-2">
                        <table id="datatable" class="user-list-table table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Email </th>
                                    <th>Phone </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(env('GHL_API_TOKEN'))
                                @foreach($rows as $key => $row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row['firstName'] ?? ''}} {{$row['lastName'] ?? ''}}</td>
                                    <td>{{$row['name'] ?? ''}}</td>
                                    <td>{{$row['email'] ?? ''}}</td>
                                    <td>{{$row['phone'] ?? ''}}</td>
                                    <td><a href="{{route('contacts')}}?token={{$row['apiKey']}}">view contacts</a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>1</td>
                                    <td>Robort Watson</td>
                                    <td>ABC</td>
                                    <td>robort@yopmail.com</td>
                                    <td>088824 64845</td>
                                    <td><a href="{{route('contacts')}}?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2NhdGlvbl9pZCI6ImFBWk5rRXlCb1hUNjR4ZnhmcnhiIiwiY29tcGFueV9pZCI6IkdrOXJTNkluV0JxZHpPWW5zbHFsIiwidmVyc2lvbiI6MSwiaWF0IjoxNjk4ODQ3MTQ3MTE3LCJzdWIiOiJ1c2VyX2lkIn0.g7Eu9tz2kqk13p7-pmr9Lg_w1HYimFEzy9UbOzwjdf4">view contacts</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>John Watson</td>
                                    <td>Delhi airport</td>
                                    <td>johnwatson@gmail.com</td>
                                    <td>011 2463 2950</td>
                                    <td><a href="{{route('contacts')}}?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2NhdGlvbl9pZCI6Ik5yYzZpU29oZmpDbElyWjRoNFNSIiwiY29tcGFueV9pZCI6IkdrOXJTNkluV0JxZHpPWW5zbHFsIiwidmVyc2lvbiI6MSwiaWF0IjoxNjk4ODQ3ODAyMDM1LCJzdWIiOiJ1c2VyX2lkIn0.BSdEk3Yknvu_pQzbK_DAp1uSbbAat5yCHn3mBnUx4I4">view contacts</a></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var datatable = $('#datatable').DataTable({
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Search',
                searchPlaceholder: 'Search..',
                paginate: {
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            "processing": true,
            "serverSide": false,
            "searching": false,
            "responsive": true,
        });
    });
</script>
@endsection
