<?php

namespace App\Http\Controllers;

use App\City as City;
use App\User as User;
use App\Visit as Visit;
use Illuminate\Http\Request;
class VisitsController extends Controller
{
    /**
     * VisitsController.php
     * This file stores all the functions relating to the LPI challenge
     * Developer: Laurie Perry
     */

    /**
     * listCities function
     * pass in a state and get a listing of the cities in that state
     * @param $state
     * @return string
     */
    public function listCities($state) {
        //list cities that user has been to
        // do a check on the $state to check if it is two letters, otherwise it is invalid
        if((ctype_alpha($state)) && (strlen($state)==2)){
            //The states are stored in the db in upper case, so change th parameter to uppercase for comparison
            $state = strtoupper($state);

            //Get an array of the cities for the specified State
            $cities_list = City::select('city')->where('state','=',$state)->get()->toArray();
            if ($cities_list) {
                //if cities exist for the given state, then create an array of the city names only using array_pluck
                $cities = array_pluck($cities_list, 'city');
                $message = count($cities) . ' cities found in '. $state;
                $status = 200; //OK
                $success = true;
            } else {
                //if no cities are found for a state return an empty array
                $cities = [];
                $message = 'No Cities Found in '. $state;
                $status = 404; //NOT FOUND
                $success = false;
            }

        } else {
            //if $state is not an alpha character and 2 characters long, it is an invalid state
            //TODO check if the $state is a valid US state
            $cities = [];
            $message = 'Invalid State Entered '. $state;
            $status = 400; //BAD REQUEST
            $success = false;

        }
        //return the resulting json
        return response()->json([
            'message' => $message,
            'status' => $status,
            'success' => $success,
            "state" => $state,
            "cities" => $cities
        ]);

    }
    /**
     * cityVisits function
     * This function lists the cities that a user has visited.
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cityVisits($user_id) {
        $cities = [];
        //user_id must be numbers only
        if (!preg_match('#[^0-9]#',  $user_id)){
            //Get the city_visits for the user, list each city only once, even if they have visited several times
            $city_visits = Visit::select('city_id')->where('user_id', '=', $user_id)->distinct()->get();

            //find the user so we can get the name
            $user = User::find($user_id);
            if ($user) {
                $visitor = $user->name;
                if ($city_visits) {
                    $visitor = $user->name;
                    // if there is at least one city for given user, add to the array
                    foreach ($city_visits as $visit) {
                        //find the city by the city_id wich is in the cities table
                        $city = City::find($visit['city_id']);
                        array_push($cities, $city->city);
                    }
                    //return how many cities were found, it was successful
                    $message = $city_visits->count() . " cities found";
                    $status = 200;
                    $success = true;
                } else {
                    //return that no cities were found, but a valid user was entered
                    $message = "No Cities found";
                    $status = 404;//NOT FOUND
                    $success = true;
                }
            } else {
                //return invalid user
                $visitor = 'invalid user';
                $message = "Invalid user entered " . $user_id;
                $status = 400;//BAD REQUEST
                $success = false;
            }
        } else {
            //return invalid user
            $visitor = 'invalid user';
            $message = "Invalid user entered " . $user_id;
            $status = 400;//BAD REQUEST
            $success = false;
        }

        //return the resulting json
        return json_encode(array(
            'message' => $message,
                'status' => $status,
                'success' => $success,
                'visitor' => $visitor,
                'cities' => $cities
        ));
        
    }

    /**
     * stateVisits function lists the states that user has been to
     * @param $user_id
     * @return string
     */
    public function stateVisits($user_id) {
        $states = [];
        //user_id must be numbers only
        if (!preg_match('#[^0-9]#',  $user_id)){
            //Get the state_visits for the user, list each state only once, even if they have visited several times
            $state_visits = Visit::select('city_id')->where('user_id', '=', $user_id)->distinct()->get();


            $user = User::find($user_id);
            if ($user) {
                $visitor = $user->name;
                if ($state_visits) {
                    foreach ($state_visits as $visit) {
                        $city = City::find($visit['city_id']);
                        $visitor = $user->name;
                        array_push($states,
                            $city->state);
                    }
                    $states = array_values(array_unique($states));
                    $status = 200; //OK
                    $success = true;
                    $message = count($states) . " states found";
                } else {
                    $status = 404; //NOT FOUND
                    $success = true;
                    $visitor = $user->name;
                    $message = "No States found";
                }
            } else {
                //return invalid user
                $visitor = 'invalid user';
                $message = "Invalid user entered " . $user_id;
                $status = 404; //NOT FOUND
                $success = false;
            }
        } else {
            //return invalid user
            $visitor = 'invalid user';
            $message = "Invalid user entered " . $user_id;
            $status = 404; //NOT FOUND
            $success = false;

        }
        //return resulting json
        return json_encode(array(
            'status' => $status,
            'success' => $success,
            'message' => $message,
            'visitor' => $visitor,
            'states' => $states
        ));

    }
    /**
     * create function allows a visit by a user to be entered in to the db
     * @param $user_id
     * @param Request $request
     * @return string
     */
    public function create(Request $request, $user_id) {
        //city and state are required to log a visit
        $this->validate($request, [
            'city' => 'required',
            'state' => 'required'
        ]);
        //user_id is required to log a visit
        if (!preg_match('#[^0-9]#',  $user_id)){
            //find the associated user in the db, so we can use the name column
            $user = User::find($user_id);
            if ($user) {
                //if the user is found,check city and state
                //get city and state from request
                $city = $request->input("city");
                $state = $request->input("state");
                //check if city, state  exist in City table,
                $location = City::where('city', '=', $city)->where('state', '=', $state)->first();
                if ($location) {
                    //if valid location, then log a new visit by given user
                    $visit = new Visit();
                    $visit->city_id = $location->id;
                    $visit->user_id = $user->id;
                    //insert into visits table, the user and the city
                    $visit->save();

                    //insert into visits table, the user and the city
                    $status = 200;//OK
                    $success = true;
                    $message = $user->name . '\'s visit to ' . $city . ', ' . $state . ' successfully added!';

                } else {
                    //no location found
                    //could add code here to add the location if it is new

                    $status = 404; //NOT FOUND
                    $success = false;
                    $message = 'Invalid City, State: ' . $city . ', ' . $state . ' entered for ' . $user->name;
                }

            } else {
                //no user found
                $status = 404; //NOT FOUND
                $success = false;
                $message = 'User does not exist';
            }
        } else {
            //no user passed in
            $status = 400;//BAD REQUEST
            $success = false;
            $message = 'Valid User must be passed in';

        }
        //return resulting json
        return response()->json([
            'status' => $status,
            'success' => $success,
            'message' => $message
        ]);

    }

    /**
     * @param $visit_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($visit_id) {
        if (!preg_match('#[^0-9]#',  $visit_id)){
            //find the visit row in the visits table
            $visit = Visit::find($visit_id);
            if ($visit) {
                //find user  and city to retrieve names
                $user = User::find($visit->user_id);
                $city = City::find($visit->city_id);

                //if the visit exists, the delete it from the table
                if ($visit->delete()) {
                    $status = 200;//OK
                    $success = true;
                    $message = $user->name . '\'s Visit to ' . $city->city . ', ' . $city->state . ' has been removed';
                } else {
                    $status = 404;//NOT FOUND
                    $success = false;
                    $message = 'Visit could not be removed ' . $visit - id;
                }
            } else {
                $status = 404;//NOT FOUND
                $success = false;
                $message = 'Visit could not be found ' . $visit_id;
            }
        } else {
            $status = 404;//NOT FOUND
            $success = false;
            $message = 'Invalid Visit Id ' . $visit_id;
        }
        return response()->json([
            'status' => $status,
            'success' => $success,
            'message' => $message]);
    }

}
