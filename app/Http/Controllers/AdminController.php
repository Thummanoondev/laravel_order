<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\FR_MK_01;
use App\Models\FR_MK_02;
use App\Models\FR_MK_05;
use App\Models\DataTable;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

   
    function add_customer(Request $request){

          
        return view('add_customer');
    }
    function add_customer_insert(Request $request){
            $data = [
                'name' => $request->input('name')?? '',
                'email' => $request->input('email')?? '',
                'phone' => $request->input('phone')?? '',
                'adress' => $request->input('adress')?? ''
            ];
            DB::table('customer')->insert($data);
            return redirect()->route('add_customer.index')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
     
  
    return view('add_customer');
}


    function customer() {
        $users = DB::table('customer')
        ->selectRaw('*, (select count(name_c) from FR_MK_02 where name_c = customer.name) as cnt_order')
        ->get();
       // $users = DB::table('customer')leftJoin('FR_MK_02','FR_MK_02.name_c' , '=' , 'customer.name_customer')grou
        return view('customer', ['users' => $users]);
    }
   
    function order_insert(Request $request){   
    
        $data = [
            'name_c' => $request->input('customer_name')?? '',
            'id_code' => $request->input('id_code')?? '',
            'name_car' => $request->input('car_name')?? '',
            'K_N' => $request->input('kind')?? '',
            'screen' => $request->input('screen')?? '',
            'color' => $request->input('color')?? '',
            'type' => $request->input('cutting_type')?? '',
            'side' => $request->input('side')?? '',
            'thick' => $request->input('thick')?? '',
            'cnt_order' => $request->input('qty')?? '0',
            'wide' => $request->input('width')?? '',
            'long_side' => $request->input('length')?? '',
            'date_get' => $request->input('date_get')?? '',
            'note' => $request->input('note')?? '',
            'mk05' => $request->has('FR_MK_05') ? 1 : 0,
            'stm' => date('Y/m/d'),
            'c_get' => '0',
            'uname' => session('loginId')
            
        ];
        $mk01=[
            'timestp' => date('Y/m/d')
        ];

        if($request->has('FR_MK_05')){
            DB::table('FR_MK_05')->updateOrInsert(
                ['timestp' => $mk01['timestp']],
                $mk01
            );// ไม่เพิ่มข้อมูลซ้ำ
        }
        
        if ($request->hasFile('image')) {


            $imageName = time().'.'.$request->image->extension();
             $data['img']  =  'images/'.$imageName;
            // Public Folder
            $request->image->move(public_path('images'), $imageName);
         // $data['img'] = $request->file('image')->store('images', 'public');
        }else{
            $data['img'] = '';
        }
       
        DB::table('FR_MK_01')->updateOrInsert(
            ['timestp' => $mk01['timestp']],
            $mk01
        );// ไม่เพิ่มข้อมูลซ้ำ
        DB::table('FR_MK_02')->insert($data);
        return redirect()->route('order')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
      
    }


    function doc01_edit($index, Request $request){
        if($request->ajax()) {
            $date = str_replace('-', '/', $index);
             $doc01 = FR_MK_02::query()
                ->where('stm', $date)->orderBy('stm', 'DESC')->get();
               
                $doc01 = $doc01->map(function ($item, $key) {
                    $item['No'] =  'รายการ#'. $key + 1 ;
                    return $item;
                });
               // สร้างคำสั่ง query แบบ Eloquent
               return DataTables::of($doc01)->addColumn('check', function($data){ 
                $button = '<input type="checkbox" class="form-control" id="checkbox_' . $data->id . '" name="check[]" value="' . $data->id . '">';
                return $button;  
            })->addColumn('doc02', function($data){
                $button = '<a class="btn  btn-primary btn-sm" target="_blank" href="' . route('doc02_pdf.index', $data->id) . '" data-id="' . $data->id . '" >  <i class="far fa-file-pdf" style="font-size:20px;color:red" ></i> แสดงเอกสาร FR_MK_02</a>';
                return  $button ;
            })->rawColumns(['check','doc02'])->make(true); // สร้าง DataTables instance จากข้อมูลและส่งกลับเป็น JSON
                
        }
    
        return view('doc01_edit', ['index' => $index]);
    }
    function update_date_doc01(Request $request){

        if($request->ajax()) {
            $selectedItems = $request->input('check');
            $date = $request->input('stm');
            $date = str_replace('-', '/', $date);
            $newDate = date("Y/m/d", strtotime($date));
            $mk01=[
                'timestp' => $newDate
            ];
            DB::table('FR_MK_01')->updateOrInsert($mk01); // ไม่เพิ่มข้อมูลซ้ำ
          
        if(!empty($selectedItems)) {
        // วนลูปเพื่อดำเนินการตามต้องการ
        foreach($selectedItems as $itemId) {
            FR_MK_02::where('id', $itemId)->update(['stm' => "$newDate"]);
        }   
     }
    // return response()->json(['success' => true]);
    return response()->json(['success' => true]);
    } 
  }

    function order_update(Request $request){
        $data = [
            'name_c' => $request->input('customer_name')?? '',
            'id_code' => $request->input('id_code')?? '',
            'name_car' => $request->input('car_name')?? '',
            'K_N' => $request->input('kind')?? '',
            'screen' => $request->input('screen')?? '',
            'color' => $request->input('color')?? '',
            'type' => $request->input('cutting_type')?? '',
            'side' => $request->input('side')?? '',
            'thick' => $request->input('thick')?? '',
            'cnt_order' => $request->input('qty')?? '0',
            'wide' => $request->input('width')?? '',
            'long_side' => $request->input('length')?? '',
            'date_get' => $request->input('date_get')?? '',
            'note' => $request->input('note')?? '',
            'mk05' => $request->has('FR_MK_05') ? 1 : 0,
            'stm' => date('Y/m/d'),
            'c_get' => '0',
            'uname' => session('loginId')
            
        ];
       
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $data['img']  =  'images/'.$imageName;
           // Public Folder
           $request->image->move(public_path('images'), $imageName);
        }else{
            
        }
        $mk01=[
            'timestp' => date('Y/m/d')
        ];
        $path_img =  FR_MK_02::query()->where('id',$request->id)->first();
        $filePath = public_path($path_img->img);
        if (File::exists($filePath)) {
            // ลบไฟล์
            File::delete($filePath);
           
        } 
        DB::table('FR_MK_02')->where('id',$request->id)->update($data);
        return redirect()->route('order_edit.index', $request->id)  ->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
 
    function order_edit($index){
        $data = FR_MK_02::query()->where('id', $index)->first();
        $id_code = FR_MK_02::orderBy('stm', 'DESC')->first();
        $customer = DB::table('customer')->get();
        return view('order_edit', ['id_code' => $id_code->id_code, 'customer' => $customer,'data' => $data]);
    }

    function testimg($index = '193')
    {
        $doc02 = FR_MK_02::query()->where('id', $index)->first();
        $pdf = PDF::loadView('testimg', ['doc02' => $doc02]);
        $pdf->set_option('isHtml5ParserEnabled', true);
        $pdf->set_option('isRemoteEnabled', true);
        return $pdf->setPaper('a5', 'landscape')->stream();

  //return view('testimg');
       
    }
    
    function order(){
        $id_code = FR_MK_02::orderBy('stm', 'DESC')->first();
        $customer = DB::table('customer')->get();
        return view('order', ['id_code' => $id_code->id_code, 'customer' => $customer]);

    }
    
    function doc01(Request $request) {
        if($request->ajax()) {
            $data = FR_MK_01::leftJoin('FR_MK_02', 'FR_MK_01.timestp', '=', 'FR_MK_02.stm')
                ->select('FR_MK_01.timestp', DB::raw('COUNT(FR_MK_02.stm) AS stm_count'))
                ->groupBy('FR_MK_01.timestp')
                ->having(DB::raw('COUNT(FR_MK_02.stm)'), '>', 0)
                ->orderBy('FR_MK_01.timestp', 'desc')
                ->get();
        
             // สร้างคำสั่ง query แบบ Eloquent
            $data = $data->map(function ($item, $key) {
                $item['No'] =  'รายการ#'. $key + 1 ;
                return $item;
            });
            return DataTables::of($data)->addColumn('doc', function($data){ 
                $button = '<a class="btn btn-info btn-sm" data-id="' . $data->timestp . '"  target="_blank" href="' . route('doc01_pdf.index', str_replace('/', '-', $data->timestp)) . '"> <i class="far fa-file-image" style="font-size:20px;color:red"></i>แสดงเอกสาร</a>';
                return $button;  
            })->addColumn('edit', function($data){ 
                $button = '<a class="btn btn-warning btn-sm" data-id="' . $data->timestp . '"   href="' . route('doc01_edit.index', str_replace('/', '-', $data->timestp)) . '"> <i class="far fa-file-image" style="font-size:20px;color:red"></i>แก้ไขเอกสาร</a>';
                return $button;  
            })->addColumn('del', function($data){ 
                if(session('permission')== 1) {
                    $button = '<a class="btn btn-danger btn-sm" data-id="' . $data->timestp . '"  target="_blank" href="' . route('doc01_pdf.index', str_replace('/', '-', $data->timestp)) . '"> <i class="far fa-file-image" style="font-size:20px;color:red"></i>ลบเอกสารวันที่ '.$data->timestp .'</a>';
                    return $button;  
                } else {
                    $button = '<a class="btn btn-secondary disabled  btn-sm" data-id="' . $data->timestp . '" disabled>
                    <i class="far fa-file-image" style="font-size:20px;color:red"></i>ลบเอกสารวันที่ ' . $data->timestp . '
                </a>';
                return $button;
                }
               
            })  ->rawColumns(['doc','edit','del' ])->make(true);
        }
        return view('doc01');
    }
    function doc02(Request $request) {
        if($request->ajax()) {
            // ดึงข้อมูลจากฐานข้อมูล
            $data = FR_MK_02::orderBy('stm', 'DESC')->orderBy('id', 'DESC');
    
            // เพิ่มฟิลด์ "เลขลำดับ" เข้าไปในข้อมูล
            $data = $data->get()->map(function ($item, $key) {
                $item['No'] =  '#'. $key + 1  . '<br />วันที่ : ' .$item->stm .  '<br />รหัสแบบ : <a style="color:red;">'.$item->id_code .'</a>';
                return $item;
            });
    
            // ส่งข้อมูลกลับในรูปแบบ JSON ผ่าน DataTables
            return DataTables::of($data)->addColumn('doc02', function($data){
                $button = '<a class="btn  btn-primary btn-block" target="_blank" href="' . route('doc02_pdf.index', $data->id) . '" data-id="' . $data->id . '" >  <i class="far fa-file-pdf" style="font-size:20px;color:red" ></i> แสดงเอกสาร FR_MK_02</a>';
                return  $button ;
            })->addColumn('sticker', function($data){
                $button = '<a class="btn btn-info btn-block" target="_blank" href="' . route('sticker.index', $data->id) . '"  "> <i class="far fa-file-image" style="font-size:20px;color:red" ></i> พิมพ์สติ๊กเกอร์</button>';
                return  $button ;
            })->addColumn('edit', function($data){
                $button = '<a class="btn btn-warning btn-block" target="_blank" href="' . route('order_edit.index', $data->id) . '" " >แก้ไข</button>';
                return  $button ;
            })->addColumn('delete', function($data){
                if(session('permission')== 1) {
                    $button = '<a class="btn btn-danger btn-block" data-id="' . $data->id . '" >ลบ</button>';
                return  $button ;
                } else {
                    $button = '<a class="btn btn-secondary disabled  btn-sm btn-block" data-id="' . $data->timestp . '" disabled>
                    <i class="far fa-file-image" style="font-size:20px;color:red"></i>ลบเอกสาร 
                </a>';
                return $button;
                }
              
            })->addColumn('img', function($data){
                if($data->img){
           
                    $imgUrl = '<img src="' . asset('public/'.$data->img) . '" alt="รูปภาพ" style="width:100px">';
                }else{
                    $imgUrl = '';
                }
                
                return  $imgUrl;
            })->rawColumns(['doc02', 'sticker', 'edit', 'delete', 'No', 'img'])
            ->make(true);


        }
        return view('doc02');
    }
    function doc05(Request $request) {
        if($request->ajax()) {
                    
                    $data = FR_MK_05::leftJoin('FR_MK_02', function($join) {
                        $join->on('FR_MK_05.timestp', '=', 'FR_MK_02.stm')
                             ->where('FR_MK_02.mk05', '=', 1);
                    })
                    ->select('FR_MK_05.timestp', DB::raw('COUNT(FR_MK_02.stm) AS stm_count'))
                    ->groupBy('FR_MK_05.timestp')
                    ->havingRaw('COUNT(FR_MK_02.stm) > 0')
                    ->orderBy('FR_MK_05.timestp', 'desc')
                    ->get();
                 // สร้างคำสั่ง query แบบ Eloquent
                $data = $data->map(function ($item, $key) {
                    $item['No'] =  'รายการ#'. $key + 1 ;
                    return $item;
                });
                        return DataTables::of($data)->addColumn('doc', function($data){ 
                            $button = '<a class="btn btn-info btn-sm btn-block" data-id="' . $data->timestp . '"  target="_blank" href="' . route('doc05_pdf.index', str_replace('/', '-', $data->timestp)) . '"> <i class="far fa-file-image" style="font-size:20px;color:red"></i>แสดงเอกสาร</a>';
                            return $button;  
                        })->addColumn('edit', function($data){ 
                            $button = '<a class="btn btn-warning btn-sm btn-block" data-id="' . $data->timestp . '"   href="' . route('doc05_edit.index', str_replace('/', '-', $data->timestp)) . '"> <i class="far fa-file-image" style="font-size:20px;color:red"></i>แก้ไขเอกสาร</a>';
                            return $button;  
                        })->addColumn('del', function($data){ 
                            if(session('permission')== 1) {
                                $button = '<a class="btn btn-danger btn-sm btn-block" data-id="' . $data->timestp . '"  target="_blank" href="' . route('doc01_pdf.index', str_replace('/', '-', $data->timestp)) . '"> <i class="far fa-file-image" style="font-size:20px;color:red"></i>ลบเอกสารวันที่ '.$data->timestp .'</a>';
                                return $button;  
                            } else {
                                $button = '<a class="btn btn-secondary disabled  btn-sm btn-block" data-id="' . $data->timestp . '" disabled>
                                <i class="far fa-file-image" style="font-size:20px;color:red"></i>ลบเอกสารวันที่ ' . $data->timestp . '
                            </a>';
                            return $button;
                            }
                           
                        })->rawColumns(['doc','edit','del' ])->make(true);


        }
        return view('doc05');
    }

    function doc05_edit($index, Request $request){
        
        if($request->ajax()) {
            $date = str_replace('-', '/', $index);
             $doc01 = FR_MK_02::query()
                ->where('stm', $date)->where('mk05', 1)->orderBy('stm', 'DESC')->get();
               
                $doc01 = $doc01->map(function ($item, $key) {
                    $item['No'] =  '#'. $key + 1  . '<br />วันที่ : ' .$item->stm .  '<br />รหัสแบบ : <a style="color:red;">'.$item->id_code .'</a>';
                    return $item;
                });
               // สร้างคำสั่ง query แบบ Eloquent
               return DataTables::of($doc01)->addColumn('check', function($data){ 
                $button = '<input type="checkbox" class="form-control" id="checkbox_' . $data->id . '" name="check[]" value="' . $data->id . '">';
                return $button;  
            })->addColumn('doc02', function($data){
                $button = '<a class="btn  btn-primary btn-sm btn-block" target="_blank" href="' . route('doc02_pdf.index', $data->id) . '" data-id="' . $data->id . '" >  <i class="far fa-file-pdf" style="font-size:20px;color:red" ></i> แสดงเอกสาร FR_MK_02</a>';
                return  $button ;
            })->rawColumns(['check','doc02','No'])->make(true); // สร้าง DataTables instance จากข้อมูลและส่งกลับเป็น JSON
                
        }
    
        return view('doc05_edit', ['index' => $index]);
    }
    function update_date_doc05(Request $request){

        if($request->ajax()){
            $selectedItems = $request->input('check');
        if(!empty($selectedItems)) {
        // วนลูปเพื่อดำเนินการตามต้องการ
        foreach($selectedItems as $itemId) {
            FR_MK_02::where('id', $itemId)->update(['mk05' => "0"]);
        }   
         }
    // return response()->json(['success' => true]);
      return response()->json(['success' => true]);
        }

    }

      
}