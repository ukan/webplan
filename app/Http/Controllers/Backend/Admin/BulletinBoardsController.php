<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Admin\BaseController;
use App\Models\BulletinBoard;
use Input;
use Validator;

class BulletinBoardsController extends Controller
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
        return view('backend.admin.bulletin-boards.index');

    }

    public function create()
    {
        return view('backend.admin.bulletin-boarstatus_accountds.create');
    }
    public function datatables()
    {
         return datatables(BulletinBoard::all())
                ->addColumn('action', function ($bulletin_board) {
                    $quote = "'";
                    return $bulletin_board->publish_status == 'on' ?
                    ' 
                    <a href="javascript:show_bulletin_boards('.$bulletin_board->id.')" class="btn btn-info btn-xs" title="View"><i class="fa fa-search fa-fw"></i></a>
                    <a onclick="javascript:show_form_unpublish('.$quote.$bulletin_board->id.$quote.')" class="btn btn-success btn-xs" title="Unpublish"><i class="fa fa-eye-slash fa-fw"></i></a>
                    <a onclick="javascript:show_form_update('.$quote.$bulletin_board->id.$quote.')" class="btn btn-warning btn-xs" title="Update"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                    <a onclick="javascript:show_form_delete('.$quote.$bulletin_board->id.$quote.')" class="btn btn-danger btn-xs actDelete" title="Delete"><i class="fa fa-trash-o fa-fw"></i></a>' :
                    '<a href="javascript:show_bulletin_boards('.$bulletin_board->id.')" class="btn btn-info btn-xs" title="View"><i class="fa fa-search fa-fw"></i></a>
                    <a onclick="javascript:show_form_publish('.$quote.$bulletin_board->id.$quote.')" class="btn btn-success btn-xs" title="Publish"><i class="fa fa-eye fa-fw"></i></a>
                    <a onclick="javascript:show_form_update('.$quote.$bulletin_board->id.$quote.')" class="btn btn-warning btn-xs" title="Update"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                    <a onclick="javascript:show_form_delete('.$quote.$bulletin_board->id.$quote.')" class="btn btn-danger btn-xs actDelete" title="Delete"><i class="fa fa-trash-o fa-fw"></i></a>'
                    ;
                })
                ->editColumn('img_url', function ($bulletin_board) {
                    if ($bulletin_board->img_url != ""){
                    return "<img src='".asset('storage/'.$bulletin_board->img_url)."' class='img-responsive' width='100px'>";  
                    }
                })
                ->editColumn('publish_status', function ($bulletin_board) {
                    if ($bulletin_board->publish_status != "on"){
                        return "Unpublish";  
                    }else{
                        return "Publish";
                    }
                })
                ->editColumn('description', function ($bulletin_board) {
                        return str_limit($bulletin_board->description, 25);  
                })
                ->make(true);
    }

    public function get_data(Request $request){
        
        $response = array();
        $userData = BulletinBoard::find($request->id);   

        $response['id'] = $userData->id;
        echo json_encode($response);   
    }

    public function post_publish(Request $request){
        $response = array();
        if($request->action == 'publish'){
            $response = array();
            $bulletin_board = BulletinBoard::find($request->id);                    
            $bulletin_board->publish_status = "on";
            $bulletin_board->save();
                
            $response['notification'] = "Success Publish Bulletin Board";
            $response['status'] = "success";
        
        }else{
            $response = array();            
            $bulletin_board = BulletinBoard::find($request->id);                    
            $bulletin_board->publish_status = "off";
            $bulletin_board->save();
                
            $response['notification'] = "Success Unpublish Bulletin Board";
            $response['status'] = "success";
        }

        // $response['notification'] = "Gagal Bos";
        // $response['status'] = "success";
        
        echo json_encode($response);
    }

    public function post_buletin_board(Request $request){
        $response = array();
        if($request->action == 'get-data'){
            $bulletin_board = BulletinBoard::find($request->id);
            $response['title'] = $bulletin_board->title;
            $response['description'] = $bulletin_board->description;
            $response['contributor'] = $bulletin_board->contributor;
            $response['link_url'] = $bulletin_board->link_url;
            $response['publish_status'] = $bulletin_board->publish_status;            
            $response['img_url'] = BulletinBoard::getBulletinBoard($request->id,'image_path');
        }else if($request->action != 'delete'){

            $param = $request->all();
            $rules = array(
                'img_url'   => 'image|mimes:jpeg,jpg,png',
                'title'   => 'required',
                'description'   => 'required',
                //'contributor'   => 'required',
                'link_url'   => 'url',
            );
            $validate = Validator::make($param,$rules);
            if($validate->fails()) {
                $this->validate($request,$rules);
            } else {
                    if($request->action == 'create'){
                        $bulletin_board = new BulletinBoard;
                    }else{
                        $bulletin_board = BulletinBoard::find($request->bulletin_board_id);                    
                    }
                    $bulletin_board->title = $request->title;
                    $bulletin_board->description = $request->description;
                    $bulletin_board->contributor = $request->contributor;
                    $bulletin_board->link_url = $request->link_url;
                    $bulletin_board->publish_status = $request->publish_status;

                    if($request->hasFile('image')) {
                        if($request->action == 'update'){                        
                            if($bulletin_board->img_url != ""){  
                            $image_path = public_path().'/storage/'.$bulletin_board->img_url;
                            unlink($image_path);
                            }
                        }
                        createdirYmd('storage');
                        $file = Input::file('image');            
                        $name = str_random(20). '-' .$file->getClientOriginalName();  
                        $bulletin_board->img_url = date("Y")."/".date("m")."/".date("d")."/".$name;          
                        $file->move(public_path().'/storage/'.date("Y")."/".date("m")."/".date("d")."/", $name);
                    }
              
                    $bulletin_board->save();
                    if($request->action == 'create'){
                        $response['notification'] = 'Success Create Bulletin Board';
                        $response['status'] = 'success';
                    }else{
                        $response['notification'] = 'Success Update Bulletin Board';
                        $response['status'] = 'success';
                    }
            }
        }else{            
            $bulletin_board = BulletinBoard::find($request->bulletin_board_id);
            if ($bulletin_board->delete()) {
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
        $bulletin_board = BulletinBoard::find($req->id);
        if ($bulletin_board->img_url != ""){
        echo '
                        <div class="form-group">
                            <div class="col-lg-3">Gambar</div>
                            <div class="col-lg-9">
                                <img src="'.asset('storage/'.$bulletin_board->img_url).'" class="img-responsive" >
                            </div>
                        </div>';
        }

        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Title</label>
                    <div class="col-lg-9">
                        '.$bulletin_board->title.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Description</label>
                    <div class="col-lg-9">
                        '.$bulletin_board->description.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Contributor</label>
                    <div class="col-lg-9">
                        '.$bulletin_board->contributor.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Link Url</label>
                    <div class="col-lg-9">
                        '.$bulletin_board->link_url.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
                if($bulletin_board->publish_status == "on")
                {
                    $publish_status = 'On';
                }else{
                    $publish_status = 'Off';
                }
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Publish Status</label>
                    <div class="col-lg-9">
                        '.$publish_status.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        
    }
}
