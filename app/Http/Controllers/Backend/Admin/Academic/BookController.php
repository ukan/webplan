<?php

namespace App\Http\Controllers\Backend\Admin\Academic;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Admin\BaseController;
use App\Models\Book;
use Input;
use Validator;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('sentinel_access:dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req)
    {
        return view('backend.admin.book-management.index');
    }

    public function datatables()
    {
         return datatables(Book::all())
                ->addColumn('action', function ($book) {
                    $quote = "'";
                    return
                    ' 
                    <a href="javascript:show_book('.$book->id.')" class="btn btn-info btn-xs" title="View"><i class="fa fa-search fa-fw"></i></a>
                    <a onclick="javascript:show_form_update('.$quote.$book->id.$quote.')" class="btn btn-warning btn-xs" title="Update"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                    <a onclick="javascript:show_form_delete('.$quote.$book->id.$quote.')" class="btn btn-danger btn-xs actDelete" title="Delete"><i class="fa fa-trash-o fa-fw"></i></a>'
                    ;
                })
                ->editColumn('image', function ($book) {
                    if ($book->image != ""){
                    return "<img class='center-align' src='".asset('storage/books/').'/'.$book->image."' class='img-responsive' width='100px'>";  
                    }
                })
                ->make(true);
    }

    public function get_data(Request $request){
        
        $response = array();
        $bookData = Book::find($request->id);   

        $response['id'] = $bookData->id;
        echo json_encode($response);   
    }

    public function post_book(Request $request){
        $response = array();
        if($request->action == 'get-data'){
            $book = Book::find($request->id);
            $response['name'] = $book->nama_kitab;
            $response['author'] = $book->pengarang;            
            $response['image'] = Book::getBook($request->id,'image_path');
        }else if($request->action != 'delete'){

            $param = $request->all();
            $rules = array(
                'image'   => 'image|mimes:jpeg,jpg,png',
                'name'   => 'required',
                'author'   => 'required',
            );
            $validate = Validator::make($param,$rules);
            if($validate->fails()) {
                $this->validate($request,$rules);
            } else {
                    if($request->action == 'create'){
                        $book = new Book;
                    }else{
                        $book = Book::find($request->book_id);                    
                    }
                    $book->nama_kitab = $request->name;
                    $book->pengarang = $request->author;

                    if($request->hasFile('image')) {
                        if($request->action == 'update'){                        
                            if($book->image != ""){  
                            $image_path = public_path().'/storage/books/'.$book->image;
                            unlink($image_path);
                            }
                        }
                        createdirYmd('storage/books');
                        $file = Input::file('image');            
                        $name = str_random(20). '-' .$file->getClientOriginalName();  
                        $book->image = date("Y")."/".date("m")."/".date("d")."/".$name;          
                        $file->move(public_path().'/storage/books/'.date("Y")."/".date("m")."/".date("d")."/", $name);
                    }
              
                    $book->save();
                    if($request->action == 'create'){
                        $response['notification'] = 'Success Create Book Data';
                        $response['status'] = 'success';
                    }else{
                        $response['notification'] = 'Success Update Book Data';
                        $response['status'] = 'success';
                    }
            }
        }else{            
            $book = Book::find($request->book_id);
            if ($book->delete()) {
                        $response['notification'] = 'Delete Data Success';
                        $response['status'] = 'success';
            } else {
                        $response['notification'] = 'Delete Data Failed';
                        $response['status'] = 'failed';
            }
        }
        echo json_encode($response);
    }

    public function show(Request $req)
    {
        $book = Book::find($req->id);
        if ($book->image != ""){
        echo '<div class="form-group">
                <div class="col-lg-3">Image</div>
                <div class="col-lg-9">
                    <img src="'.asset('storage/books/').'/'.$book->image.'" class="img-responsive" >
                </div>
            </div>';
        }

        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Name</label>
                    <div class="col-lg-9">
                        '.$book->nama_kitab.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Author</label>
                    <div class="col-lg-9">
                        '.$book->pengarang.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
    }
}