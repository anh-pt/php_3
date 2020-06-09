<?php

namespace App\Http\Controllers;
use App\ProductModel;
use App\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function index()
    {   $dataView = [];
        $objModelU = new ProductModel();
        $dataView['listU'] = $objModelU->GetList();
        
        return view('backend.product.index',$dataView);
    }

    public function add(Request $request)
    {       
        $dataView= ['errs'=>[]];
        if($request->isMethod('post'))
        {
            $rule = 
            [
              'txtname' => 'required',
              'txtdetail'=>'required',
              'txtprice'=>'required'
            ];
            $msgE =
            [
                'txtname.required'=>'bạn nên nhập tên sản phẩm',
                'txtdetail.required'=>'bạn cần nhập chi tiết sản phẩm',
                'txtprice.required'=>'bạn cần nhập giá'
                
            ];
            $validator = Validator::make($request->all(),$rule,$msgE);

            if($validator->fails())
            {
                $dataView['errs'] = $validator->errors()->toArray();
               
            }
            // echo "<pre>";
            // print_r($dataView['errs']);die;
            else
            {   
                $objModel = new ProductModel();
                $dataSave = [];
                if($request->hasFile('f_up_image'))
                {
                    $file = $request->file('f_up_image');
                    $folder_image ='img';
                    $file->move($folder_image,$file->getClientOriginalName());
                    $file_url = $folder_image."/".$file->getClientOriginalName();
                    $dataSave['imager'] = $file_url;
                }

                $dataSave['name'] = $request->get('txtname');
                $dataSave['detail'] = $request->get('txtdetail');
                $dataSave['price'] = $request->get('txtprice');
                // var_dump($dataSave);die;
                
                $newId = $objModel->Save($dataSave);
                if($newId>0)
                {
                    return redirect()->route('backend.product.index');
                }
                else
                {
                    $dataView['errs'][] = ['không ghi được csdl'];
                }
            }
        }
        
        return view('backend.product.add',$dataView);
    }
    // function getIdCate()
    // {
    //     $cate = CategoriesModel::find($this->cate_id);

    //     return view('backend.product.index',$dataView);
    // }
   public function edit($id,Request $request)
   {
        $dataView= ['errs'=>[]];
        $obj = ProductModel::where('id',$id)->first();
        $dataView['obj'] = $obj;
        if($request->isMethod('post'))
        {
            $rule = 
            [
            'txtname' => 'required',
            'txtdetail'=>'required',
            'txtprice'=>'required'
            ];
            $msgE =
            [
                'txtname.required'=>'bạn nên nhập tên sản phẩm',
                'txtdetail.required'=>'bạn cần nhập chi tiết sản phẩm',
                'txtprice.required'=>'bạn cần nhập giá'
                
            ];
            $validator = Validator::make($request->all(),$rule,$msgE);

            if($validator->fails())
            {
                $dataView['errs'] = $validator->errors()->toArray();
            
            }
            // echo "<pre>";
            // print_r($dataView['errs']);die;
            else
            {   $dataSave = [];
                $objModel = new ProductModel();


                if($request->hasFile('f_up_image'))
                {
                    $file = $request->file('f_up_image');
                    $folder_image ='img';
                    $file->move($folder_image,$file->getClientOriginalName());
                    $file_url = $folder_image."/".$file->getClientOriginalName();
                    $dataSave['imager'] = $file_url;
                }

                $dataSave['name'] = $request->get('txtname');
                $dataSave['detail'] = $request->get('txtdetail');
                $dataSave['price'] = $request->get('txtprice');
                
                $rowUpdate = $objModel->update($id,$dataSave);
                if($rowUpdate>0)
                    {
                        return redirect()->route('backend.product.index');
                    }
                    else
                    {
                        $dataView['errs'][]= ['không có gì để cập nhật'];
                    }
                    
            }
            
        }
        return view('backend.product.edit',$dataView);
   }
   function delete($id)
    {   
        $dataView = ['errs'=>[]];
        $obj = ProductModel::where('id',$id)->first();
        $xoa = $obj->delete($id);
        if($xoa>0)
                {
                    return redirect()->route('backend.product.index');
                }
                else
                {
                    $dataView['errs']= ['xóa thất bại'];
                }
        return view('backend.product.delete',$dataView);
    }
}  