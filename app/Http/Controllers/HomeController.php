<?php

namespace App\Http\Controllers;

use App\Models\ComplaintRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        try {
            $getdata = ComplaintRegistration::orderBy('created_at', 'desc')->get();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.adminHome', ['getdata' => $getdata]);
    }

    public function complaintRegistrationUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'status'      => 'required',
            ]);
            $company = ComplaintRegistration::find($id);
            $company->status = $request->status;
            $company->save();
            return redirect()->back()->with("success", "Product Complaint Updated...!");
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function index()
    {
        try {
            $getdata = \App\Models\ComplaintRegistration::latest()->first();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('coustomer.coustomerHome', ['getdata' => $getdata]);
    }

    public function complaintRegistration()
    {
        try {
            $getdata = \App\Models\ComplaintRegistration::latest()->first();

            if (isset($getdata) && $getdata) {
                $incid = $getdata->id + 1;
                $num_padded = sprintf("%03d", $incid);
                $ticketID = "Complaint ID-" . $num_padded;
            } else {
                $incid = 1;
                $num_padded = sprintf("%03d", $incid);
                $ticketID = "Complaint ID-" . $num_padded;
                // dd($ticketID);
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('coustomer.complaintRegistration', ['ticketID' => $ticketID]);
    }

    public function complaintRegistrationSave(Request $request)
    {
        // dd($request->all());
        try {
            // $picture = "";
            // $imageNameArr = [];
            $this->validate($request, [
                'name'                 => 'required',
                'status'               => 'required',
                'email'                => 'required',
                'phone'                => 'required',
                'productSerialNo'      => 'required',
                'productPartNo'        => 'required',
                'purchaseDate'         => 'required',
                'warrantyCheck'        => 'required',
                'chanalPurchase'       => 'required',
                'city'                 => 'required',
                'state'                => 'required',
                'pinCode'              => 'required',
                'issue'                => 'required',
                'purchaseInvoice'      => 'required|mimes:pdf,png,jpg,jpeg|max:2048',
            ]);

            // if ($request->hasFile('purchaseInvoice')) {
            //     $picture = array();
            //     $imageNameArr = [];
            //     foreach ($request->purchaseInvoice as $file) {
            //         // you can also use the original name
            //         $image = $file->getClientOriginalName();
            //         $imageNameArr[] = $image;
            //         // Upload file to public path in images directory
            //         $fileName = $file->move(date('d-m-Y') . '-Complaint-Registration', $image);
            //         // Database operation
            //         $array[] = $fileName;
            //         $picture = implode(", ", $array); //Image separated by comma
            //     }
            // }

            $fileName = time() . '.' . $request->purchaseInvoice->extension();

            $request->purchaseInvoice->move(public_path('Complaint-Registration'), $fileName);

            $complRegis = new ComplaintRegistration();
            $complRegis->name              = $request->name;
            $complRegis->email             = $request->email;
            $complRegis->phone             = $request->phone;
            $complRegis->status            = $request->status;
            $complRegis->productSerialNo   = $request->productSerialNo;
            $complRegis->productPartNo     = $request->productPartNo;
            $complRegis->purchaseDate      = $request->purchaseDate;
            $complRegis->warrantyCheck     = $request->warrantyCheck;
            $complRegis->chanalPurchase    = $request->chanalPurchase;
            $complRegis->city              = $request->city;
            $complRegis->state             = $request->state;
            $complRegis->pinCode           = $request->pinCode;
            $complRegis->issue             = $request->issue;
            $complRegis->purchaseInvoice   = $fileName;
            $complRegis->ticketID          = $request->ticketID;

            $result = $complRegis->save();

            if ($result) {
                // return redirect()->back()->with("success", "Product Complaint Registered...!");
                return redirect()->route('customerHome')->with("success", "Product Complaint Registered...!");
            }
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with("error", "Something is wrong...!");
        }
    }
}
