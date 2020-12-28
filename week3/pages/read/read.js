// pages/read/read.js
Page({

     /**
      * 页面的初始数据
      */
     data: {
          m_id:'',
          content:[],
          comment:[]
     },

     /**
      * 生命周期函数--监听页面加载
      */
     onLoad: function (options) {
          let that = this;
           let id = options.id;
           this.setData({m_id:id})
           wx.request({
             url: 'http://www.rikao.com/read',
             data:{id:id},
             success(msg){
               //    console.log(msg.data.data);
                  that.setData({content:msg.data.data,m_id:options.id})
             }
           });

          
           wx.request({
             url: 'http://www.rikao.com/comment',
             data:{id:options.id},
           success(msg){
               //  console.log(msg.data.data);
                that.setData({comment:msg.data.data})
           }
           })
     },

     /**
      * 写评论
      */
     submit(e){
          let that = this;
          let id = this.data.m_id;
          console.log(id);
          console.log(e.detail.value.comment);
          wx.request({
               url: 'http://www.rikao.com/save',
            method:'POST',
            data:{comment:e.detail.value.comment,m_id:id},
            success(msg){
                 console.log(msg.data.data);
                 that.setData({comment:msg.data.data})
            }
          })
     },
     /**
      * 生命周期函数--监听页面初次渲染完成
      */
     onReady: function () {

     },

     /**
      * 生命周期函数--监听页面显示
      */
     onShow: function () {
       
     },

     /**
      * 生命周期函数--监听页面隐藏
      */
     onHide: function () {

     },

     /**
      * 生命周期函数--监听页面卸载
      */
     onUnload: function () {

     },

     /**
      * 页面相关事件处理函数--监听用户下拉动作
      */
     onPullDownRefresh: function () {

     },

     /**
      * 页面上拉触底事件的处理函数
      */
     onReachBottom: function () {

     },

     /**
      * 用户点击右上角分享
      */
     onShareAppMessage: function () {

     }
})