<?php

namespace App\Http\Controllers;
use App\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoriesController extends Controller
{
    function index()
    {
        $dataView =[];
        $objModel = new CategoriesModel();
        $dataView['list'] = $objModel->GetList();
        return view('backend.categories.index',$dataView);
    }
    function add(Request $request)
    {   
        $dataView = ['errs'=>[]];

        if($request->isMethod('post'))
        {
            $rule =
            [
                'txtname'=>'required',
                'txtstatus'=>'required'
            ];
            $msgE =
            [
                'txtname.required'=>'bạn cần nhập danh mục sản phẩm',
                'txtstatus.required'=>'bạn chọn trạng thái'
            ];
            $validator = Validator::make($request->all(),$rule,$msgE);
            if($validator->fails())
            {
                $dataView['errs'] = $validator->errors()->toArray();
            }
            //  echo "<pre>";
            // print_r($dataView['errs']);die;
            else
            {
                $dataSave = 
                [
                    'cate_name' =>$request->get('txtname'),
                    'status'=>$request->get('txtstatus')
                ];
                $objModel = new CategoriesModel();
                $newId = $objModel->Save($dataSave);
                if($newId>0)
                {
                    return redirect()->route('backend.categories.index');
                }
            }
        }

        return view('backend.categories.add',$dataView);
    }
    function edit($id, Request $request)
    {
        $dataView = ['errs'=>[]];
        $obj = CategoriesModel::where('id',$id)->first();
        $dataView['obj'] = $obj;

        if($request->isMethod('post'))
        {
            $rule =
            [
                'txtname'=>'required',
                'txtstatus'=>'required'
            ];
            $msgE =
            [
                'txtname.required'=>'bạn cần nhập danh mục sản phẩm',
                'txtstatus.required'=>'bạn chọn trạng thái'
            ];
            $validator = Validator::make($request->all(),$rule,$msgE);
            if($validator->fails())
            {
                $dataView['errs']=$validator->errors()->toArray();
            }
            else
            {
                $dataSave =
                [
                    'cate_name' =>$request->get('txtname'),
                    'status'=>$request->get('txtstatus')
                ];
                $objModel = new CategoriesModel();
                $rowUpdate = $objModel->update($id,$dataSave);
                if($rowUpdate>0)
                {
                    return redirect()->route('backend.categories.index');
                }
                else
                {
                    $dataView['errs'][]= ['không có gì để cập nhật'];
                }
            }
        }
        return view('backend.categories.edit',$dataView);
    }
    function delete($id)
    {   
        $dataView = ['errs'=>[]];
        $obj = CategoriesModel::where('id',$id)->first();
        $xoa = $obj->delete($id);
        if($xoa>0)
                {
                    return redirect()->route('backend.categories.index');
                }
                else
                {
                    $dataView['errs']= ['xóa thất bại'];
                }
        return view('backend.categories.delete',$dataView);
    }
}
