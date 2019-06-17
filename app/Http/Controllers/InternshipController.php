<?php

namespace App\Http\Controllers;

use App\Internship;
use Illuminate\Http\Request;
use Auth;
class InternshipController extends  Controller{
    //学生列表
    public function  index(Request $request){

        $where =function($query)use ($request){
            if($request->has('keyword') and $request->keyword!=''){
                $search ="%".$request->keyword."%";
                $query->where('name','like',$search);
            }
        };
        $internships=Internship::where($where)->paginate(10);
        return view('internship.query',['internships' => $internships,]);
    }
    public function mycreate(){
        $internships = Internship::where('boss', '=', Auth::id())->paginate(10);
        return view('internship.mycreate',[
            'internships'=>$internships,
        ]);
    }
    //新增页面
    public function create(Request $request){
        $internship = new Internship();

        if($request->isMethod('POST')){

            //1.控制器验证
            /*$this->validate($request,[
               'Student.name'=>'required|min:2|max:20',
               'Student.age' =>'required|integer',
               'Student.sex' =>'required|integer',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute长度不符合要求',
                'integer'=>':attribute必须为整数',
            ],[
                'Student.name'=>'姓名',
                'Student.age' =>'年龄',
                'Student.sex' =>'性别'
            ]);*/

            //2.Validator类验证
            $validator = \Validator::make($request->input(),[
                'Internship.name'=>'required|min:2|max:200',
                'Internship.company' =>'required|min:2|max:200',
                'Internship.detail' =>'required|min:2|max:900',
                'Internship.contact' =>'required|min:2|max:200',

            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute长度不符合要求',
                'integer'=>':attribute必须为整数',
            ],[
                'Internship.name'=>'岗位名称',
                'Internship.company' =>'公司',
                'Internship.detail' =>'详情',
                'Internship.contact' =>'联系方式',

            ]);

            //withInput保持数据
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->input('Internship');
            $data['boss']=Auth::id();

            if(Internship::create($data)){
                return redirect('internship/index')->with('success','添加成功');
            }else{
                return redirect()->back();
            }
        }

        return view('internship.create',[
            'internship'=>$internship,
        ]);
    }

    //保存数据操作
    public function save(Request $request){
        $data = $request->input('Internship');
        $internship = new Internship();
        $internship->name = $data['name'];
        $internship->company = $data['company'];
        $internship->detail = $data['detail'];
        $internship->contact = $data['contact'];
        $internship->boss=$data['boss'];
        if($internship->save()){
            return redirect('internship/index');
        }else{
            return redirect()->back();
        }
    }

    //更新数据操作
    public function update(Request $request,$id){
        $internship = Internship::find($id);

        if($request->isMethod('POST')){
            //Validator类验证
            $validator = \Validator::make($request->input(),[
                'Internship.name'=>'required|min:2|max:200',
                'Internship.company' =>'required|min:2|max:200',
                'Internship.detail' =>'required|min:2|max:200',
                'Internship.contact' =>'required|min:2|max:200',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute长度不符合要求',
                'integer'=>':attribute必须为整数',
            ],[
                'Internship.name'=>'岗位名称',
                'Internship.company' =>'公司',
                'Internship.detail' =>'详情',
                'Internship.contact' =>'联系方式',
            ]);

            //withInput保持数据
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->input('Internship');
            $internship->name = $data['name'];
            $internship->company = $data['company'];
            $internship->detail  = $data['detail'];
            $internship->contact  = $data['contact'];
            if($internship->save()){
                return redirect('internship/mycreate')->with('success','修改成功-'.$id);
            }
        }
        return view('internship.update',[
            'internship'=>$internship,
        ]);
    }

    //信息详情
       public function detail($id){
        $internship = Internship::find($id);
        return view('internship.detail',[
            'internship'=>$internship,
        ]);
    }

    //删除操作
    public function destroy($id){
    $internship = Internship::find($id);

    if($internship->delete()){
        return redirect('internship/mycreate')->with('success','删除成功-'.$id);
    }else{
        return redirect('internship/mycreate')->with('error','删除失败-'.$id);
    }
}

}