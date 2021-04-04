<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PharmacyController extends Controller
{
    public function getPharmacy() {
        $slug = request()->segment(count(request()->segments()));
        $ph = Pharmacy::where('slug',$slug)->first();
        $ph['images'] = json_decode( $ph['images'], true);
        foreach($ph['images'] as $p) {
            $p = str_replace("\/", "/", $p);
        }

        return \View::make("single-pharmacy")->with("data", $ph);
    }

    public function getPharmaciesAPI(Request $request) {
        $lang = request()->header('lang');
        if(!$lang) {
            $lang = 'en';
        }

        $data = Pharmacy::get()->toArray();
        if($data) {
            $final = [];
            foreach($data as $p) {
                $final[] = [
                  'id'=> $p['id'],
                  'name'=> $lang == 'en' ? $p['name'] : $p['name_ar'],
                  'address'=> $lang == 'en' ? $p['address'] : $p['address_ar'],
                  'address_latitude'=> $p['address_latitude'],
                  'address_longitude'=> $p['address_longitude'],
                  'email'=> $p['email'],
                  'phone'=> $p['phone'],
                  'logo'=> $p['logo'],
                  'has_delivery'=> $p['has_delivery'],
                  'slug'=> $p['slug'],
                  'images'=> $p['images'],
                  'is_verified'=> $p['is_verified'],
                  'created_at'=> $p['created_at'],
                  'updated_at'=> $p['updated_at'],
                ];
            }
            return response()->json([
                'status' => true,
                'data' => $final,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pharmacies not found!',
            ]);
        }
    }

    public function addPharmacyAPI(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'address_ar' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10']
        ]);

        if (!$validator->fails()) {
            $pharmacy = new Pharmacy();
            $pharmacy->name = $request->name;
            $pharmacy->slug = Str::slug($request->name);
            $pharmacy->name_ar = $request->name_ar;
            $pharmacy->address = $request->address;
            $pharmacy->address_ar = $request->address_ar;
            $pharmacy->address_latitude = $request->address_latitude;
            $pharmacy->address_longitude = $request->address_longitude;
            $pharmacy->email = $request->email;
            $pharmacy->phone = $request->phone;
            $pharmacy->logo = $request->logo;
            $pharmacy->images = $request->images;
            $pharmacy->has_delivery = $request->has_delivery;
            $pharmacy->updated_at = new \DateTime();
            $pharmacy->created_at = new \DateTime();

            $pharmacy->save();

            return response()->json([
                'status' => true,
                'message' => 'Pharmacy created!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }
    }

    public function updatePharmacyAPI($slug, Request $request) {

        $pharmacy = \App\Pharmacy::where('slug', $slug)->first();
        if($pharmacy) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'name_ar' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string'],
                'address_ar' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10']
            ]);

            if (!$validator->fails()) {
                $pharmacy->name = $request->name;
                $pharmacy->name_ar = $request->name_ar;
                $pharmacy->address = $request->address;
                $pharmacy->address_ar = $request->address_ar;
                $pharmacy->address_latitude = $request->address_latitude;
                $pharmacy->address_longitude = $request->address_longitude;
                $pharmacy->email = $request->email;
                $pharmacy->phone = $request->phone;
                $pharmacy->logo = $request->logo;
                $pharmacy->images = $request->images;
                $pharmacy->has_delivery = $request->has_delivery;
                $pharmacy->updated_at = new \DateTime();

                $pharmacy->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Pharmacy updated!',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pharmacy not found, please try again later!',
            ]);
        }
    }

    public function deletePharmacyAPI($slug) {
        $pharmacy = Pharmacy::where('slug', $slug)->first();
        if($pharmacy) {
            $pharmacy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Pharmacy deleted!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pharmacy not found, please try again later!',
            ]);
        }

    }
}
