<?php

namespace App\Http\Controllers;

use App\City as City;
use App\User as User;
use App\Visit as Visit;
use Illuminate\Http\Request;
class VisitsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        //
    }


    /**
     * @param $state
     * @return string
     */
    public function listCities($state) {
        //list cities that user has been to
        $state = strtoupper($state);
        $cities_list = City::select('city')->where('state','=',$state)->get()->toArray();
        if ($cities_list) {
            $cities = array_pluck($cities_list, 'city');
            $message = count($cities) . ' cities found in '. $state;
        } else {
            $cities = [];
            $message = 'No Cities Found in '. $state;
        }

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => $message,
            "state" => $state,
            "cities" => $cities
        ]);

    }
    /**
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cityVisits($user_id) {

        $city_visits = Visit::select('city_id')->where('user_id','=',$user_id)->distinct()->get();

        $cities = [];

        $user = User::find($user_id);
        if($city_visits){
            foreach ($city_visits as $visit) {
                $visitor = $user->name;
                $city = City::find($visit['city_id']);
                array_push($cities, $city->city);
            }

            $message = $city_visits->count() . " cities found";
        } else {
            $message = "No Cities found";
        }

        return json_encode(array(
                'status' => 200,
                'success' => true,
                'message' => $message,
                'visitor' => $visitor,
                'cities' => $cities
        ));
        
    }

    /**
     * @param $user_id
     * @return string
     */
    public function stateVisits($user_id) {
        //list states that user has been to

        $status = 200;
        $success_value = true;
        $state_visits = Visit::select('city_id')->where('user_id','=',$user_id)->distinct()->get();

        $states = [];

        $user = User::find($user_id);
        if ($user) {
            if ($state_visits) {
                foreach ($state_visits as $visit) {
                    $city = City::find($visit['city_id']);
                    $visitor = $user->name;
                    array_push($states,
                        $city->state);
                }
                $states = array_values(array_unique($states));
                $message = count($states) . " states found";
            } else {
                $status = 200;
                $success_value= true;
                $visitor = $user->name;
                $message = "No States found";
            }
        } else {
            $status = 400;
            $success_value= false;
            $visitor = "None Found";
            $message = "Invalid Visitor";
        }

        return json_encode(array(
            'status' => $status,
            'success' => $success_value,
            'message' => $message,
            'visitor' => $visitor,
            'states' => $states
        ));

    }
    /**
     * @param $user_id
     * @param Request $request
     * @return string
     */
    public function create(Request $request, $user_id) {
        $this->validate($request, [
            'city' => 'required',
            'state' => 'required'
        ]);
        if ($user_id) {
            $user = User::find($user_id);
            if ($user) {
                $city = $request->input("city");
                $state = $request->input("state");
                //check if city, state  exist in City table,
                $location = City::where('city', '=', $city)->where('state', '=', $state)->first();
                if ($location) {
                    $visit = new Visit();
                    $visit->city_id = $location->id;
                    $visit->user_id = $user->id;
                    $visit->save();
                    //insert into visits table, the user and the city
                    $status = 200;
                    $success_value = true;
                    $message = $user->name . '\'s visit to ' . $city . ', ' . $state . ' successfully added!';

                } else {
                    //no location found
                    //could add code here to add the location if it is new

                    $status = 400;
                    $success_value = false;
                    $message = 'Invalid City, State: ' . $city . ', ' . $state;
                }

            } else {
                //no user found
                $status = 400;
                $success_value = false;
                $message = 'User does not exist';
            }
        } else {
            //no user passed in
            $status = 400;
            $success_value = false;
            $message = 'User must be passed in';

        }
        return response()->json([
            'status' => $status,
            'success' => $success_value,
            'message' => $message
        ]);

    }

    /**
     * @param $visit_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($visit_id) {
        $visit = Visit::find($visit_id);
        if ($visit) {
            if ($visit->delete()) {
                return response()->json([
                    'status' => 200,
                    'success' => true,
                    'message' => 'Visit has been removed']);
            } else {
                return response()->json([
                    'status' => 400,
                    'success' => false,
                    'message' => 'Visit could not be removed']);
            }
        } else {
            return response()->json([
            'status' => 400,
            'success' => false,
            'message' => 'Visit could not be removed']);
        }
    }

}
