<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use App\Traits\CloudinaryUpload;
use Validator;


class PartTimeController extends Controller
{
    use CloudinaryUpload;

    public function save(Request $request)
    {
        // fetch user
        $user = User::find($request->userId);

        if (!$user) {
            return response()->json('INVALID USER', 500);
        }

        /**
         * due to the nature of the frontend, we have to validate
         * each request according to their tabs
         * i.e Tab by Tab validation
         */
        //handle students validation
        // validate Tab 1
        $validator = Validator::make($request->all(), [
            'phone'    => 'required|unique:students,phone|digits:11',
            'surname'    => 'required|string',
            'email' => 'required|unique:students,email|email',
            'firstname'    => 'required|string',
            'dob'    => 'required|date',
            'nation' => 'required',
            'sex' => 'required',
            'sponsor' => 'required',
            'religion' => 'required',
            'birthplace' => 'required',
            'marital' => 'required',
        ], [

            'phone.required' => 'Phone Number Required',
            'phone.unique' => 'Phone Number already exists',
            'surname.required' => 'Enter your surname',
            'firstname.required' => 'Enter your Firstname',
            'dob.required' => 'Select your date of birth',
            'marital.required' => 'Select your marital status',
            'nation.required' => 'Select your nationality',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'tab'    => 1
            ], 422);
        }



        // validate Tab 2
        $validator = Validator::make($request->all(), [
            'first_choice' => 'required',
            'second_choice' => 'required'
        ],[
            'first_choice.required' => 'Enter your first choice course',
            'second_choice.required' => 'Enter your second choice course'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'tab' => 2
            ], 422);
        }

        // validate tab 3
        $validator = Validator::make($request->all(), [
            'hmadd_country' => 'required',
            'hmadd_state' => 'required',
            'hmadd_city' => 'required',
            'hmadd_street' => 'required',
            'madd_country' => 'required',
            'madd_state' => 'required',
            'madd_city' => 'required',
        ],[
            'hmadd_country.required' => 'Enter your home address country',
            'hmadd_state.required' => 'Enter your home address State',
            'hmadd_city.required' => 'Enter your home address City',
            'hmadd_street.required' => 'Enter your home address Street',
            'madd_country.required' => 'Enter Country of mailing address',
            'madd_state.required' => 'Enter State of mailing address',
            'madd_city.required' => 'Enter City of mailing address',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'tab' => 3
            ], 422);
        }

        // check number if subjects >= 5 validate tab 4
        if (count(json_decode($request->subjects)) < 5) {
            return response()->json([
                'tab' => 4,
                'errors' => [
                    'ssce' => 'Add at least 5 subjects'
                ]
            ], 422);
        }

        foreach(json_decode($request->subjects) as $key) {

            if($key->name == "" || $key->grade == "") {
                return response()->json([
                    'tab' => 4,
                    'errors' => [
                        'ssce' => 'Fill all fields',
                    ]
                ], 422);
            }
        }

        //validate tab 5
        $validator = Validator::make($request->all(), [
            'kin_name' => 'required',
            'kin_Email' => 'required|email',
            'kin_address' => 'required',
            'kin_Phone' => 'required|digits:11',
            'sponsor_name' => 'required',
            'sponsor_address' => 'required',
            'sponsor_Email' => 'required|email',
            'sponsor_Phone' => 'required|digits:11',
        ],[
            'kin_name.required' => 'Next of kin Name is required',
            'kin_Email.required' => 'Next of kin Email is required',
            'kin_address.required' => 'Next of kin Address is required',
            'kin_Phone.required' => 'Next of kin Address is required',
            'sponsor_name.required' => 'Sponsors name required',
            'sponsor_address.required' => 'Sponsors address required',
            'sponsor_Email.required' => 'Sponsors email required',
            'sponsor_Phone.required' => 'Sponsors phone number required',
            'sponsor_Phone.digits' => 'Sponsors phone number should be 11 digits',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'tab' => 5
            ], 422);
        }



         $validator = Validator::make($request->all(), [
             'image'  => 'required|image|mimes:jpeg,jpg,png|max:1024'
         ],[
             'image.required' => 'An image is required',
             'image.max' => 'image should not be more than 1mb',
         ]);
        // validate tab 7
        if (count(json_decode($request->subjects)) < 5) {
            return response()->json([
                'tab' => 7,
                'errors' => $validator->errors(),
            ], 422);
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



        // use the user instance to create record
        $student = $user->students()->firstOrCreate([
            'surname' => $request->surname,
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

        $file = $request->image;
        $imageData = $this->upload($file,'funaab-reg', 360,null);
        $data = [
            'public_id' => $imageData['public_id'],
            'secure_url' => $imageData['secure_url']
        ];
        $student->image = json_encode($data);
        $student->save();
        
        // create all the students ssce results
        foreach (json_decode($request->subjects) as $key) {
            $student->results()->firstOrCreate([
                'subject' => $key->name,
                'grade'   =>   $key->grade,
            ]);
        }

        // create a transaction
        $transaction = $this->createTransaction($student);

        // return transaction ref
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
