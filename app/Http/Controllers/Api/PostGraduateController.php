<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use Carbon\Carbon;
use Image;
class PostGraduateController extends Controller
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
        $this->validate($request, [
            'phone'    => 'required|unique:students,phone|digits:11',
            'surname'    => 'required|string',
            'firstname'    => 'required|string',
            'dob'    => 'required|date',
            'nation' => 'required',
            'religion' => 'required',
            'hmadd_country' => 'required',
            'hmadd_state' => 'required',
            'hmadd_city' => 'required',
            'hmadd_street' => 'required',
            'madd_country' => 'required',
            'madd_state' => 'required',
            'madd_city' => 'required',
            'marital' => 'required',
            'image'  => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ], [
            'image.required' => 'An image is required',
            'madd_country.required' => 'Enter Country of mailing address',
            'madd_state.required' => 'Enter State of mailing address',
            'madd_city.required' => 'Enter City of mailing address',
            'hmadd_country.required' => 'Enter your home address country',
            'hmadd_state.required' => 'Enter your home address State',
            'hmadd_city.required' => 'Enter your home address City',
            'hmadd_street.required' => 'Enter your home address Street',
            'image.max' => 'image shpuld not be more than 1mb',
            'phone.required' => 'Phone Number Required',
            'dob.required' => 'Select your date of birth',
            'marital.required' => 'Select your marital status',
            'nation.required' => 'Select your nationality'
        ]);
        
        // check number of subjects
         if (count(json_decode($request->subjects)) < 5) {
             return response()->json('Add at least 5 subjects', 500);
         }

         //check number of degrees
        if (count(json_decode($request->degrees)) < 1) {
            return response()->json('Add at least 1 Degree', 500);
        }

        // check number of publications
        if(count(json_decode($request->publications)) < 1) {
            return response()->json('Add at least 1 Publication', 500);
        }

        //referees
        if (count(json_decode($request->refs)) < 3) {
            return response()->json('Add at least 3 Referees');
        }

        
        // courses array
        $course = [
            'department' => $request->department,
            'program' => $request->program,
            'field' => $request->field,
            'mode' => $request->mode,
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


        //store image
        $originalImagePath = public_path('storage/reg/');
        $imageName = 'fun_reg_'.uniqid() .".jpg";

        $image = Image::make($request->image);

        $this->regImage = 'reg/'.$imageName;

        $image->save($originalImagePath.$imageName, 80);

        // use the user intance to create record
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
            'lga'   => $request->lga,
            'pg_course' => json_encode($course),
            'pg_prizes' => $request->prizes,
            'pg_refrees' => $request->refs,
            'pg_degree'  => $request->degrees,
            'phone'   => $request->phone,
            'address' => json_encode($addressArr),
            'session' => config('site.defaults.session'),
            'type'    => 'Post Graduate',
        ]);
        
        // create all the students ssce results
        foreach (json_decode($request->subjects) as $key) {
            $student->results()->firstOrCreate([
                'subject' => $key->name,
                'grade'   =>   $key->grade,
            ]);
        }

        //create publications
        foreach(json_decode($request->publications) as $key) {
            $student->publications()->firstOrCreate([
                'title' => $key->title,
                'date'  => $key->date
            ]);
        }
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
