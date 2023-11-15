<?php

namespace App\Http\Controllers\API;

use Hash;
use Validator;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\FavoriteTopics;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use App\Models\Bookmarks;
use DB;

class UserController extends BaseController
{
    public function index(){
        $products= Article::all();
        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }
    public function user_register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        try {
            $input = $request->all();
            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->phone = null;
            $user->password = Hash::make($input['password']);
            $user->role = 'user';
            $user->status = 'active';
            $user->created_by = 1;
            $user->is_approved = 1;
            $user->device_token = ' ';
            $user->save();


            return $this->sendResponse($user->toArray(), 'User Created successfully.');
        } catch (QueryException $e) {
            // Handle database-related exceptions
            // Log or return an error response
            return $this->sendError('Error creating user:', $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            // Log or return an error response
            return $this->sendError('Unexpected error: ', $e->getMessage());
        }
    }
    public function user_login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $userExists = User::where('email', $request->email)
            ->where('role','user')
            ->first();

        if ($userExists) {

            // Compare the entered password with the hashed password from the database
            if (Hash::check($request->password, $userExists->password)) {
                // Passwords match, user is authenticated
                return $this->sendResponse($userExists->toArray(), 'User login successfully.');
            } else {
                // Passwords do not match
                return $this->sendError('Incorrect password!', []);
            }
        } else {
            return $this->sendError('User Not exists.', []);
        }

    }
    public function agent_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'=>'required'] );


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $userExists=User::where('email', $request->email)
        ->where('role','!=','user')
        ->first();

        if( $userExists ){

            // Compare the entered password with the hashed password from the database
            if (Hash::check($request->password, $userExists->password)) {
                // Passwords match, user is authenticated
                return $this->sendResponse($userExists->toArray(), 'Agent login successfully.');
            } else {
                // Passwords do not match
                return $this->sendError('Incorrect password!', []);
            }
        }else{
            return $this->sendError('Agent Not exists.', []);

        }

    }


    public function forgot_password(Request $request){
        $validator = Validator::make($request->all(), [
                'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $userExists = User::where('email', $request->email)->first();


        if ($userExists) {

            User::where('email', $request->email)->update(['otp'=>1111]);
            return $this->sendResponse([], 'OTP sent successfully to your email.');
        }else{
            return $this->sendError('Email not registered.', []);
        }


    }

    public function otp_verify(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $userExists = User::where('email', $request->email)->first();
        if ($userExists) {
            if($userExists->otp == $request->otp)
            {
                return $this->sendResponse($userExists->toArray(), 'Otp Verified Successfully');
            }else{
                return $this->sendError('Otp not Matched !', []);

            }

            // User::where('email', $request->email)->update(['otp' => 1111]);
            // return $this->sendResponse([], 'OTP sent successfully to your email.');
        } else {
            return $this->sendError('Email not registered.', []);
        }
    }

    public function change_password(Request $request){
      $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
      ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userExists = User::where('email', $request->email)
                     ->first();
        if ($userExists) {
            User::where('email', $request->email)->update(['password'=> Hash::make($request->password)]);
            return $this->sendResponse($userExists->toArray(), 'Password Change successfully.');

            // Compare the entered password with the hashed password from the database

        } else {
            return $this->sendError('User Not exists.', []);
        }

    }

    public function selectFavoriteTopics(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $categories= json_decode($request->category_id);
        if(count($categories) >= 2)
        {

           $favoriteTopics=new FavoriteTopics();
           $favoriteTopics->user_id = $request->user_id;
           $favoriteTopics->category_id = implode("|",$categories);
           $favoriteTopics->save();

            return $this->sendResponse([], 'Topics save successfully.');
        }else{
            return $this->sendError('Select atleast 2 categories.', []);
        }


    }

    public function getCategories()
    {

         $categories=Category::where('is_delete','0')->get();
          if ($categories) {
            // Convert the collection to an array
            $categoriesArray[0]=['id'=>0,'name'=>'Random','slug'=>'random'];
            foreach ($categories as $key=>$category) {
                $categoriesArray[$key+1] = ['id' => $category->id, 'name' => $category->converted_name,'slug'=> $category->slug];
                array_push($categoriesArray);
            }

            return $this->sendResponse($categoriesArray, 'Categories get successfully.');
        } else {
            return $this->sendError('User Not exists.', []);
        }


    }

    public function getBreakingNews()
    {
        $articles= Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
        ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
        ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
        ->inRandomOrder()
        ->where(['articles.is_approved' => '1', 'articles.status' => 'active', 'articles.is_delete' => '0', 'articles.publish' => '1', 'top_new' => '1'])
        ->orderBy('articles.id', 'desc')->get();
        return $this->sendResponse($articles->toArray(), 'Breaking News get successfully.');

    }


    public function getNewsByCategory(Request $request,$category)
    {
        $count=8;
        $where=[];

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


      $categoryExists=  Category::where('slug', $category)->first();
      if($categoryExists || $category=='random')
      {
              if(!empty($request->count))
              {
                $count = $request->count;
              }

            $where['articles.is_approved'] = '1';
            $where['articles.status'] = 'active';
            $where['articles.is_delete'] = '0';
            $where['articles.publish'] = '1';
            if ($category !='random') {
                $where['category_slug'] = $category;
            }

            $userId= $request->user_id;

            $articles = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->leftJoin('bookmarks', function ($join) use ($userId) {
                $join->on('articles.id', '=', 'bookmarks.article_id')
                ->where('bookmarks.user_id', '=', $userId);
            })
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name', DB::raw('COALESCE(bookmarks.is_save, 0) AS is_bookmarked'))
            ->where(
                $where
            )
            ->orderBy('articles.id', 'desc')
            ->paginate($count);

            // You can also customize the response format if needed
                $response = [
                    'articles' => $articles->items(),
                    'pagination' => [
                        'current_page' => $articles->currentPage(),
                        'total_pages' => $articles->lastPage(),
                        'per_page' => $count,
                        'total_articles' => $articles->total(),
                    ],
                ];

               return $this->sendResponse($response, $category.' News get successfully.');


      }else{
            return $this->sendError('Category Not exists.', $category);

      }
    }

    public function saveArticleAsBookmark(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'article_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userExists = User::where('id', $request->user_id)
            ->first();
        $where['is_approved'] = '1';
        $where['status'] = 'active';
        $where['is_delete'] = '0';
        $where['publish'] = '1';
        $where['id'] = $request->article_id;
        $articleExists = Article::where($where)
            ->first();
        if ($userExists && $articleExists) {

           $bookmarkSet=Bookmarks::where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();
           if(empty($bookmarkSet))
           {
                $bookmarkArticle = new Bookmarks();
                $bookmarkArticle->user_id = $request->user_id;
                $bookmarkArticle->article_id = $request->article_id;
                $bookmarkArticle->is_save = 1;
                $bookmarkArticle->save();
                return $this->sendResponse([], ' News save to Bookmark successfully.');
           }else{
            if($bookmarkSet->is_save == 1){
                    return $this->sendResponse([], ' News Already save to Bookmark.');
            }else{
                Bookmarks::where('user_id', $request->user_id)->where('article_id', $request->article_id)->update(['is_save'=>1]);
                return $this->sendResponse([], ' News save to Bookmark successfully.');

            }
           }

        } else {
             $err='';
            if(empty($userExists))
            {
                $err = 'User Not Exists !!';
            }

            if (empty($articleExists)) {
                $err .= 'Article Not Exists !!';
            }
            return $this->sendError($err, []);
        }
    }


    public function removeArticleAsBookmark(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'article_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userExists = User::where('id', $request->user_id)
            ->first();
        $where['is_approved'] = '1';
        $where['status'] = 'active';
        $where['is_delete'] = '0';
        $where['publish'] = '1';
        $where['id'] = $request->article_id;
        $articleExists = Article::where($where)
            ->first();
        if ($userExists && $articleExists) {

            $bookmarkSet = Bookmarks::where('user_id', $request->user_id)->where('article_id', $request->article_id)->first();
            if (empty($bookmarkSet)) {
                return $this->sendResponse([], 'Something Went Wrong.');
            } else {
                if ($bookmarkSet->is_save == 0) {
                    return $this->sendResponse([], ' News Already Remove to Bookmark.');
                } else {
                    Bookmarks::where('user_id', $request->user_id)->where('article_id', $request->article_id)->update(['is_save' => 0]);
                    return $this->sendResponse([], ' News Remove from Bookmark successfully.');
                }
            }
        } else {
            $err = '';
            if (empty($userExists)) {
                $err = 'User Not Exists !!';
            }

            if (empty($articleExists)) {
                $err .= 'Article Not Exists !!';
            }
            return $this->sendError($err, []);
        }
    }

    public function getBookmarkArticles(Request $request)
    {
              $count=8;
              if(!empty($request->count))
              {
                $count = $request->count;
              }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $where['articles.is_approved'] = '1';
        $where['articles.status'] = 'active';
        $where['articles.is_delete'] = '0';
        $where['articles.publish'] = '1';

        $articles = Bookmarks::where('bookmarks.user_id', $request->user_id)
            ->leftJoin('articles', 'articles.id', '=', 'bookmarks.article_id')
            ->leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->where(
                $where
            )
            ->paginate($count);
        if(count($articles)>0){
            // You can also customize the response format if needed
            $response = [
                'articles' => $articles->items(),
                'pagination' => [
                    'current_page' => $articles->currentPage(),
                    'total_pages' => $articles->lastPage(),
                    'per_page' => $count,
                    'total_articles' => $articles->total(),
                ],
            ];

            return $this->sendResponse($response,  'Bookmark News get successfully.');
        }else{
            return $this->sendError('You haven`t saved any News yet. Start reading and bookmarking them now', []);

        }
    }

    public function notification_setting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userExists = User::where('id', $request->user_id)
            ->first();
        if($userExists)
        {
            if($userExists->notify ==1){
                User::where('id', $request->user_id)->update(['notify'=>0]);
            }else{
                User::where('id', $request->user_id)->update(['notify' => 1]);
            }
            return $this->sendResponse([],  'Notification setting change successfully.');

        }else{
            return $this->sendError('User not exists', []);

        }

    }

    public function getArticleDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'article_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

                $where['articles.is_approved'] = '1';
                $where['articles.status'] = 'active';
                $where['articles.is_delete'] = '0';
                $where['articles.publish'] = '1';
                $where['articles.id'] = $request->article_id;

               $userId= $request->user_id;

                $articles = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
                ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
                ->leftJoin('bookmarks', function ($join) use ($userId) {
                    $join->on('articles.id', '=', 'bookmarks.article_id')
                    ->where('bookmarks.user_id', '=', $userId);
                })
                ->select('articles.*', 'users.name as user_name', 'categories.name as category_name', DB::raw('COALESCE(bookmarks.is_save, 0) AS is_bookmarked'))
                ->where(
                    $where
                )
            ->first();
            if($articles)
            {
            return $this->sendResponse($articles->toArray(),  'Article Details get successfully.');

            }else{
            return $this->sendError('Article Not exists', []);

            }
    }

    public function changeCurrentPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'current_password' => 'required',
            'new_password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $userExists = User::where('id', $request->user_id)->where('role','!=','admin')
            ->first();
        if ($userExists) {

                // Compare the entered password with the hashed password from the database
            if (Hash::check($request->current_password, $userExists->password)) {
                // Passwords match, user is authenticated

                User::where('id',$request->user_id)->update(['password'=> Hash::make($request->new_password)]);
                return $this->sendResponse($userExists->toArray(), 'Password Change successfully.');
            } else {
                // Passwords do not match
                return $this->sendError('Incorrect password!', []);
            }

              print_r($userExists->toArray());
            return $this->sendResponse([],  'Notification setting change successfully.');
        } else {
            return $this->sendError('User not exists', []);
        }

    }



}
