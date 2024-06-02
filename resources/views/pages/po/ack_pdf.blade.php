<table style="margin-left:auto; margin-right:auto; border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td colspan="12" style="width: 583.25pt;border: 1pt solid black;padding: 0in;vertical-align: top;">
                {{-- <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.5pt;'>
                    <span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p> --}}
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:212.85pt;margin-left:211.6pt;'>
                    <strong><span style="font-size:11px;">PURCHASE&nbsp;ORDER&nbsp;SUMMARY</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="7"
                style="width: 362.75pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.6pt;margin-right:0in;margin-left:1.25pt;'>
                    <strong><span style="font-size:11px;">{{ $purchaseOrder->supplier_name }}</span></strong>
                </p>
            </td>
            <td colspan="5"
                style="width: 160pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                {{-- <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.25pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p> --}}
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:1.6pt;margin-right:34.0pt;margin-left:34.55pt;'>
                    {{-- <strong><span style="font-size:8px;">CREATION LOYAL HONGKONG
                            LIMITED</span></strong> --}}
                    <strong><span style="font-size:8px;">&nbsp;</span></strong><strong><span style="font-size:8px;">6F
                            CNT COMMERCIAL BUILDING
                            302&nbsp;QUEEN&apos;S&nbsp;ROAD&nbsp;CENTRAL</span></strong>
                </p>
            </td>

        </tr>
        <tr>
            <td colspan="3"
                style="width: 583.25pt;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 42.1pt;vertical-align: top;">
                <img src="{{ public_path('logos/Ackermans_Logo.svg') }}" alt=""
                    style="width: 100px; padding: 5px;">
            </td>
            <td colspan="9"
                style="width: 583.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 42.1pt;vertical-align: top;">
                <div>

                    <div>
                        <p
                            style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.0pt;margin-right:212.85pt;margin-left:100pt;'>
                            <strong><span style="font-size:7px;">1 PRODUKSIE ST, KUILS RIVER INDUSTRIAL , CAPE TOWN
                                    7580&nbsp; PO BOX 78 , KUILS RIVER , CAPE TOWN , 7579,S.A&nbsp;ACKERMANS
                                    (PROPRIETARY LIMITED)</span></strong>
                        </p>

                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p style='margin:0in;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-left:1.4pt'>
                    <strong><span style="font-size:9px; color: green">Print Date:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;fornt-weight: 700'>
                    <strong><span
                            style="font-size:8px;color: green">{{ \Carbon\Carbon::parse($purchaseOrder->created_at)->format('d M, Y') }}</span></strong>
                </p>
            </td>
            <td colspan="6" rowspan="13"
                style="width: 236.85pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                <p style='text-align:center;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:13px;font-family:"Times New Roman",serif;'><img width="300"
                            src="{{ public_path($purchaseOrder->upload_picture_germent) }}" alt="image"
                            style="margin: 0 auto; display: block; "></span>
                </p>
            </td>
            <td colspan="3" rowspan="13"
                style="width: 149.1pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                <p style='margin:0in;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style="font-size:9px;">Style Notes</span></strong>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:  left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:1.55pt;margin-right:  0in;margin-left:1.2pt;'>
                    <strong><span style="font-size:7px;">{{ $purchaseOrder->style_note }}</span></strong>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:  left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:1.55pt;margin-right:  0in;margin-left:1.2pt;'>
                    <strong><span style="font-size:7px;">{{ $purchaseOrder->note }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:  left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:1.65pt;margin-right:  0in;margin-left:1.4pt;line-height:7.85pt;'>
                    <strong><span style="font-size:9px;">PO&nbsp;Number&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:1.65pt;margin-right:53.3pt;margin-left:53.75pt;line-height:7.85pt;'>
                    <strong><span style="font-size:9px;">{{ $purchaseOrder->po_no }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Department&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:  center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.25pt;margin-right:  0in;line-height:7.25pt;'>
                    <strong><span
                            style="font-size:9px;">{{ $purchaseOrder->department()->first()->name }}</span></strong>
                </p>
            </td>
        </tr>

        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Description&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align: center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.25pt;margin-right:  0in; line-height:7.25pt;'>
                    <strong><span style="font-size:9px;">{{ $purchaseOrder->description }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">

                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:  left;font-size:15px;font-family:"Calibri",sans-serif;margin-right:  0in;margin-left:1.4pt;margin-top:4.0pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Fabric&nbsp;Quality:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif; word-wrap: break-word;'>
                    <strong><span style="font-size:9px;">{{ $purchaseOrder->fabric_quality }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">

                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.0pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Fabric&nbsp;Content&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">

                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-right:  0in;word-wrap: break-word;'>
                    <strong><span style="font-size:9px; ">{{ $purchaseOrder->fabric_content }}</span></strong>
                </p>
            </td>
        </tr>
        {{-- <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 9.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 9.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:8px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
        </tr> --}}
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Supplier&nbsp;Number&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;line-height:6.7pt;margin-top:4.0pt;'>
                    <strong><span style="font-size:8px;">{{ $purchaseOrder->supplier_no }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Supplier&nbsp;Name&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;line-height:6.7pt;margin-top:4.0pt;'>
                    <strong><span style="font-size:8px;">{{ $purchaseOrder->supplier_name }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Currency&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;line-height:6.7pt;margin-top:4.0pt;'>
                    <strong><span style="font-size:8px;">{{ $purchaseOrder->currency }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Payment&nbsp;Terms&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;line-height:6.7pt;margin-top:4.0pt;'>
                    <strong><span style="font-size:8px;">{{ $purchaseOrder->payment_terms }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Ship&nbsp;Method&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;line-height:6.7pt;margin-top:4.0pt;'>
                    <strong><span style="font-size:8px;">{{ $purchaseOrder->ship_mode }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.7pt;'>
                    <strong><span style="font-size:8px;">Ex&nbsp;Factory&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.5pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;line-height:7.25pt;margin-top:4.0pt;'>
                    <strong><span
                            style="font-size:9px;">{{ \Carbon\Carbon::parse($purchaseOrder->ex_factory_date)->format('d M, Y') }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 10.35pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.8pt;margin-right:0in;margin-left:1.4pt;line-height:6.55pt;'>
                    <strong><span style="font-size:8px;">Care&nbsp;Label&nbsp;Date&nbsp;:</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 139.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 10.35pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.25pt;line-height:7.1pt;'>
                    <strong><span
                            style="font-size:9px;">{{ \Carbon\Carbon::parse($purchaseOrder->care_level_date)->format('d M, Y') }}</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:21.45pt;margin-left:22.4pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">Brand</span></strong>
                </p>
            </td>
            <td
                style="width: 68.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:22.4pt;margin-left:21.25pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">Style Number</span></strong>
                </p>
            </td>
            <td
                style="width: 70.9pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:  left;font-size:15px;font-family:"Calibri",sans-serif;margin-left:26.35pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">Colour</span></strong>
                </p>
            </td>
            <td
                style="width: 61.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:19.2pt;margin-left:18.15pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">SKU</span></strong>
                </p>
            </td>
            <td
                style="width: 35.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:9.15pt;margin-left:9.2pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">Size</span></strong>
                </p>
            </td>
            <td
                style="width: 35.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:1.0pt;margin-right:0in;margin-left:11.4pt;'>
                    <strong><span style="font-size:8px;">Qty Ordered</span></strong>
                </p>
            </td>
            <td
                style="width: 33.1pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top; background-color:yellow">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:2.25pt;margin-left:2.25pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">Units Per Carton</span></strong>
                </p>
            </td>

            <td
                style="width: 34.75pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top; background-color:yellowgreen">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.55pt;margin-right:2.2pt;margin-left:11.75pt;text-indent:-9.75pt;line-height:7.5pt;'>
                    <strong><span style="font-size:8px;">Number Of Cartons</span></strong>
                </p>
            </td>

            <td
                style="width: 36.65pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.55pt;margin-right:6.8pt;margin-left:10.75pt;text-indent:-4.3pt;line-height:7.5pt;'>
                    <strong><span style="font-size:8px;">FACTORY Price</span></strong>
                </p>
            </td>

            <td
                style="width: 57.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.1pt;'>
                    <span style='font-size:10px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0in;margin-right:20.05pt;margin-left:19.25pt;line-height:6.8pt;'>
                    <strong><span style="font-size:8px;">USD AMOUNT</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 92.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 16.55pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.55pt;margin-right:37.65pt;margin-left:36.3pt;line-height:7.5pt;'>
                    <strong><span style="font-size:8px;">RSP</span></strong>
                </p>
            </td>
        </tr>
        @foreach ($tableDatas as $tableData)
            <tr>
                <td
                    style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:18.7pt;margin-left:19.7pt;line-height:7.4pt;'>
                        <strong><span style="font-size:9px;">{{ $tableData->plm }}</span></strong>
                    </p>
                </td>
                <td
                    style="width: 68.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:16.85pt;margin-left:17.6pt;line-height:7.4pt;'>
                        <strong><span style="font-size:9px;">{{ $tableData->style_no }}</span></strong>
                    </p>
                </td>
                <td
                    style="width: 70.9pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:0in;margin-left:24.95pt;line-height:7.4pt;'>
                        <strong><span style="font-size:9px;">{{ $tableData->colour }}</span></strong>
                    </p>
                </td>
                <td
                    style="width: 61.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:6.5pt;margin-left:7.1pt;line-height:7.4pt;'>
                        <span style="font-size:9px;">{{ $tableData->item_no }}</span>
                    </p>
                </td>
                <td
                    style="width: 35.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:5.05pt;margin-right:0in;margin-left:.35pt;line-height:6.8pt;'>
                        <span style="font-size:8px;">{{ $tableData->size }}</span>
                    </p>
                </td>
                <td
                    style="width: 35.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:11.0pt;margin-left:11.65pt;line-height:7.4pt;'>
                        <span style="font-size:9px;">{{ $tableData->qty_ordered }}</span>
                    </p>
                </td>
                <td
                    style="width: 33.1pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:5.05pt;margin-right:0in;margin-left:.35pt;line-height:6.8pt;'>
                        <span style="font-size:8px;">{{ $tableData->inner_qty }}</span>
                    </p>
                </td>
                <td
                    style="width: 34.75pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:12.35pt;margin-left:12.95pt;line-height:7.4pt;'>
                        <span style="font-size:9px;">{{ $tableData->outer_case_qty }}</span>
                    </p>
                </td>
                <td
                    style="width: 36.65pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:9.1pt;margin-left:9.45pt;line-height:7.4pt;'>
                        <span style="font-size:9px;">${{ $tableData->supplier_price }}</span>
                    </p>
                </td>
                <td
                    style="width: 57.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:  right;font-size:15px;font-family:"Calibri",sans-serif;margin-top:5.05pt;margin-right:  15.2pt;margin-left:0in;line-height:6.8pt;'>
                        <span style="font-size:8px;">${{ $tableData->value }}</span>
                    </p>
                </td>
                <td colspan="2"
                    style="width: 92.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 12.85pt;vertical-align: top;">
                    <p
                        style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:4.5pt;margin-right:34.9pt;margin-left:35.55pt;line-height:7.4pt;'>
                        <span style="font-size:9px;">R{{ $tableData->selling_price }}</span>
                    </p>
                </td>
            </tr>
        @endforeach

        <tr>
            <td
                style="width: 58.25pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 68.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 70.9pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 61.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 35.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 35.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:center;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.9pt;margin-right:9.2pt;margin-left:9.2pt;line-height:5.85pt;'>
                    <strong><span style="font-size:8px;">{{ $tableDatas->sum('qty_ordered') }}</span></strong>
                </p>
            </td>
            <td
                style="width: 33.1pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 34.75pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 36.65pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
            <td
                style="width: 57.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:right;font-size:15px;font-family:"Calibri",sans-serif;margin-top:.9pt;margin-right:13.55pt;margin-left:0in;line-height:5.85pt;'>
                    <strong><span style="font-size:8px;">${{ $tableDatas->sum('value') }}</span></strong>
                </p>
            </td>
            <td colspan="2"
                style="width: 92.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;height: 7.75pt;vertical-align: top;">
                <p
                    style='margin:0in;margin-bottom:.0001pt;text-align:left;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-size:7px;font-family:"Times New Roman",serif;'>&nbsp;</span>
                </p>
            </td>
        </tr>
        <tr>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
        </tr>
    </tbody>
</table>
