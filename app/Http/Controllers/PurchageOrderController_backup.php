<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\CriticalDetails;
use App\Models\CriticalPath;
use App\Models\OrderItem;
use App\Models\PurchageOrder;
use App\Models\Vendor;
use DateTime;
use Illuminate\Http\Request;
use PDF;

class PurchageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pos = PurchageOrder::all();
        return view('pages.poManagement', compact('pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyers = Buyer::all();
        $vendors = Vendor::all();
        return view('pages.po.create', compact('buyers', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create the Purchase Order record

        $purchaseOrder = new PurchageOrder();
        $purchaseOrder->buyer_id = $request->input('select_buyer');
        $purchaseOrder->department_id = $request->input('department');
        // $purchaseOrder->po_department = $request->input('po_department');
        $purchaseOrder->vendor_id = $request->input('select_vendor');
        $purchaseOrder->buyer_price = $request->input('buyer_price');
        $purchaseOrder->vendor_price = $request->input('vendor_price');
        $purchaseOrder->earliest_buyer_date = $request->input('early-buyer-date');
        $purchaseOrder->ex_factory_date = $request->input('ex_factory_date');
        $purchaseOrder->approved_date = $request->input('approval_date');
        $purchaseOrder->po_no = $request->input('ww_po_no');
        $purchaseOrder->plm = $request->input('plm');
        $purchaseOrder->description = $request->input('description');
        $purchaseOrder->fabric_quality = $request->input('fabric_quality');
        $purchaseOrder->fabric_content = $request->input('fabric_content');
        $purchaseOrder->fabric_type = $request->input('fabric_type');
        $purchaseOrder->supplier_no = $request->input('supplier_no');
        $purchaseOrder->supplier_name = $request->input('supplier_name');
        $purchaseOrder->currency = $request->input('currency');
        $purchaseOrder->payment_terms = $request->input('payment_terms');
        $purchaseOrder->ship_mode = $request->input('ship_mode');
        $purchaseOrder->care_lavel_date = $request->input('care_label_date');
        // $purchaseOrder->stlye_no = $request->input('style_no');
        // $purchaseOrder->size = $request->input('size');
        // $purchaseOrder->qty_ordered = $request->input('qty_ordered');
        // $purchaseOrder->inner_qty = $request->input('inner_qty');
        // $purchaseOrder->outer_case_qty = $request->input('outer_cas_qty');
        // $purchaseOrder->value = $request->input('value');
        $purchaseOrder->style_note = $request->input('style_note');
        $purchaseOrder->access_price = $request->input('access_price');
        // $purchaseOrder->selling_price = $request->input('selling_price');
        $purchaseOrder->note = $request->input('note');
        // $purchaseOrder->item_no = $request->input('item_no');
        // $purchaseOrder->colour = $request->input('colour');

        // Save uploaded pictures (if available)
        if ($request->hasFile('upload_picture_germent')) {
            $destinationPath = 'public/garments';

            $mainName = pathinfo($request->file('upload_picture_germent')->getClientOriginalName(), PATHINFO_FILENAME);

            // Get the file extension from the uploaded logo
            $extension = $request->file('upload_picture_germent')->getClientOriginalExtension();

            // Generate a unique file name with the main name, current timestamp, and extension
            $newFileName = $mainName . '_' . time() . '.' . $extension;

            // Move the logo file to the specified destination path
            $logoPath = $request->file('upload_picture_germent')->storeAs($destinationPath, $newFileName);

            // Set the logo path to the Buyer model attribute
            $purchaseOrder->upload_picture_germent = 'storage/garments/' . $newFileName;
        }



        if ($request->hasFile('upload_artwork')) {
            $destinationPath = 'public/artworks';

            $mainName = pathinfo($request->file('upload_artwork')->getClientOriginalName(), PATHINFO_FILENAME);

            // Get the file extension from the uploaded logo
            $extension = $request->file('upload_artwork')->getClientOriginalExtension();

            // Generate a unique file name with the main name, current timestamp, and extension
            $newFileName = $mainName . '_' . time() . '.' . $extension;

            // Move the logo file to the specified destination path
            $logoPath = $request->file('upload_artwork')->storeAs($destinationPath, $newFileName);

            // Set the logo path to the Buyer model attribute
            $purchaseOrder->upload_artwork = 'storage/artworks/' . $newFileName;
        }



        $purchaseOrder->save();

        // Create the Purchase Order items
        if ($request->has('items')) {
            foreach ($request->input('items') as $itemData) {
                $orderItem = new OrderItem();
                $orderItem->po_id = $purchaseOrder->id;
                $orderItem->plm = $itemData['plm'];
                $orderItem->style_no = $itemData['style_no'];
                $orderItem->colour = $itemData['colour'];
                $orderItem->item_no = $itemData['item_no'];
                $orderItem->size = $itemData['size'];
                $orderItem->qty_ordered = $itemData['qty_ordered'];
                $orderItem->inner_qty = $itemData['inner_qty'];
                $orderItem->outer_case_qty = $itemData['outer_case_qty'];
                $orderItem->supplier_price = $itemData['supplier_price'];
                $orderItem->value = $itemData['value'];
                $orderItem->selling_price = $itemData['selling_price'];

                $orderItem->save();
            }
        }



        $poFind = PurchageOrder::find($purchaseOrder->id);
        if ($poFind) {
            $crtical = new CriticalPath();
            $crtical->po_id = $purchaseOrder->id;
            $crtical->ex_factory_date_po = $purchaseOrder->ex_factory_date;
            // for buyer
            $crtical->ex_factory_date_po_buyer = $purchaseOrder->earliest_buyer_date;
            if (!empty($purchaseOrder->ex_factory_date)) {
                $crtical->final_aql_date_plan = $this->dateCalculate($purchaseOrder->ex_factory_date, 7);
            } else {
                $crtical->final_aql_date_plan = "";
            }
            // for buyer
            if (!empty($purchaseOrder->earliest_buyer_date)) {
                $crtical->final_aql_date_plan_buyer = $this->dateCalculate($purchaseOrder->earliest_buyer_date, 7);
            } else {
                $crtical->final_aql_date_plan_buyer = "";
            }
            if (!empty($crtical->final_aql_date_plan)) {
                $crtical->finishing_complete_plan = $this->dateCalculate($crtical->final_aql_date_plan, 2);
            } else {
                $crtical->finishing_complete_plan = "";
            }
            //for buyer
            if (!empty($crtical->final_aql_date_plan_buyer)) {
                $crtical->finishing_complete_plan_buyer = $this->dateCalculate($crtical->final_aql_date_plan_buyer, 2);
            } else {
                $crtical->finishing_complete_plan_buyer = "";
            }
            if (!empty($crtical->finishing_complete_plan)) {
                $crtical->washing_complete_plan = $this->dateCalculate($crtical->finishing_complete_plan, 5);
            } else {
                $crtical->washing_complete_plan = "";
            }
            if (!empty($crtical->washing_complete_plan)) {
                $crtical->Sewing_plan = $this->dateCalculate($crtical->washing_complete_plan, 15);
            } else {
                $crtical->Sewing_plan = "";
            }
            if (!empty($crtical->Sewing_plan)) {
                $crtical->embellishment_plan = $this->dateCalculate($crtical->Sewing_plan, 15);
            } else {
                $crtical->embellishment_plan = "";
            }
            if (!empty($crtical->embellishment_plan)) {
                $crtical->cutting_date_plan = $this->dateCalculate($crtical->embellishment_plan, 2);
            } else {
                $crtical->cutting_date_plan = "";
            }
            if (!empty($crtical->cutting_date_plan)) {
                $crtical->bulk_yarn_fabric_plan_date = $this->dateCalculate($crtical->cutting_date_plan, 7);
            } else {
                $crtical->bulk_yarn_fabric_plan_date = "";
            }
            if ($poFind->fabric_type == 3) {
                if (!empty($crtical->bulk_yarn_fabric_plan_date)) {
                    $crtical->fabric_ordered_plan_date = $this->dateCalculate($crtical->bulk_yarn_fabric_plan_date, 65);
                }
            }
            if ($poFind->fabric_type == 2) {
                if (!empty($crtical->bulk_yarn_fabric_plan_date)) {
                    $crtical->fabric_ordered_plan_date = $this->dateCalculate($crtical->bulk_yarn_fabric_plan_date, 40);
                }
            }
            if ($poFind->fabric_type == 2) {
                if (!empty($crtical->bulk_yarn_fabric_plan_date)) {
                    $crtical->fabric_ordered_plan_date = $this->dateCalculate($crtical->bulk_yarn_fabric_plan_date, 30);
                }
            }
            $crtical->fabric_type = $poFind->fabric_type;

            if (!empty($crtical->fabric_ordered_plan_date)) {
                $crtical->official_po_sent_plan_date = $this->dateCalculate($crtical->fabric_ordered_plan_date, 15);
            } else {
                $crtical->official_po_sent_plan_date = "";
            }
            if (!empty($crtical->cutting_date_plan)) {
                $crtical->pp_meeting_plan = $this->dateCalculate($crtical->cutting_date_plan, 3);
            } else {
                $crtical->pp_meeting_plan = "";
            }
            if (!empty($crtical->pp_meeting_plan)) {
                $crtical->pp_approval = $this->dateCalculate($crtical->pp_meeting_plan, 10);
            } else {
                $crtical->pp_approval = "";
            }
            if (!empty($crtical->pp_approval)) {
                $crtical->embellishment_s_o_approval_plan_date = $this->dateCalculate($crtical->pp_approval, 14);
            } else {
                $crtical->embellishment_s_o_approval_plan_date = "";
            }
            if (!empty($crtical->embellishment_s_o_approval_plan_date)) {
                $crtical->colour_std_print_artwork_sent_to_supplier_plan_date = $this->dateCalculate($crtical->embellishment_s_o_approval_plan_date, 7);
            } else {
                $crtical->colour_std_print_artwork_sent_to_supplier_plan_date = "";
            }
            if (!empty($crtical->embellishment_s_o_approval_plan_date)) {
                $crtical->lab_dip_approval_plan_date = $this->dateCalculate($crtical->embellishment_s_o_approval_plan_date, 7);
            } else {
                $crtical->lab_dip_approval_plan_date = "";
            }
            if ($crtical->size_set_actual == "NA") {
                $crtical->size_set_approval = "NA";
            } else {
                if (!empty($crtical->pp_approval)) {
                    $crtical->size_set_approval = $this->dateCalculate($crtical->pp_approval, 14);
                }
            }
            if ($crtical->fit_approval_actual == "NA") {
                $crtical->fit_approval_plan = $crtical->size_set_approval;
            } else {
                if (!empty($crtical->size_set_approval)) {
                    $crtical->fit_approval_plan = $this->dateCalculate($crtical->size_set_approval, 14);
                }
            }
            if (!empty($crtical->fit_approval_plan)) {
                $crtical->development_photo_sample_sent_plan_date = $this->dateCalculate($crtical->fit_approval_plan, 10);
            } else {
                $crtical->development_photo_sample_sent_plan_date = "";
            }
            if (!empty($crtical->pp_meeting_plan)) {
                $crtical->care_label_approval = $this->dateCalculate($crtical->pp_meeting_plan, 10);
            } else {
                $crtical->care_label_approval = "";
            }
            if (!empty($crtical->pp_meeting_plan)) {
                $crtical->material_inhouse_plan = $this->dateCalculate($crtical->pp_meeting_plan, 2);
            } else {
                $crtical->material_inhouse_plan = "";
            }
            if (!empty($crtical->final_aql_date_plan)) {
                $crtical->finishing_inline_inspection_date_plan = $this->dateCalculate($crtical->final_aql_date_plan, 3);
            } else {
                $crtical->finishing_inline_inspection_date_plan = "";
            }

            if (!empty($crtical->finishing_inline_inspection_date_plan)) {
                $crtical->sewing_inline_inspection_date_plan = $this->dateCalculate($crtical->finishing_inline_inspection_date_plan, 4);
            } else {
                $crtical->sewing_inline_inspection_date_plan = "";
            }

            if (!empty($crtical->final_aql_date_plan)) {
                $crtical->pre_final_date_plan = $this->dateCalculate($crtical->final_aql_date_plan, 3);
            } else {
                $crtical->pre_final_date_plan = "";
            }

            if (!empty($crtical->ex_factory_date_po)) {
                $crtical->sa_approval_plan = $this->dateCalculate($crtical->ex_factory_date_po, 5);
            } else {
                $crtical->sa_approval_plan = "";
            }
            if (!empty($crtical->sa_approval_plan)) {
                $crtical->production_sample_approval_plan = $this->dateCalculate($crtical->sa_approval_plan, 4);
            } else {
                $crtical->production_sample_approval_plan = "";
            }

            if (!empty($crtical->ex_factory_date_po)) {
                $crtical->shipment_booking_with_acs_plan = $this->dateCalculate($crtical->ex_factory_date_po, 21);
            } else {
                $crtical->shipment_booking_with_acs_plan = "";
            }
            $crtical->official_po_sent_actual_date = date('Y-m-d');
            if (!empty($crtical->ex_factory_date_po)) {
                $ex_factory_date_po = new DateTime($crtical->ex_factory_date_po);
                $official_po_sent_actual_date = new DateTime($crtical->official_po_sent_actual_date);

                $crtical->lead_times = $ex_factory_date_po->diff($official_po_sent_actual_date)->days;
            } else {
                $crtical->lead_times = "";
            }
            if ($crtical->fabric_type = 4) {
                if ($crtical->lead_times >= 75) {
                    $crtical->treated_as_priority_order = "Regular Lead Time";
                } else {
                    $crtical->treated_as_priority_order = "Short Lead Time";
                }
            }
            if ($crtical->fabric_type = 2) {
                if ($crtical->lead_times >= 90) {
                    $crtical->treated_as_priority_order = "Regular Lead Time";
                } else {
                    $crtical->treated_as_priority_order = "Short Lead Time";
                }
            }
            if ($crtical->fabric_type = 3) {
                if ($crtical->lead_times >= 120) {
                    $crtical->treated_as_priority_order = "Regular Lead Time";
                } else {
                    $crtical->treated_as_priority_order = "Short Lead Time";
                }
            }

            if (!empty($crtical->ex_factory_date_po)) {

                $crtical->orginal_eta_sa_date = $this->dateAddCalculate($crtical->ex_factory_date_po, 52);
            } else {
                $crtical->orginal_eta_sa_date = "";
            }

            $crtical->save();
        }
        if ($request->input('download_pdf') == 'yes') {
            if ($request->input('select_buyer') == 1) {
                $tableDatas = OrderItem::where('po_id', $purchaseOrder->id)->get();
                $pdf = PDF::loadView('pages.po.pdf', ['purchaseOrder' => $purchaseOrder, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

                return $pdf->stream(time() . 'po.pdf');
            }

            if ($request->input('select_buyer') == 2) {
                $tableDatas = OrderItem::where('po_id', $purchaseOrder->id)->get();
                $pdf = PDF::loadView('pages.po.mrp_pdf', ['purchaseOrder' => $purchaseOrder, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

                return $pdf->stream(time() . 'po.pdf');
            }

            if ($request->input('select_buyer') == 3) {
                $tableDatas = OrderItem::where('po_id', $purchaseOrder->id)->get();
                $pdf = PDF::loadView('pages.po.ack_pdf', ['purchaseOrder' => $purchaseOrder, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

                return $pdf->stream(time() . 'po.pdf');
            }

            // $tableDatas = OrderItem::where('po_id', $purchaseOrder->id)->get();
            // $pdf = PDF::loadView('pages.po.pdf', ['purchaseOrder' => $purchaseOrder, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

            // return $pdf->stream(time() . 'po.pdf');
        }

        // Redirect to a success page or do anything else you need after successful submission
        return redirect()->back();
    }

    public function pdfView()
    {
        $pdf = PDF::loadView('pages.po.pdf')->setPaper('b4', 'landscape');

        return $pdf->stream(time() . 'po.pdf');
    }

    public function pdfViewSingle($id)
    {
        $po = PurchageOrder::where('id', $id)->first();
        if ($po->buyer_id == '1') {
            // $po = PurchageOrder::where('id', $id)->first();
            $tableDatas = OrderItem::where('po_id', $po->id)->get();
            $pdf = PDF::loadView('pages.po.pdf', ['purchaseOrder' => $po, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

            return $pdf->stream(time() . 'po.pdf');
        }

        if ($po->buyer_id == '2') {
            // $po = PurchageOrder::where('id', $id)->first();
            $tableDatas = OrderItem::where('po_id', $po->id)->get();
            $pdf = PDF::loadView('pages.po.mrp_pdf', ['purchaseOrder' => $po, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

            return $pdf->stream(time() . 'po.pdf');
        }

        if ($po->buyer_id == '3') {
            // $po = PurchageOrder::where('id', $id)->first();
            $tableDatas = OrderItem::where('po_id', $po->id)->get();
            $pdf = PDF::loadView('pages.po.ack_pdf', ['purchaseOrder' => $po, 'tableDatas' => $tableDatas])->setPaper('b4', 'landscape');

            return $pdf->stream(time() . 'po.pdf');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $po = PurchageOrder::where('id', $id)->first();

        $po->delete();

        return redirect()->back();
    }

    private function dateCalculate($calculateDateFrom, $differenceDay)
    {
        $date = date_create($calculateDateFrom);
        date_sub($date, date_interval_create_from_date_string("$differenceDay days"));

        return date_format($date, "Y-m-d");
    }

    private function dateAddCalculate($calculateDateFrom, $differenceDay)
    {
        $date = date_create($calculateDateFrom);
        date_add($date, date_interval_create_from_date_string("$differenceDay days"));

        return date_format($date, "Y-m-d");
    }
}
