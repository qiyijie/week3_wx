<?php

namespace app\movie\controller;

use app\movie\model\Comment;
use app\movie\model\Movies;
use think\Controller;
use think\Request;

class Movie extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //展示电影列表
        $data = Movies::select()->toArray();
        if ($data){
            return json(['code'=>200,'msg'=>'success','data'=>$data]);
        }else{
            return json(['code'=>500,'msg'=>'error','data'=>null]);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $param = $request->param();
        $param['u_id'] = 1;
        if (Comment::create($param,true)){
            $data = Comment::field('comment')->where('m_id',$param['m_id'])->select()->toArray();
            if ($data){
                return json(['code'=>200,'msg'=>'success','data'=>$data]);
            }else{
                return json(['code'=>500,'msg'=>'error','data'=>null]);
            }
        }else{
            return json(['code'=>403,'msg'=>'error','data'=>null]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read()
    {
        $id = input('id');
         $data = Movies::field('movies.*,count(m_id) as count')
            ->join('Comment','movies.id = m_id')
             ->where('id',$id)
            ->group('movies.id')
            ->find()->toArray();
        if ($data){
            return json(['code'=>200,'msg'=>'success','data'=>$data]);
        }else{
            return json(['code'=>500,'msg'=>'error','data'=>null]);
        }
    }
    /**
     * 评论的接口
     */
    public function comment(){
        $id = input('id');
        $data = Comment::field('comment')->where('m_id',$id)->select()->toArray();
        if ($data){
            return json(['code'=>200,'msg'=>'success','data'=>$data]);
        }else{
            return json(['code'=>500,'msg'=>'error','data'=>null]);
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
