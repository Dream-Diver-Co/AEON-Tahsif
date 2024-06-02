<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\CriticalDetails;
use App\Models\CriticalPath;
use App\Models\BuyerCriticalPath;
use App\Models\Department;
use App\Models\Manufacturer;
use App\Models\PurchageOrder;
use App\Models\Vendor;
use CreateCriticalDetailsTable;
use Illuminate\Http\Request;
use DB;
use Auth;

use DateTime;
use Carbon\Carbon;

class CriticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $buyerList = Buyer::orderBy('id', 'desc')->get();
        $departmentList = Department::orderBy('id', 'desc')->get();
        $vendor = Vendor::orderBy('id', 'desc')->get();
        // $criticalPath = CriticalPath::orderBy('critical_paths.id', 'desc')
        //     ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
        //     ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
        //     ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
        //     ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
        //     ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
        //     ->select(
        //         '*',
        //         'critical_paths.id as c_id',
        //         'manufacturers.name as manufatureName',
        //         'purchage_orders.*',
        //         'purchage_orders.id as p_id',
        //         'purchage_orders.fabric_content as aFabriccontent',
        //         'critical_paths.colour as aColor',
        //         'purchage_orders.care_lavel_date as careDate',
        //         'critical_paths.style_no as aStyleNo',
        //         'departments.name as deptName',
        //         'vendors.name as vendorName',
        //         'buyers.name as buyerName',
        //         DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id=critical_paths.po_id) as TotalItemsOrdered')
        //     )
        //     ->get();
        if (Auth::user()->buyer_id != null) {
            $criticalPath = DB::table('critical_paths')
                ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
                ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
                ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
                ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
                ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
                ->select(
                    'critical_paths.*',
                    'critical_paths.id as c_id',
                    DB::raw('(SELECT MAX(name) FROM manufacturers WHERE vendor_id = purchage_orders.vendor_id) as manufatureName'),
                    'purchage_orders.*',
                    'purchage_orders.id as p_id',
                    DB::raw('(SELECT MAX(fabric_content) FROM purchage_orders WHERE id = purchage_orders.id) as aFabriccontent'),
                    DB::raw('(SELECT MAX(colour) FROM critical_paths WHERE po_id = purchage_orders.id) as aColor'),
                    DB::raw('(SELECT MAX(care_lavel_date) FROM purchage_orders WHERE id = purchage_orders.id) as careDate'),
                    DB::raw('(SELECT MAX(style_no) FROM critical_paths WHERE po_id = purchage_orders.id) as aStyleNo'),
                    DB::raw('(SELECT MAX(name) FROM departments WHERE id = purchage_orders.department_id) as deptName'),
                    DB::raw('(SELECT MAX(name) FROM vendors WHERE id = purchage_orders.vendor_id) as vendorName'),
                    DB::raw('(SELECT MAX(name) FROM buyers WHERE id = purchage_orders.buyer_id) as buyerName'),
                    DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id = purchage_orders.id) as TotalItemsOrdered')
                )
                ->where('purchage_orders.buyer_id', Auth::user()->buyer_id) // Add the condition to filter by buyer_id
                ->orderBy('c_id', 'desc')
                ->get();
        } elseif (Auth::user()->vendor_id != null) {
            $criticalPath = DB::table('critical_paths')
                ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
                ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
                ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
                ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
                ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
                ->select(
                    'critical_paths.*',
                    'critical_paths.id as c_id',
                    DB::raw('(SELECT MAX(name) FROM manufacturers WHERE vendor_id = purchage_orders.vendor_id) as manufatureName'),
                    'purchage_orders.*',
                    'purchage_orders.id as p_id',
                    DB::raw('(SELECT MAX(fabric_content) FROM purchage_orders WHERE id = purchage_orders.id) as aFabriccontent'),
                    DB::raw('(SELECT MAX(colour) FROM critical_paths WHERE po_id = purchage_orders.id) as aColor'),
                    DB::raw('(SELECT MAX(care_lavel_date) FROM purchage_orders WHERE id = purchage_orders.id) as careDate'),
                    DB::raw('(SELECT MAX(style_no) FROM critical_paths WHERE po_id = purchage_orders.id) as aStyleNo'),
                    DB::raw('(SELECT MAX(name) FROM departments WHERE id = purchage_orders.department_id) as deptName'),
                    DB::raw('(SELECT MAX(name) FROM vendors WHERE id = purchage_orders.vendor_id) as vendorName'),
                    DB::raw('(SELECT MAX(name) FROM buyers WHERE id = purchage_orders.buyer_id) as buyerName'),
                    DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id = purchage_orders.id) as TotalItemsOrdered')
                )
                ->where('purchage_orders.vendor_id', Auth::user()->buyer_id) // Add the condition to filter by buyer_id
                ->orderBy('c_id', 'desc')
                ->get();
        } else {
            $criticalPath = DB::table('critical_paths')
                ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
                ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
                ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
                ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
                ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
                ->select(
                    'critical_paths.*',
                    'critical_paths.id as c_id',
                    DB::raw('(SELECT MAX(name) FROM manufacturers WHERE vendor_id = purchage_orders.vendor_id) as manufatureName'),
                    'purchage_orders.*',
                    'purchage_orders.id as p_id',
                    DB::raw('(SELECT MAX(fabric_content) FROM purchage_orders WHERE id = purchage_orders.id) as aFabriccontent'),
                    DB::raw('(SELECT MAX(colour) FROM critical_paths WHERE po_id = purchage_orders.id) as aColor'),
                    DB::raw('(SELECT MAX(care_lavel_date) FROM purchage_orders WHERE id = purchage_orders.id) as careDate'),
                    DB::raw('(SELECT MAX(style_no) FROM critical_paths WHERE po_id = purchage_orders.id) as aStyleNo'),
                    DB::raw('(SELECT MAX(name) FROM departments WHERE id = purchage_orders.department_id) as deptName'),
                    DB::raw('(SELECT MAX(name) FROM vendors WHERE id = purchage_orders.vendor_id) as vendorName'),
                    DB::raw('(SELECT MAX(name) FROM buyers WHERE id = purchage_orders.buyer_id) as buyerName'),
                    DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id = purchage_orders.id) as TotalItemsOrdered')
                )
                ->orderBy('c_id', 'desc')
                ->get();
        }

        if (Auth::user()->hasRole('buyer')) {
            //dd($criticalPath[0]->earliest_buyer_date);
            //dd($criticalPath);
            foreach ($criticalPath as $data) {

                // if (condition) {
                //     # code...
                // }

                $endDate = Carbon::parse($data->ex_factory_date_po);
                $startDate = Carbon::parse($data->earliest_buyer_date);

                $interval = $endDate->diff($startDate);
                if (!empty($data->ex_factory_date_po)) {
                    $data->ex_factory_date_po = $data->earliest_buyer_date;
                }
                if (!empty($data->final_aql_date_plan)) {
                    $data->final_aql_date_plan = Carbon::parse($data->final_aql_date_plan)->sub($interval)->toDateString();
                }

                if (!empty($data->finishing_complete_plan)) {
                    $data->finishing_complete_plan = Carbon::parse($data->finishing_complete_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->washing_complete_plan)) {
                    $data->washing_complete_plan = Carbon::parse($data->washing_complete_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->Sewing_plan)) {
                    $data->Sewing_plan = Carbon::parse($data->Sewing_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->embellishment_plan)) {
                    $data->embellishment_plan = Carbon::parse($data->embellishment_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->cutting_date_plan)) {
                    $data->cutting_date_plan = Carbon::parse($data->cutting_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->bulk_yarn_fabric_plan_date)) {
                    $data->bulk_yarn_fabric_plan_date = Carbon::parse($data->bulk_yarn_fabric_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->fabric_ordered_plan_date)) {
                    $data->fabric_ordered_plan_date = Carbon::parse($data->fabric_ordered_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->official_po_sent_plan_date)) {
                    $data->official_po_sent_plan_date = Carbon::parse($data->official_po_sent_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->pp_meeting_plan)) {
                    $data->pp_meeting_plan = Carbon::parse($data->pp_meeting_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->pp_approval)) {
                    $data->pp_approval = Carbon::parse($data->pp_approval)->sub($interval)->toDateString();
                }
                if (!empty($data->embellishment_s_o_approval_plan_date)) {
                    $data->embellishment_s_o_approval_plan_date = Carbon::parse($data->embellishment_s_o_approval_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->colour_std_print_artwork_sent_to_supplier_plan_date)) {
                    $data->colour_std_print_artwork_sent_to_supplier_plan_date = Carbon::parse($data->colour_std_print_artwork_sent_to_supplier_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->lab_dip_approval_plan_date)) {
                    $data->lab_dip_approval_plan_date = Carbon::parse($data->lab_dip_approval_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->size_set_approval)) {
                    $data->size_set_approval = Carbon::parse($data->size_set_approval)->sub($interval)->toDateString();
                }
                if (!empty($data->fit_approval_plan)) {
                    $data->fit_approval_plan = Carbon::parse($data->fit_approval_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->development_photo_sample_sent_plan_date)) {
                    $data->development_photo_sample_sent_plan_date = Carbon::parse($data->development_photo_sample_sent_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->material_inhouse_plan)) {
                    $data->material_inhouse_plan = Carbon::parse($data->material_inhouse_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->finishing_inline_inspection_date_plan)) {
                    $data->finishing_inline_inspection_date_plan = Carbon::parse($data->finishing_inline_inspection_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->sewing_inline_inspection_date_plan)) {
                    $data->sewing_inline_inspection_date_plan = Carbon::parse($data->sewing_inline_inspection_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->pre_final_date_plan)) {
                    $data->pre_final_date_plan = Carbon::parse($data->pre_final_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->sa_approval_plan)) {
                    $data->sa_approval_plan = Carbon::parse($data->sa_approval_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->production_sample_approval_plan)) {
                    $data->production_sample_approval_plan = Carbon::parse($data->production_sample_approval_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->shipment_booking_with_acs_plan)) {
                    $data->shipment_booking_with_acs_plan = Carbon::parse($data->shipment_booking_with_acs_plan)->sub($interval)->toDateString();
                }


                // dd($data->final_aql_date_plan);

                //$diference = $data->earliest_buyer_date - $data->ex_factory_date_po;

            }

            return view('pages.critical.index_buyer', compact('buyerList', 'departmentList', 'vendor', 'criticalPath'));
        } else {
            return view('pages.critical.index', compact('buyerList', 'departmentList', 'vendor', 'criticalPath'));
        }
    }

    public function buyerindex()
    {
        $buyerList = Buyer::orderBy('id', 'desc')->get();
        $departmentList = Department::orderBy('id', 'desc')->get();
        $vendor = Vendor::orderBy('id', 'desc')->get();
        // $criticalPath = CriticalPath::orderBy('critical_paths.id', 'desc')
        //     ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
        //     ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
        //     ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
        //     ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
        //     ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
        //     ->select(
        //         '*',
        //         'critical_paths.id as c_id',
        //         'manufacturers.name as manufatureName',
        //         'purchage_orders.*',
        //         'purchage_orders.id as p_id',
        //         'purchage_orders.fabric_content as aFabriccontent',
        //         'critical_paths.colour as aColor',
        //         'purchage_orders.care_lavel_date as careDate',
        //         'critical_paths.style_no as aStyleNo',
        //         'departments.name as deptName',
        //         'vendors.name as vendorName',
        //         'buyers.name as buyerName',
        //         DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id=critical_paths.po_id) as TotalItemsOrdered')
        //     )
        //     ->get();


        if (Auth::user()->buyer_id != null) {
            $criticalPath = DB::table('critical_paths')
                ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
                ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
                ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
                ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
                ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
                ->select(
                    'critical_paths.*',
                    'critical_paths.id as c_id',
                    DB::raw('(SELECT MAX(name) FROM manufacturers WHERE vendor_id = purchage_orders.vendor_id) as manufatureName'),
                    'purchage_orders.*',
                    'purchage_orders.id as p_id',
                    DB::raw('(SELECT MAX(fabric_content) FROM purchage_orders WHERE id = purchage_orders.id) as aFabriccontent'),
                    DB::raw('(SELECT MAX(colour) FROM critical_paths WHERE po_id = purchage_orders.id) as aColor'),
                    DB::raw('(SELECT MAX(care_lavel_date) FROM purchage_orders WHERE id = purchage_orders.id) as careDate'),
                    DB::raw('(SELECT MAX(style_no) FROM critical_paths WHERE po_id = purchage_orders.id) as aStyleNo'),
                    DB::raw('(SELECT MAX(name) FROM departments WHERE id = purchage_orders.department_id) as deptName'),
                    DB::raw('(SELECT MAX(name) FROM vendors WHERE id = purchage_orders.vendor_id) as vendorName'),
                    DB::raw('(SELECT MAX(name) FROM buyers WHERE id = purchage_orders.buyer_id) as buyerName'),
                    DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id = purchage_orders.id) as TotalItemsOrdered')
                )
                ->where('purchage_orders.buyer_id', Auth::user()->buyer_id) // Add the condition to filter by buyer_id
                ->orderBy('c_id', 'desc')
                ->get();
        } elseif (Auth::user()->vendor_id != null) {
            $criticalPath = DB::table('critical_paths')
                ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
                ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
                ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
                ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
                ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
                ->select(
                    'critical_paths.*',
                    'critical_paths.id as c_id',
                    DB::raw('(SELECT MAX(name) FROM manufacturers WHERE vendor_id = purchage_orders.vendor_id) as manufatureName'),
                    'purchage_orders.*',
                    'purchage_orders.id as p_id',
                    DB::raw('(SELECT MAX(fabric_content) FROM purchage_orders WHERE id = purchage_orders.id) as aFabriccontent'),
                    DB::raw('(SELECT MAX(colour) FROM critical_paths WHERE po_id = purchage_orders.id) as aColor'),
                    DB::raw('(SELECT MAX(care_lavel_date) FROM purchage_orders WHERE id = purchage_orders.id) as careDate'),
                    DB::raw('(SELECT MAX(style_no) FROM critical_paths WHERE po_id = purchage_orders.id) as aStyleNo'),
                    DB::raw('(SELECT MAX(name) FROM departments WHERE id = purchage_orders.department_id) as deptName'),
                    DB::raw('(SELECT MAX(name) FROM vendors WHERE id = purchage_orders.vendor_id) as vendorName'),
                    DB::raw('(SELECT MAX(name) FROM buyers WHERE id = purchage_orders.buyer_id) as buyerName'),
                    DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id = purchage_orders.id) as TotalItemsOrdered')
                )
                ->where('purchage_orders.vendor_id', Auth::user()->buyer_id) // Add the condition to filter by buyer_id
                ->orderBy('c_id', 'desc')
                ->get();
        } else {
            $criticalPath = DB::table('critical_paths')
                ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
                ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
                ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
                ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
                ->join('manufacturers', 'purchage_orders.vendor_id', '=', 'manufacturers.vendor_id')
                ->select(
                    'critical_paths.*',
                    'critical_paths.id as c_id',
                    DB::raw('(SELECT MAX(name) FROM manufacturers WHERE vendor_id = purchage_orders.vendor_id) as manufatureName'),
                    'purchage_orders.*',
                    'purchage_orders.id as p_id',
                    DB::raw('(SELECT MAX(fabric_content) FROM purchage_orders WHERE id = purchage_orders.id) as aFabriccontent'),
                    DB::raw('(SELECT MAX(colour) FROM critical_paths WHERE po_id = purchage_orders.id) as aColor'),
                    DB::raw('(SELECT MAX(care_lavel_date) FROM purchage_orders WHERE id = purchage_orders.id) as careDate'),
                    DB::raw('(SELECT MAX(style_no) FROM critical_paths WHERE po_id = purchage_orders.id) as aStyleNo'),
                    DB::raw('(SELECT MAX(name) FROM departments WHERE id = purchage_orders.department_id) as deptName'),
                    DB::raw('(SELECT MAX(name) FROM vendors WHERE id = purchage_orders.vendor_id) as vendorName'),
                    DB::raw('(SELECT MAX(name) FROM buyers WHERE id = purchage_orders.buyer_id) as buyerName'),
                    DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id = purchage_orders.id) as TotalItemsOrdered')
                )
                ->orderBy('c_id', 'desc')
                ->get();
        }

        if (Auth::user()->hasRole('Super Admin')) {
            //dd($criticalPath[0]->earliest_buyer_date);
            //dd($criticalPath);
            foreach ($criticalPath as $data) {

                // if (condition) {
                //     # code...
                // }

                $endDate = Carbon::parse($data->ex_factory_date_po);
                $startDate = Carbon::parse($data->earliest_buyer_date);

                $interval = $endDate->diff($startDate);
                if (!empty($data->ex_factory_date_po)) {
                    $data->ex_factory_date_po = $data->earliest_buyer_date;
                }
                if (!empty($data->final_aql_date_plan)) {
                    $data->final_aql_date_plan = Carbon::parse($data->final_aql_date_plan)->sub($interval)->toDateString();
                }

                if (!empty($data->finishing_complete_plan)) {
                    $data->finishing_complete_plan = Carbon::parse($data->finishing_complete_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->washing_complete_plan)) {
                    $data->washing_complete_plan = Carbon::parse($data->washing_complete_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->Sewing_plan)) {
                    $data->Sewing_plan = Carbon::parse($data->Sewing_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->embellishment_plan)) {
                    $data->embellishment_plan = Carbon::parse($data->embellishment_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->cutting_date_plan)) {
                    $data->cutting_date_plan = Carbon::parse($data->cutting_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->bulk_yarn_fabric_plan_date)) {
                    $data->bulk_yarn_fabric_plan_date = Carbon::parse($data->bulk_yarn_fabric_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->fabric_ordered_plan_date)) {
                    $data->fabric_ordered_plan_date = Carbon::parse($data->fabric_ordered_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->official_po_sent_plan_date)) {
                    $data->official_po_sent_plan_date = Carbon::parse($data->official_po_sent_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->pp_meeting_plan)) {
                    $data->pp_meeting_plan = Carbon::parse($data->pp_meeting_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->pp_approval)) {
                    $data->pp_approval = Carbon::parse($data->pp_approval)->sub($interval)->toDateString();
                }
                if (!empty($data->embellishment_s_o_approval_plan_date)) {
                    $data->embellishment_s_o_approval_plan_date = Carbon::parse($data->embellishment_s_o_approval_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->colour_std_print_artwork_sent_to_supplier_plan_date)) {
                    $data->colour_std_print_artwork_sent_to_supplier_plan_date = Carbon::parse($data->colour_std_print_artwork_sent_to_supplier_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->lab_dip_approval_plan_date)) {
                    $data->lab_dip_approval_plan_date = Carbon::parse($data->lab_dip_approval_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->size_set_approval)) {
                    $data->size_set_approval = Carbon::parse($data->size_set_approval)->sub($interval)->toDateString();
                }
                if (!empty($data->fit_approval_plan)) {
                    $data->fit_approval_plan = Carbon::parse($data->fit_approval_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->development_photo_sample_sent_plan_date)) {
                    $data->development_photo_sample_sent_plan_date = Carbon::parse($data->development_photo_sample_sent_plan_date)->sub($interval)->toDateString();
                }
                if (!empty($data->material_inhouse_plan)) {
                    $data->material_inhouse_plan = Carbon::parse($data->material_inhouse_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->finishing_inline_inspection_date_plan)) {
                    $data->finishing_inline_inspection_date_plan = Carbon::parse($data->finishing_inline_inspection_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->sewing_inline_inspection_date_plan)) {
                    $data->sewing_inline_inspection_date_plan = Carbon::parse($data->sewing_inline_inspection_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->pre_final_date_plan)) {
                    $data->pre_final_date_plan = Carbon::parse($data->pre_final_date_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->sa_approval_plan)) {
                    $data->sa_approval_plan = Carbon::parse($data->sa_approval_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->production_sample_approval_plan)) {
                    $data->production_sample_approval_plan = Carbon::parse($data->production_sample_approval_plan)->sub($interval)->toDateString();
                }
                if (!empty($data->shipment_booking_with_acs_plan)) {
                    $data->shipment_booking_with_acs_plan = Carbon::parse($data->shipment_booking_with_acs_plan)->sub($interval)->toDateString();
                }


                // dd($data->final_aql_date_plan);

                //$diference = $data->earliest_buyer_date - $data->ex_factory_date_po;

            }

            return view('pages.critical.index_buyer', compact('buyerList', 'departmentList', 'vendor', 'criticalPath'));
        } else {
            return view('pages.critical.index', compact('buyerList', 'departmentList', 'vendor', 'criticalPath'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poList = PurchageOrder::orderBy('id', 'desc')->get();
        return view('pages.critical.create', compact('poList'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$users = User::where('status', 'active')->get();
        //$criticalPath = CriticalPath::where('po_id', $id)->get();
        //$criticalPath = CriticalPath::find($id);
        //$criticalPath = CriticalPath::where('po_id', $id)->get();
        //dd($criticalPath);
        //dd($id);
        //$criticalPath = CriticalPath::where('po_id', $id)->orderBy

        $criticalPath = CriticalPath::where('po_id', $id)->orderBy('critical_paths.id', 'desc')
            ->join('purchage_orders', 'purchage_orders.id', '=', 'critical_paths.po_id')
            ->join('departments', 'departments.id', '=', 'purchage_orders.department_id')
            ->join('buyers', 'buyers.id', '=', 'purchage_orders.buyer_id')
            ->join('vendors', 'vendors.id', '=', 'purchage_orders.vendor_id')
            ->select(
                '*',
                'purchage_orders.*',
                'vendors.name as vendorName',
                'critical_paths.colour as colourName',
                'critical_paths.style_no as aStyleNo',
                'departments.name as deptName',
                'buyers.name as buyerName',
                DB::raw('(SELECT SUM(qty_ordered) FROM order_items WHERE po_id=critical_paths.po_id) as TotalItemsOrdered')
            )
            ->first();
        $po_find = PurchageOrder::find($id);
        // $criticlDetails=CriticalDetails::where('critical_id',$criticalPath->id)->first();
        //    $totalItemsOrdered = DB::select("SELECT SUM(qty_ordered) AS TotalItemsOrdered FROM order_items WHERE po_id=?", [$criticalPath->po_id]);
        //   array($totalItemsOrdered);

        //dd($criticalPath);
        return view('pages.critical.edit', compact('criticalPath', 'po_find'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());

        $criticalPath = CriticalPath::where('po_id', $id)->first();
        // $criticlDetails=CriticalDetails::where('critical_id',$criticalPath->id)->first();
        $po_find = PurchageOrder::find($criticalPath->po_id);
        if (isset($criticalPath)) {

            // Check if the fields are set in the request
            $updateData = [];
            $data = [];
            $details = [];
            if (isset($request->fabric_ref)) {
                $updateData['fabric_ref'] = $request->fabric_ref;
            }
            if (isset($request->block_repeat_initial)) {
                $updateData['block_repeat_initial'] = $request->block_repeat_initial;
            }
            if (isset($request->style_no)) {
                $updateData['style_no'] = $request->style_no;
            }
            if (isset($request->supplier_price_product_cost)) {
                $updateData['supplier_price_product_cost'] = $request->supplier_price_product_cost;
            }
            if (isset($request->style_description)) {
                $updateData['style_description'] = $request->style_description;
            }
            if (isset($request->total_value)) {
                $updateData['total_value'] = $request->total_value;
            }
            if (isset($request->fabric_weight)) {
                $updateData['fabric_weight'] = $request->fabric_weight;
            }
            if (isset($request->fabric_mill)) {
                $updateData['fabric_mill'] = $request->fabric_mill;
            }

            if (isset($request->season)) {
                $updateData['season'] = $request->season;
            }
            if (isset($request->colour)) {
                $updateData['colour'] = $request->colour;
            }

            if (isset($request->lead_times)) {
                $updateData['lead_times'] = $request->lead_times;
            }
            if (isset($request->treated_as_priority_order)) {
                $updateData['treated_as_priority_order'] = $request->treated_as_priority_order;
            }
            if (isset($request->official_po_sent_actual_date)) {
                $updateData['official_po_sent_actual_date'] = $request->official_po_sent_actual_date;
            }
            if (isset($request->official_po_sent_plan_date)) {
                $updateData['official_po_sent_plan_date'] = $request->official_po_sent_plan_date;
            }
            if (isset($request->colour_std_print_artwork_sent_to_supplier_actual_date)) {
                $updateData['colour_std_print_artwork_sent_to_supplier_actual_date'] = $request->colour_std_print_artwork_sent_to_supplier_actual_date;
            }
            if (isset($request->colour_std_print_artwork_sent_to_supplier_plan_date)) {
                $updateData['colour_std_print_artwork_sent_to_supplier_plan_date'] = $request->colour_std_print_artwork_sent_to_supplier_plan_date;
            }
            if (isset($request->lab_dip_approval_actual_date)) {
                $updateData['lab_dip_approval_actual_date'] = $request->lab_dip_approval_actual_date;
            }
            if (isset($request->lab_dip_approval_plan_date)) {
                $updateData['lab_dip_approval_plan_date'] = $request->lab_dip_approval_plan_date;
            }
            if (isset($request->lab_dip_dispatch_details)) {
                $updateData['lab_dip_dispatch_details'] = $request->lab_dip_dispatch_details;
            }
            if (isset($request->embellishment_s_o_approval_actual_date)) {
                $updateData['embellishment_s_o_approval_actual_date'] = $request->embellishment_s_o_approval_actual_date;
            }
            if (isset($request->embellishment_s_o_approval_plan_date)) {
                $updateData['embellishment_s_o_approval_plan_date'] = $request->embellishment_s_o_approval_plan_date;
            }
            if (isset($request->embellishment_s_o_dispatch_details)) {
                $updateData['embellishment_s_o_dispatch_details'] = $request->embellishment_s_o_dispatch_details;
            }
            if (isset($request->fabric_ordered_actual_date)) {
                $updateData['fabric_ordered_actual_date'] = $request->fabric_ordered_actual_date;
            }
            if (isset($request->fabric_ordered_plan_date)) {
                $updateData['fabric_ordered_plan_date'] = $request->fabric_ordered_plan_date;
            }
            if (isset($request->bulk_fabric_knit_down_approval_actual_date)) {
                $updateData['bulk_fabric_knit_down_approval_actual_date'] = $request->bulk_fabric_knit_down_approval_actual_date;
            }
            if (isset($request->bulk_fabric_knit_down_approval_plan_date)) {
                $updateData['bulk_fabric_knit_down_approval_plan_date'] = $request->bulk_fabric_knit_down_approval_plan_date;
            }
            if (isset($request->bulk_fabric_knit_down_dispatch_details)) {
                $updateData['bulk_fabric_knit_down_dispatch_details'] = $request->bulk_fabric_knit_down_dispatch_details;
            }
            if (isset($request->bulk_yarn_fabric_actual_date)) {
                $updateData['bulk_yarn_fabric_actual_date'] = $request->bulk_yarn_fabric_actual_date;
            }
            if (isset($request->bulk_yarn_fabric_plan_date)) {
                $updateData['bulk_yarn_fabric_plan_date'] = $request->bulk_yarn_fabric_plan_date;
            }
            /**sample approval */
            if (isset($request->development_photo_sample_sent_actual_date)) {
                $updateData['development_photo_sample_sent_actual_date'] = $request->development_photo_sample_sent_actual_date;
            }
            if (isset($request->development_photo_sample_sent_plan_date)) {
                $updateData['development_photo_sample_sent_plan_date'] = $request->development_photo_sample_sent_plan_date;
            }
            if (isset($request->development_photo_sample_dispatch_details)) {
                $updateData['development_photo_sample_dispatch_details'] = $request->development_photo_sample_dispatch_details;
            }
            if (isset($request->fit_approval_actual)) {
                $updateData['fit_approval_actual'] = $request->fit_approval_actual;
            }
            if (isset($request->fit_approval_plan)) {
                $updateData['fit_approval_plan'] = $request->fit_approval_plan;
            }
            if (isset($request->fit_dispatch)) {
                $updateData['fit_dispatch'] = $request->fit_dispatch;
            }
            if (isset($request->size_set_actual)) {
                $updateData['size_set_actual'] = $request->size_set_actual;
            }
            if (isset($request->size_set_approval)) {
                $updateData['size_set_approval'] = $request->size_set_approval;
            }
            if (isset($request->size_set_dispatch)) {
                $updateData['size_set_dispatch'] = $request->size_set_dispatch;
            }
            if (isset($request->pp_actual)) {
                $updateData['pp_actual'] = $request->pp_actual;
            }
            if (isset($request->pp_approval)) {
                $updateData['pp_approval'] = $request->pp_approval;
            }
            if (isset($request->pp_dispatch)) {
                $updateData['pp_dispatch'] = $request->pp_dispatch;
            }
            if (isset($request->care_label_approval)) {
                $updateData['care_label_approval'] = $request->care_label_approval;
            }
            if (isset($request->material_inhouse_actual)) {
                $updateData['material_inhouse_actual'] = $request->material_inhouse_actual;
            }
            if (isset($request->material_inhouse_plan)) {
                $updateData['material_inhouse_plan'] = $request->material_inhouse_plan;
            }
            if (isset($request->pp_meeting_actual)) {
                $updateData['pp_meeting_actual'] = $request->pp_meeting_actual;
            }
            if (isset($request->pp_meeting_plan)) {
                $updateData['pp_meeting_plan'] = $request->pp_meeting_plan;
            }
            if (isset($request->manufacture_unit)) {
                $updateData['manufacture_unit'] = $request->manufacture_unit;
            }
            if (isset($request->total_value)) {
                $updateData['total_value'] = $request->total_value;
            }
            if (isset($request->care_label_actual)) {
                $updateData['care_label_actual'] = $request->care_label_actual;
            }


            // Add more conditions for other fields as needed

            // Update the model with the data


            // if (isset($request->care_lavel_date)) {
            //     $data['care_lavel_date'] = $request->care_lavel_date;
            // }
            if (isset($request->ex_factory_date)) {
                $data['ex_factory_date'] = $request->ex_factory_date;
            }
            $po_find->update($data);

            if (isset($request->cutting_date_actual)) {
                $updateData['cutting_date_actual'] = $request->cutting_date_actual;
            }
            if (isset($request->cutting_date_plan)) {
                $updateData['cutting_date_plan'] = $request->cutting_date_plan;
            }
            if (isset($request->embellishment_actual)) {
                $updateData['embellishment_actual'] = $request->embellishment_actual;
            }
            if (isset($request->embellishment_plan)) {
                $updateData['embellishment_plan'] = $request->embellishment_plan;
            }
            if (isset($request->Sewing_actual)) {
                $updateData['Sewing_actual'] = $request->Sewing_actual;
            }
            if (isset($request->Sewing_plan)) {
                $updateData['Sewing_plan'] = $request->Sewing_plan;
            }
            if (isset($request->washing_complete_actual)) {
                $updateData['washing_complete_actual'] = $request->washing_complete_actual;
            }
            if (isset($request->washing_complete_plan)) {
                $updateData['washing_complete_plan'] = $request->washing_complete_plan;
            }
            if (isset($request->finishing_complete_actual)) {
                $updateData['finishing_complete_actual'] = $request->finishing_complete_actual;
            }
            if (isset($request->finishing_complete_plan)) {
                $updateData['finishing_complete_plan'] = $request->finishing_complete_plan;
            }
            if (isset($request->sewing_inline_inspection_date_actual)) {
                $updateData['sewing_inline_inspection_date_actual'] = $request->sewing_inline_inspection_date_actual;
            }
            if (isset($request->finishing_inline_inspection_report)) {
                $updateData['finishing_inline_inspection_report'] = $request->finishing_inline_inspection_report;
            }
            if (isset($request->pre_final_date_actual)) {
                $updateData['pre_final_date_actual'] = $request->pre_final_date_actual;
            }
            if (isset($request->create_aql_schedule)) {
                $updateData['create_aql_schedule'] = $request->create_aql_schedule;
            }
            if (isset($request->final_aql_date_actual)) {
                $updateData['final_aql_date_actual'] = $request->final_aql_date_actual;
            }
            if (isset($request->production_sample_approval_actual)) {
                $updateData['production_sample_approval_actual'] = $request->production_sample_approval_actual;
            }
            if (isset($request->production_sample_dispatch)) {
                $updateData['production_sample_dispatch'] = $request->production_sample_dispatch;
            }
            if (isset($request->shipment_booking_with_acs_actual)) {
                $updateData['shipment_booking_with_acs_actual'] = $request->shipment_booking_with_acs_actual;
            }
            if (isset($request->sa_approval_actual)) {
                $updateData['sa_approval_actual'] = $request->sa_approval_actual;
            }
            if (isset($request->late_delivery_discounts_crp)) {
                $updateData['late_delivery_discounts_crp'] = $request->late_delivery_discounts_crp;
            }
            if (isset($request->invoice_create_date)) {
                $updateData['invoice_create_date'] = $request->invoice_create_date;
            }
            if (isset($request->payment_receive_date)) {
                $updateData['payment_receive_date'] = $request->payment_receive_date;
            }
            if (isset($request->reason_for_change_affect_shipment)) {
                $updateData['reason_for_change_affect_shipment'] = $request->reason_for_change_affect_shipment;
            }
            if (isset($request->aeon_comments_date)) {
                $updateData['aeon_comments_date'] = $request->aeon_comments_date;
            }
            if (isset($request->vendor_comments_date)) {
                $updateData['vendor_comments_date'] = $request->vendor_comments_date;
            }
            if (isset($request->sa_eta_5_days)) {
                $updateData['sa_eta_5_days'] = $request->sa_eta_5_days;
            }
            if (isset($request->note)) {
                $updateData['note'] = $request->note;
            }
            if (isset($request->create_pp_meeting_schedule)) {
                $updateData['create_pp_meeting_schedule'] = $request->create_pp_meeting_schedule;
            }
            if (isset($request->pre_final_aql_report_schedule)) {
                $updateData['pre_final_aql_report_schedule'] = $request->pre_final_aql_report_schedule;
            }
            if (isset($request->invoice_num)) {
                $updateData['invoice_num'] = $request->invoice_num;
            }

            if (isset($request->re_ex_fac_date_po)) {
                $updateData['revised_ex_factory_date'] = $request->re_ex_fac_date_po;
            }

            if (isset($request->actual_ex_factory_date)) {
                $updateData['actual_ex_factory_date'] = $request->actual_ex_factory_date;
            }

            if (isset($request->revised_eta_sa_date)) {
                $updateData['revised_eta_sa_date'] = $request->revised_eta_sa_date;
            }

            if (isset($request->orginal_eta_sa_date)) {
                $updateData['orginal_eta_sa_date'] = $request->orginal_eta_sa_date;
            }

            if (isset($request->forward_ref)) {
                $updateData['forward_ref'] = $request->forward_ref;
            }

            // image add  start

            if ($request->hasFile('image')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('image')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $filePath = 'storage/logos/' . $newFileName;

                $updateData['image'] = $filePath;
            }



            // image add end

            // lab_dip_image add  start

            if ($request->hasFile('lab_dip_image')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('lab_dip_image')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('lab_dip_image')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('lab_dip_image')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $lab_dip_filePath = 'storage/logos/' . $newFileName;

                $updateData['lab_dip_image'] = $lab_dip_filePath;
            }



            // lab_dip_image add end


            // emb_so_img add  start

            if ($request->hasFile('emb_so_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('emb_so_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('emb_so_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('emb_so_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $lab_dip_filePath = 'storage/logos/' . $newFileName;

                $updateData['embellishment_s_o_image'] = $lab_dip_filePath;
            }



            // emb_so_img add end





            // bulk_fabric_knit_down_image add  start

            if ($request->hasFile('bulk_fabric_knit_down_image')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('bulk_fabric_knit_down_image')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('bulk_fabric_knit_down_image')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('bulk_fabric_knit_down_image')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $bulk_fabric_knit_down_imagefilePath = 'storage/logos/' . $newFileName;

                $updateData['bulk_fabric_knit_down_image'] = $bulk_fabric_knit_down_imagefilePath;
            }



            // bulk_fabric_knit_down_image add end




            // dev_photo add  start

            if ($request->hasFile('dev_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('dev_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('dev_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('dev_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $dev_photo_path = 'storage/logos/' . $newFileName;

                $updateData['development_photo_sample_dispatch_sample_image'] = $dev_photo_path;
            }



            // dev_photo add end


            // fit_photo add  start

            if ($request->hasFile('fit_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('fit_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('fit_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('fit_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $fit_image_path = 'storage/logos/' . $newFileName;

                $updateData['fit_sample_image'] = $fit_image_path;
            }



            // fit_photo add end


            // size_set add  start

            if ($request->hasFile('size_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('size_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('size_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('size_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $fit_image_path = 'storage/logos/' . $newFileName;

                $updateData['size_set_image'] = $fit_image_path;
            }



            // size_set add end


            // // size_set add  start

            if ($request->hasFile('size_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('size_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('size_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('size_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $fit_image_path = 'storage/logos/' . $newFileName;

                $updateData['size_set_image'] = $fit_image_path;
            }



            // pp_sample_image add end add  start

            if ($request->hasFile('pp_app_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('pp_app_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('pp_app_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('pp_app_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $pp_sample_image_path = 'storage/logos/' . $newFileName;

                $updateData['pp_sample_image'] = $pp_sample_image_path;
            }



            // pp_sample_image add end


            // pp_meet_img add end add  start

            if ($request->hasFile('pp_meet_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('pp_meet_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('pp_meet_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $fileStorePath = $request->file('pp_meet_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $pp_meet_img_path = 'storage/logos/' . $newFileName;

                $updateData['pp_meeting_report_upload'] = $pp_meet_img_path;
            }



            // pp_meet_img add end



            // sew_file add end add  start

            if ($request->hasFile('sew_file')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('sew_file')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('sew_file')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $sewfileStorePath = $request->file('sew_file')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $sew_file_img_path = 'storage/logos/' . $newFileName;

                $updateData['sewing_inline_inspection_report_upload'] = $sew_file_img_path;
            }



            // sew_file add end


            // finish_inline_file add end add  start

            if ($request->hasFile('finish_inline_file')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('finish_inline_file')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('finish_inline_file')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $sewfileStorePath = $request->file('finish_inline_file')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $finish_inline_file_sew_file_img_path = 'storage/logos/' . $newFileName;

                $updateData['finishing_inline_inspection_report'] = $finish_inline_file_sew_file_img_path;
            }



            // finish_inline_file add end



            // pre_final_aql_report add end add  start

            if ($request->hasFile('pre_final_aql_report')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('pre_final_aql_report')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('pre_final_aql_report')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $sewfileStorePath = $request->file('pre_final_aql_report')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $pre_final_aql_report_file_img_path = 'storage/logos/' . $newFileName;

                $updateData['pre_final_aql_report_schedule'] = $pre_final_aql_report_file_img_path;
            }



            // pre_final_aql_report add end


            // final_aql_file add end add  start

            if ($request->hasFile('final_aql_file')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('final_aql_file')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('final_aql_file')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $sewfileStorePath = $request->file('final_aql_file')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $final_aql_file_img_path = 'storage/logos/' . $newFileName;

                $updateData['final_aql_report_upload'] = $final_aql_file_img_path;
            }



            // final_aql_file add end


            // pp_sam_img add end add  start

            if ($request->hasFile('pp_sam_img')) {
                $destinationPath = 'public/logos';
                $mainName = pathinfo($request->file('pp_sam_img')->getClientOriginalName(), PATHINFO_FILENAME);
                // Get the file extension from the uploaded logo
                $extension = $request->file('pp_sam_img')->getClientOriginalExtension();
                // Generate a unique file name with the main name, current timestamp, and extension
                $newFileName = $mainName . '_' . time() . '.' . $extension;
                // Move the logo file to the specified destination path
                $sewfileStorePath = $request->file('pp_sam_img')->storeAs($destinationPath, $newFileName);
                // Set the logo path to the Buyer model attribute
                $final_aql_file_img_path = 'storage/logos/' . $newFileName;

                $updateData['production_sample_upload'] = $final_aql_file_img_path;
            }



            // pp_sam_img add end


            $criticalPath->update($updateData);
            return redirect()->back()->with('success', 'Data saved successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function processDate(Request $request)
    {
        //dd($request->all());
        // Your code to process the date goes here
        $selectedDate = $request->input('enteredDate');
        $id = $request->input('po_id');



        // critical path update

        $criticalPath = CriticalPath::where('id', $id)->orderBy('id', 'desc')->first();
        $updateData = [];

        if ($criticalPath) {

            //image upload start

            if ($request->input('type') == "image_general_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['image'] = $filePath;
                }
            }
            if ($request->input('type') == "image_labdip_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['lab_dip_image'] = $filePath;
                }
            }
            if ($request->input('type') == "image_embellishment_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['embellishment_s_o_image'] = $filePath;
                }
            }
            if ($request->input('type') == "image_bulk_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['bulk_fabric_knit_down_image'] = $filePath;
                }
            }



            if ($request->input('type') == "image_development_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['development_photo_sample_dispatch_sample_image'] = $filePath;
                }
            }

            if ($request->input('type') == "image_fit_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['fit_sample_image'] = $filePath;
                }
            }
            if ($request->input('type') == "image_size_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['size_set_image'] = $filePath;
                }
            }
            if ($request->input('type') == "image_pp_sample_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['pp_sample_image'] = $filePath;
                }
            }
            if ($request->input('type') == "image_pp_meeting_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['pp_meeting_report_upload'] = $filePath;
                }
            }
            if ($request->input('type') == "image_sewing_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['sewing_inline_inspection_report_upload'] = $filePath;
                }
            }
            if ($request->input('type') == "image_finish_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['finishing_inline_inspection_report'] = $filePath;
                }
            }
            if ($request->input('type') == "image_pre_final_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['pre_final_aql_report_schedule'] = $filePath;
                }
            }
            if ($request->input('type') == "image_final_aql_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['final_aql_report_upload'] = $filePath;
                }
            }
            if ($request->input('type') == "image_production_info") {
                if ($request->hasFile('image')) {
                    // image process
                    $destinationPath = 'public/logos';
                    $mainName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $newFileName = $mainName . '_' . time() . '.' . $extension;
                    $fileStorePath = $request->file('image')->storeAs($destinationPath, $newFileName);
                    $filePath = 'storage/logos/' . $newFileName;

                    // update to database
                    $updateData['production_sample_upload'] = $filePath;
                }
            }






            //image upload end




            if ($request->input('type') == "colour_std_print_artwork_sent_to_supplier_actual_date") {
                $updateData['colour_std_print_artwork_sent_to_supplier_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "lab_dip_approval_actual_date") {
                $updateData['lab_dip_approval_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "lab_dip_dispatch_details") {
                $updateData['lab_dip_dispatch_details'] = $selectedDate;
            }
            if ($request->input('type') == "embellishment_s_o_approval_actual_date") {
                $updateData['embellishment_s_o_approval_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "embellishment_s_o_dispatch_details") {
                $updateData['embellishment_s_o_dispatch_details'] = $selectedDate;
            }
            if ($request->input('type') == "bulk_fabric_knit_down_dispatch_details") {
                $updateData['bulk_fabric_knit_down_dispatch_details'] = $selectedDate;
            }
            if ($request->input('type') == "development_photo_sample_dispatch_details") {
                $updateData['development_photo_sample_dispatch_details'] = $selectedDate;
            }
            if ($request->input('type') == "fit_dispatch") {
                $updateData['fit_dispatch'] = $selectedDate;
            }
            if ($request->input('type') == "size_set_dispatch") {
                $updateData['size_set_dispatch'] = $selectedDate;
            }
            if ($request->input('type') == "pp_dispatch") {
                $updateData['pp_dispatch'] = $selectedDate;
            }
            if ($request->input('type') == "fabric_ordered_actual_date") {
                $updateData['fabric_ordered_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "bulk_fabric_knit_down_approval_actual_date") {
                $updateData['bulk_fabric_knit_down_approval_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "bulk_yarn_fabric_actual_date") {
                $updateData['bulk_yarn_fabric_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "development_photo_sample_sent_actual_date") {
                $updateData['development_photo_sample_sent_actual_date'] = $selectedDate;
            }
            if ($request->input('type') == "fit_approval_actual") {
                $updateData['fit_approval_actual'] = $selectedDate;
            }
            if ($request->input('type') == "size_set_actual") {
                $updateData['size_set_actual'] = $selectedDate;
            }
            if ($request->input('type') == "pp_actual") {
                $updateData['pp_actual'] = $selectedDate;
            }

            if ($request->input('type') == "care_label_actual") {
                $updateData['care_label_actual'] = $selectedDate;
            }
            if ($request->input('type') == "material_inhouse_actual") {
                $updateData['material_inhouse_actual'] = $selectedDate;
            }
            if ($request->input('type') == "pp_meeting_actual") {
                $updateData['pp_meeting_actual'] = $selectedDate;
            }
            if ($request->input('type') == "cutting_date_actual") {
                $updateData['cutting_date_actual'] = $selectedDate;
            }
            if ($request->input('type') == "embellishment_actual") {
                $updateData['embellishment_actual'] = $selectedDate;
            }
            if ($request->input('type') == "Sewing_actual") {
                $updateData['Sewing_actual'] = $selectedDate;
            }
            if ($request->input('type') == "washing_complete_actual") {
                $updateData['washing_complete_actual'] = $selectedDate;
            }
            if ($request->input('type') == "finishing_complete_actual") {
                $updateData['finishing_complete_actual'] = $selectedDate;
            }
            if ($request->input('type') == "sewing_inline_inspection_date_actual") {
                $updateData['sewing_inline_inspection_date_actual'] = $selectedDate;
            }
            if ($request->input('type') == "finishing_inline_inspection_date_actual") {
                $updateData['finishing_inline_inspection_date_actual'] = $selectedDate;
            }
            if ($request->input('type') == "pre_final_date_actual") {
                $updateData['pre_final_date_actual'] = $selectedDate;
            }
            if ($request->input('type') == "final_aql_date_actual") {
                $updateData['final_aql_date_actual'] = $selectedDate;
            }
            if ($request->input('type') == "production_sample_approval_actual") {
                $updateData['production_sample_approval_actual'] = $selectedDate;
            }
            if ($request->input('type') == "shipment_booking_with_acs_actual") {
                $updateData['shipment_booking_with_acs_actual'] = $selectedDate;
            }
            if ($request->input('type') == "sa_approval_actual") {
                $updateData['sa_approval_actual'] = $selectedDate;
            }
            if ($request->input('type') == "vendor_comments_date") {
                $updateData['vendor_comments_date'] = $selectedDate;
            }
            if ($request->input('type') == "aeon_comments_date") {
                $updateData['aeon_comments_date'] = $selectedDate;
            }
            if ($request->input('type') == "reason_for_change_affect_shipment") {
                $updateData['reason_for_change_affect_shipment'] = $selectedDate;
            }
            if ($request->input('type') == "payment_receive_date") {
                $updateData['payment_receive_date'] = $selectedDate;
            }




            if ($request->input('type') == "care_lavel_date") {
                $updateData['care_lavel_date'] = $selectedDate;
            }
            if ($request->input('type') == "fabric_ref") {
                $updateData['fabric_ref'] = $selectedDate;
            }
            if ($request->input('type') == "fabric_weight") {
                $updateData['fabric_weight'] = $selectedDate;
            }
            if ($request->input('type') == "fabric_mill") {
                $updateData['fabric_mill'] = $selectedDate;
            }







            if ($request->input('type') == "revised_ex_factory_date") {
                $updateData['revised_ex_factory_date'] = $selectedDate;
                if (!empty($updateData['revised_ex_factory_date'])) {
                    $updateData['revised_eta_sa_date'] = $this->dateAddCalculate($updateData['revised_ex_factory_date'], 52);
                }
            }
            if ($request->input('type') == "actual_ex_factory_date") {
                $updateData['actual_ex_factory_date'] = $selectedDate;
            }
            if ($request->input('type') == "shipped_units") {
                $updateData['shipped_units'] = $selectedDate;
            }
            if ($request->input('type') == "shipped_units") {
                $updateData['shipped_units'] = $selectedDate;
            }
            if ($request->input('type') == "create_pp_meeting_schedule") {
                $updateData['create_pp_meeting_schedule'] = $selectedDate;
            }
            if ($request->input('type') == "create_inline_inspection_schdule") {
                $updateData['create_inline_inspection_schdule'] = $selectedDate;
            }
            if ($request->input('type') == "pre_final_aql_report_schedule") {
                $updateData['pre_final_aql_report_schedule'] = $selectedDate;
            }
            if ($request->input('type') == "create_aql_schedule") {
                $updateData['create_aql_schedule'] = $selectedDate;
            }
            if ($request->input('type') == "pre_final_aql_report_schedule") {
                $updateData['pre_final_aql_report_schedule'] = $selectedDate;
            }
            if ($request->input('type') == "final_aql_report_upload") {
                $updateData['final_aql_report_upload'] = $selectedDate;
            }
            if ($request->input('type') == "forward_ref") {
                $updateData['forward_ref'] = $selectedDate;
            }
            if ($request->input('type') == "late_delivery_discounts_crp") {
                $updateData['late_delivery_discounts_crp'] = $selectedDate;
            }
            if ($request->input('type') == "invoice_num") {
                $updateData['invoice_num'] = $selectedDate;
            }
            if ($request->input('type') == "invoice_create_date") {
                $updateData['invoice_create_date'] = $selectedDate;
            }
            if ($request->input('type') == "sa_eta_5_days") {
                $updateData['sa_eta_5_days'] = $selectedDate;
            }
            if ($request->input('type') == "production_sample_dispatch") {
                $updateData['production_sample_dispatch'] = $selectedDate;
            }
            if ($request->input('type') == "revised_ex_factory_date") {
                $updateData['revised_ex_factory_date'] = $selectedDate;
            }

            $criticalPath->update($updateData);
        }



        //dd($selectedDate,$id);
        // Perform some logic with $selectedDate

        // Return a response (e.g., JSON)
        return response()->json(['result' => 'success', 'id' => $id, 'message' => 'Date processed successfully']);
    }
    private function dateAddCalculate($calculateDateFrom, $differenceDay)
    {
        $date = date_create($calculateDateFrom);
        date_add($date, date_interval_create_from_date_string("$differenceDay days"));

        return date_format($date, "Y-m-d");
    }
}
