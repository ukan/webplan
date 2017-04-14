<?php

namespace App\Http\Controllers\Backend\Admin\Organization;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Admin\BaseController;
use App\Models\Proker;
use App\Models\Bidang;
use Input;
use Validator;

class ProkerController extends Controller
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
        $bidang = Bidang::select('id','nama_bidang')->get();
        
        return view('backend.admin.proker-management.index')->with('bidang',$bidang);
    }

    public function datatables()
    {
        $eloq = Proker::selectRaw('proker.id,
                                    bidang.nama_bidang,
                                    proker.proker_bulanan')
                 ->leftJoin('bidang','bidang.id','=','proker.bidang_id')
                 ->orderBy('proker.id')->get();

         return datatables($eloq)
                ->addColumn('action', function ($proker) {
                    $quote = "'";
                    return
                    ' 
                    <a href="javascript:show_proker('.$proker->id.')" class="btn btn-info btn-xs" title="View"><i class="fa fa-search fa-fw"></i></a>
                    <a onclick="javascript:show_form_update('.$quote.$proker->id.$quote.')" class="btn btn-warning btn-xs" title="Update"><i class="fa fa-pencil-square-o fa-fw"></i></a>
                    <a onclick="javascript:show_form_delete('.$quote.$proker->id.$quote.')" class="btn btn-danger btn-xs actDelete" title="Delete"><i class="fa fa-trash-o fa-fw"></i></a>'
                    ;
                })
                ->make(true);
    }

    public function get_data(Request $request){
        
        $response = array();
        $prokerData = Book::find($request->id);   

        $response['id'] = $prokerData->id;
        echo json_encode($response);   
    }

    public function post_proker(Request $request){
        $response = array();
        if($request->action == 'get-data'){
            $proker = Proker::find($request->id);
            $response['bidang'] = $proker->bidang_id;
            $response['proker_mingguan'] = $proker->proker_mingguan;            
            $response['proker.bulanan'] = $proker->proker_bulanan;
            $response['proker_tahunan'] = $proker->proker_tahunan;            
            $response['proker_kondisional'] = $proker->proker_kondisional;            
        }else if($request->action != 'delete'){

            $param = $request->all();
            $rules = array(
                'bidang'   => 'required',
                'proker_mingguan'   => 'required',
                'proker_bulanan'   => 'required',
                'proker_tahunan'   => 'required',
                'proker_kondisional'   => 'required',
            );
            $validate = Validator::make($param,$rules);
            if($validate->fails()) {
                $this->validate($request,$rules);
            } else {
                    if($request->action == 'create'){
                        $proker = new Proker;
                    }else{
                        $proker = Proker::find($request->proker_id);                    
                    }
                    $proker->bidang_id = $request->bidang;
                    $proker->proker_mingguan = $request->proker_mingguan;
                    $proker->proker_bulanan = $request->proker_bulanan;
                    $proker->proker_tahunan = $request->proker_tahunan;
                    $proker->proker_kondisional = $request->proker_kondisional;
              
                    $proker->save();

                    if($request->action == 'create'){
                        $response['notification'] = 'Success Create Data';
                        $response['status'] = 'success';
                    }else{
                        $response['notification'] = 'Success Update Data';
                        $response['status'] = 'success';
                    }
            }
        }else{            
            $proker = Proker::find($request->proker_id);
            if ($proker->delete()) {
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
        $proker = Proker::selectRaw('
                                    proker.id,
                                    bidang.nama_bidang,
                                    proker.proker_mingguan,
                                    proker.proker_bulanan,
                                    proker.proker_tahunan,
                                    proker.proker_kondisional')
                 ->leftJoin('bidang','bidang.id','=','proker.bidang_id')
                 ->where('proker.id','=',$req->id)
                 ->get()->first();

        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Bidang</label>
                    <div class="col-lg-9">
                        : '.$proker->nama_bidang.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Proker Mingguan</label>
                    <div class="col-lg-9">
                        : '.$proker->proker_mingguan.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Proker Bulanan</label>
                    <div class="col-lg-9">
                        : '.$proker->proker_bulanan.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Proker Tahunan</label>
                    <div class="col-lg-9">
                        : '.$proker->proker_tahunan.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Proker Kondisional</label>
                    <div class="col-lg-9">
                        : '.$proker->proker_kondisional.'                        
                    </div>
                    <div class="clear"></div>
                </div>';
    }
}