<?php

namespace App\Http\Controllers;
use App\ProductModel;
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
                echo "<pre>";
                print_r($dataView['errs']);die;
            }
            // echo "<pre>";
            // print_r($dataView['errs']);die;
            else
            {
                $dataSave = 
                [
                    'name'=>$request->get('txtname'),
                    'detail' =>$request->get('txtdetail'),
                    'price'=>$request->get('txtprice')
                ];
                // var_dump($dataSave);die;
                $objModel = new ProductModel();
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

}
