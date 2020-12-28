//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
    content:[]
  },
  //事件处理函数
  bindViewTap: function() {
   
  },
  // 页面初始化事件
  onLoad: function () {
    let that = this;
    wx.request({
      url: 'http://www.rikao.com/select',
      success(msg){
        // console.log(msg.data.data);
        that.setData({content:msg.data.data})
      } 
    })
  },
  read(e){
    // console.log(e.currentTarget.dataset.index);
    wx.navigateTo({
      url: '/pages/read/read?id='+e.currentTarget.dataset.index,
    })
  },
  getUserInfo: function(e) {
    
  }
})
