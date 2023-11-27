<?php

namespace App\Http\Controllers\UserControllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Phone;
use App\Models\Returns;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhoneController extends Controller
{

    public function addPhone($id = null)
    {

        $brands = Brands::all();
        $phone = null;
        if (!empty($id)) {
            $phone = Phone::find($id);
        }
        return view('UserViews.Product.addproduct', compact('phone', 'brands'));

    }

    public function phoneList()
    {
        $phones = Auth::user()->phones()->latest()->get();

        return view('UserViews.Product.manage-products', compact('phones'));
    }

    public function deletePhone($id)
    {
        $phone = Phone::findOrFail($id);
        if ($phone->status != "Sold") {

            $phone->delete();
            return redirect()->route('phones.list')->with('success', 'Phone has been successfully deleted.');
        }

        return redirect()->route('phones.list')->with('error', 'You can not delete this phone.');
    }

    public function phoneDetails($id)
    {

        $phone = Phone::find($id);
        if(empty($phone)){

            return redirect()->back()->with('error',"The Phone You are Trying To Access is Not Available.");
        }
        $selectedPhonePrice = $phone->price;

        $relatedPhones = Phone::where('id', '!=', $id)
            ->orderByRaw('ABS(CAST(price AS SIGNED)- ?)', [$selectedPhonePrice])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('UserViews.Product.product-details', compact('phone', 'relatedPhones'));
    }

    public function createPhone(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric',
            'pta_approved' => 'required',
            'sim_status' => 'required',
            'imei' => 'required',
            'color' => 'required',
            'ram' => 'required',
            'storage_capacity' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'purchase_proof' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'encoded_images' => 'sometimes|array',

        ]);

        $validatedData = $request->all();
        $validatedData['user_id'] = Auth::id();

        if (!empty($validatedData['accessories'])) {

            $validatedData['accessories'] = json_encode($validatedData['accessories']);
        }

        // Handle the main_image file upload
        $mainImage = $request->file('main_image');
        $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
        $mainImagePath = $mainImage->storeAs('thumbnails', $mainImageName, 'public');
        $validatedData['main_image'] = "/storage" . "/" . $mainImagePath;

        // Handle the purchase_proof file upload, if present
        if ($request->hasFile('purchase_proof')) {
            $purchaseProof = $request->file('purchase_proof');
            $purchaseProofName = time() . '_' . $purchaseProof->getClientOriginalName();
            $purchaseProofPath = $purchaseProof->storeAs('purchase_proofs', $purchaseProofName, 'public');
            $validatedData['purchase_proof'] = "/storage" . "/" . $purchaseProofPath;
        } else {
            $validatedData['purchase_proof'] = null;
        }

        if ($request->has('encoded_image')) {
            $additionalImages = $request->input('encoded_image');

            $additionalImagePaths = [];

            foreach ($additionalImages as $index => $encodedImage) {
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $encodedImage));
                $imageName = time() . '_' . $index . '.png';
                $imagePath = 'additional_images/' . $imageName;

                Storage::disk('public')->put($imagePath, $imageData);
                $additionalImagePaths[] = "/storage" . "/" . $imagePath;
            }

            $validatedData['additional_images'] = json_encode($additionalImagePaths);
        } else {
            $validatedData['additional_images'] = null;
        }

        $phone = Phone::create($validatedData);

        // Redirect to a desired page, for example, the phone's details page
        return redirect()->route('phones.list', $phone->id)->with('success', 'Phone has been successfully added.');
    }

    public function inspectionReport(Request $request)
    {

        $p_id = $request->id;
        if (!empty($p_id)) {

            $phone = Phone::find($p_id);
            $inspection = $phone->inspection;
            if (!$inspection) {
                return redirect()->back()->with('error_msg', "The phone you are attempting to access is not inspected yet.");
            }

            if (empty($phone)) {
                return redirect()->route('phone.inspection')->with('error_msg', "The phone you are attempting to access is not available.");

            }

            if ($phone->status == "Sold") {

                $purchaser = User::find($phone->purchasedPhones[0]->user_id);
                $transaction = Transaction::where('phone_id', $p_id)->where('user_id', $purchaser->id)

                    ->first();
                return view('UserViews.Product.inspection_report', compact(['phone', 'purchaser', 'transaction', 'inspection']));
            }
            return redirect()->route('phone.inspection')->with('error_msg', "The phone you are attempting to access is not available for inspection as it has not been sold yet.");

        }

        return view('UserViews.Product.inspection_report');
    }

    public function returnProduct(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'phone_id' => 'required',
            'reason' => 'required',
            'message' => 'required',
            'return_file' => 'nullable|file',
        ]);

        $phone = Phone::find($validatedData['phone_id']);
        if (count($phone->purchasedPhones) > 0) {

            if ($phone->purchasedPhones[0]->status == "Delivered") {

                return redirect()->back()->with('error_msg', "The phone you are trying to return is already delivered.");
            }
        }

        $req = Returns::where('phone_id', $validatedData['phone_id'])->latest()->first();
        if ($req) {
            if ($req->status == "Pending") {

                return redirect()->back()->with('error_msg', "There is already a pending application against this phone");
            }
        }
        $return = new Returns();
        // Handle file upload
        if ($request->hasFile('return_file')) {
            $file = $request->file('return_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('return_files'), $fileName);
            // Save the file name in the database
            $return->return_file = '/' . 'return_files/' . $fileName;
        }

        $return->phone_id = $validatedData['phone_id'];
        $return->reason = $validatedData['reason'];
        $return->message = $validatedData['message'];
        $return->user_id = Auth::user()->id;
        $return->status = "Pending";
        $return->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Return application submitted successfully');
    }

}
