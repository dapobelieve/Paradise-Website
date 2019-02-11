<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
//use App\Transaction;
use App\Student;
//use Carbon\Carbon;
use Image;


class PartTimeController extends Controller
{
    private $regImage;

    public function save(Request $request)
    {


        // fetch user
        $user = User::find($request->userId);

        if (!$user) {
            return response()->json('INVALID USER', 500);
        }

        //handle students validation
//        $this->validate($request, [
//            'phone'    => 'required|unique:students,phone|digits:11',
//            'surname'    => 'required|string',
//            'email' => 'required|unique:students,email|email',
//            'firstname'    => 'required|string',
//            'dob'    => 'required|date',
//            'nation' => 'required',
//            'sponsor' => 'required',
//            'religion' => 'required',
//            'birthplace' => 'required',
//            'first_choice' => 'required',
//            // kin validation
//            'kin_name' => 'required',
//            'kin_Email' => 'required|email',
//            'kin_address' => 'required',
//            'kin_Phone' => 'required|digits:11',
//            'second_choice' => 'required',
//            'hmadd_country' => 'required',
//            'hmadd_state' => 'required',
//            'hmadd_city' => 'required',
//            'hmadd_street' => 'required',
//            'madd_country' => 'required',
//            'madd_state' => 'required',
//            'sponsor_name' => 'required',
//            'sponsor_address' => 'required',
//            'sponsor_Email' => 'required|email',
//            'sponsor_Phone' => 'required|digits:11',
//            'madd_city' => 'required',
//            'marital' => 'required',
//            'image'  => 'required|image|mimes:jpeg,jpg,png|max:1024'
//        ], [
//            'image.required' => 'An image is required',
//            'kin_name.required' => 'Next of kin Name is required',
//            'kin_Email.required' => 'Next of kin Email is required',
//            'kin_address.required' => 'Next of kin Address is required',
//            'kin_Phone.required' => 'Next of kin Address is required',
//            'madd_country.required' => 'Enter Country of mailing address',
//            'madd_state.required' => 'Enter State of mailing address',
//            'madd_city.required' => 'Enter City of mailing address',
//            'hmadd_country.required' => 'Enter your home address country',
//            'hmadd_state.required' => 'Enter your home address State',
//            'hmadd_city.required' => 'Enter your home address City',
//            'hmadd_street.required' => 'Enter your home address Street',
//            'image.max' => 'image shpuld not be more than 1mb',
//            'phone.required' => 'Phone Number Required',
//            'surname.required' => 'Enter your surname',
//            'firstname.required' => 'Enter your Firstname',
//            'dob.required' => 'Select your date of birth',
//            'marital.required' => 'Select your marital status',
//            'nation.required' => 'Select your nationality'
//        ]);
        
        // check number if subjects >= 5
         if (count(json_decode($request->subjects)) < 5) {
             return response()->json('Add at least 5 subjects', 500);
         }
        
        // courses array
        $courses = [
            'fc' => $request->first_choice,
            'sc' => $request->second_choice
        ];


        // build and json encode addresses
        $addressArr = [
            'home' => [
                'country' => $request->hmadd_country,
                'city' => $request->hmadd_city,
                'state' => $request->hmadd_state,
                'street' => $request->hmadd_street,
            ],
            'mail' => [
                'mail-box' => $request->madd_pcode,
                'country'  => $request->madd_country,
                'state'  => $request->madd_state,
                'city'  => $request->madd_city,
            ]
        ];

        // build and json encode next of kin & sponsor details
        $kinSponsor = [
            'kin' => [
                'name' => $request->kin_name,
                'phone' => $request->kin_Phone,
                'address' => $request->kin_address,
                'email' => $request->kin_Email
            ],
            'sponsor' => [
                'name'    => $request->sponsor_name,
                'phone'   => $request->sponsor_Phone,
                'address' => $request->sponsor_address,
                'email'   => $request->sponsor_Email
            ]
        ];

        //store image
        $originalImagePath = public_path('storage/reg/');
        $imageName = 'fun_reg_'.uniqid() .".jpg";

        $image = Image::make($request->image);

        $this->regImage = 'reg/'.$imageName;

        $image->resize(360, 230, function($constraint) {
//                $constraint->upsize();
        })->save($originalImagePath.$imageName, 65);

        // use the user instance to create record
        $student = $user->students()->firstOrCreate([
            'surname' => $request->surname,
            'image'  => $this->regImage,
            'email'   => $request->email,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'sex'   => $request->sex,
            'ms'    => $request->marital,
            'dob'   => $request->dob,
            'religion'   => $request->religion,
            'Nationality'   => $request->nation,
            'state'   => $request->state,
            'sponsor' => $request->sponsor,
            'lga'   => $request->lga,
            'courses' => json_encode($courses),
            'phone'   => $request->phone,
            'address' => json_encode($addressArr),
            'kin_sponsor' => json_encode($kinSponsor),
            'phone2'   => $request->phone2,
            // 'email2'   => $request->email2,
            'birth'   => $request->birthplace,
            'session' => config('site.defaults.session'),
            'type'    => 'Part Time',
        ]);
        
        // create all the students ssce results
//        foreach (json_decode($request->subjects) as $key) {
//            $student->results()->firstOrCreate([
//                'subject' => $key->name,
//                'grade'   =>   $key->grade,
//            ]);
//        }

        // create a transaction
        $transaction = $this->createTransaction($student);

        // return transaction
        return response()->json($transaction->trxn_ref);
    }

    /**
     * Create a transaction for this record
     */
    protected function createTransaction(Student $student)
    {
        $transaction = $student->transactions()->create([
            'trxn_ref' => str_random(10),
        ]);

        return $transaction;
    }
}
