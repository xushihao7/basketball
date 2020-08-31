<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Model\BannerModel;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    /**
     * 轮播图列表
     * User: xsh
     * Date: 2020/7/22
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  bannerShow(){
        return view('admin.banner.list');
    }

    public function bannerList(Request $request){
        $limit=$request->input('limit');
        $page=$request->input('page');
        $bannerList=BannerModel::offset(($page-1)*$limit)->limit($limit)->get();
        $bannerList=$this->objectToArray($bannerList);
        $count=BannerModel::count();
        $data=[
            'code'=>0,
            'msg'=>'',
            'data'=>$bannerList,
            'count'=>$count
        ];
        $this->json($data);
    }
}
