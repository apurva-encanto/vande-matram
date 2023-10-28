<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\JournalistDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class JournalistController extends Controller
{

    public function addJournalist()
    {

        $data['agents'] = User::where(['role' => 'agent', 'status' => 'active', 'is_delete' => '0', 'is_assign' => '0'])->get();
        return view('admin.journalist.add', $data);
    }

    public function storeJournalist(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users',
            'role' => 'required',
            'start_date' => 'required',
            'area' => 'required',
            'address' => 'required',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = new User();
        $user->name = $input['first_name'] . ' ' . $input['last_name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = Hash::make($input['password']);
        $user->role = $input['role'];
        $user->status = 'active';
        $user->device_token = ' ';
        $user->save();

        // Generate a dynamic folder name based on user ID or any unique identifier
        $dynamicFolderName = 'user_' . $user->id; // Example: 'user_1'

        // Check if the folder exists, create it if not
        if (!Storage::disk('public')->exists('uploads/' . $dynamicFolderName)) {
            Storage::disk('public')->makeDirectory('uploads/' . $dynamicFolderName);
        }

        try {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/' . $dynamicFolderName, $fileName, 'public'); // The uploaded file will be stored in storage/app/public/uploads
        } catch (\Exception $e) {
            $user_exists = User::find($user->id);
            $user_exists->delete();
            return back()->with('error', 'File upload failed: ' . $e->getMessage());
        }
        try {


            $journalistUser = new JournalistDetail();
            $journalistUser->user_id = $user->id;
            $journalistUser->first_name = $input['first_name'];
            $journalistUser->last_name = $input['last_name'];
            $journalistUser->start_date = $input['start_date'];
            $journalistUser->area = $input['area'];
            $journalistUser->address = $input['address'];
            $journalistUser->photo = $fileName;
            $journalistUser->team_member_id = (!empty($input['team_member_id'])) ? implode('|', $input['team_member_id']) : ' ';
            $journalistUser->save();

            if (!empty($input['team_member_id'])) {

                foreach ($input['team_member_id'] as $team_id) {
                    $agent = User::find($team_id);
                    $agent->is_assign = $user->id;
                    $agent->save();
                }
            }

            return redirect()->route('admin.journalist.list')->with('success', 'Journalist Save successfully!');
        } catch (\Exception $e) {
            // Handle the exception here
            $user_exists = User::find($user->id);
            $user_exists->delete();
            // Log the exception, display an error message, or redirect to an error page
            return back()->with('error', 'Failed to create journalist user: ' . $e->getMessage());
        }
    }

    public function listJournalist(Request $request)
    {

        $data['users'] = User::leftJoin('journalist_details', 'users.id', '=', 'journalist_details.user_id')
            ->select('users.*', 'journalist_details.*')
            ->where('role', '!=', 'admin')
            ->where('is_delete', '0')
            ->orderBy('users.id', 'desc')
            ->get();

        return view('admin.journalist.list', $data);
    }

    public function editJournalist(Request $request, $id)
    {
        $data['user'] = User::leftJoin('journalist_details', 'users.id', '=', 'journalist_details.user_id')
            ->select('users.*', 'journalist_details.*')
            ->where('users.id', $id)
            ->first();
        $data['agents'] = User::where(['role' => 'agent', 'status' => 'active', 'is_delete' => '0'])->get();
        return view('admin.journalist.edit', $data);
    }

    public function updateJournalist(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => ['required', Rule::unique('users')->ignore($id)],
            'role' => 'required',
            'start_date' => 'required',
            'area' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($request->file('file'))) {
            // Generate a dynamic folder name based on user ID or any unique identifier
            $dynamicFolderName = 'user_' . $id; // Example: 'user_1'
            // Check if the folder exists, create it if not
            if (!Storage::disk('public')->exists('uploads/' . $dynamicFolderName)) {
                Storage::disk('public')->makeDirectory('uploads/' . $dynamicFolderName);
            }

            try {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/' . $dynamicFolderName, $fileName, 'public'); // The uploaded file will be stored in storage/app/public/uploads
                JournalistDetail::where('user_id', $id)->update(['photo' => $fileName]);
            } catch (\Exception $e) {
                return back()->with('error', 'File upload failed: ' . $e->getMessage());
            }
        }

        $userUpdate = User::find($id);
        $userUpdate->name = $input['first_name'] . ' ' . $input['last_name'];
        $userUpdate->email = $input['email'];
        $userUpdate->phone = $input['phone'];
        $userUpdate->role = $input['role'];
        $userUpdate->status = $input['status'];
        if (array_key_exists("password", $input)) {
            $userUpdate->password = Hash::make($input['password']);
        }
        $userUpdate->save();
        User::where('is_assign', $id)->update(['is_assign' => 0]);

        if (!empty($input['team_member_id'])) {

            foreach ($input['team_member_id'] as $team_id) {
                $agent = User::find($team_id);
                $agent->is_assign = $id;
                $agent->save();
            }
        }
        JournalistDetail::where('user_id', $id)->update(
            [
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'start_date' => $input['start_date'],
                'area' => $input['area'],
                'address' => $input['address'],
                'team_member_id' => (!empty($input['team_member_id'])) ? implode('|', $input['team_member_id']) : ' ',

            ]
        );

        return redirect()->route('admin.journalist.list')->with('success', 'Journalist Updated successfully!');
    }
    public function deleteJournalist(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->role == 'manager') {
            $journalistDetails = JournalistDetail::where('user_id', $id)->first();

            $team_agents = explode('|', $journalistDetails->team_member_id);

            JournalistDetail::where('user_id', $id)->update(['team_member_id' => 0]);

            foreach ($team_agents as $agent_id) {
                if ($agent_id > 0) {
                    $agent = User::find($agent_id);
                    $agent->is_assign = 0;
                    $agent->save();
                }
            }


            $user->is_assign = 0;
            $user->is_delete = '1';
            $user->save();
        }

        if ($user->role == 'agent') {
            if ($user->is_assign > 0) {
                $journalistDetails = JournalistDetail::where('user_id', $user->is_assign)->first();
                $team_agents = explode('|', $journalistDetails->team_member_id);
                // Remove the specified value from the array
                $array = implode("|", array_diff($team_agents, array($id)));
                JournalistDetail::where('user_id', $user->is_assign)->update(['team_member_id' => $array]);
            }

            $user->is_assign = 0;
            $user->is_delete = '1';
            $user->save();
        }

        return redirect()->route('admin.journalist.list')->with('success', 'Journalist Deleted successfully!');
    }
}
