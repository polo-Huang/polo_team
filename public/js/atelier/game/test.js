$(document).ready(function(){
	var lotteryDrawBtn = $('.lottery-draw-btn');
	var presentMap = {0:'粉扑',1:'粉底液',2:'口红',3:'气垫cc',4:'蜗牛面膜',5:'普通面膜',6:'眼影',7:'指甲油',8:'芦荟胶',9:'化妆棉'};

  var countDownTime = 60;
  var sendBtn = $('.btn_send');
  var sendBtnHtml = sendBtn.html();
	var countDown = {
    timer: null,
    //请求数据
    countDownFunction: function () {
      lotteryDrawBtn.html(presentMap[parseInt(Math.random() * 10)]);
      sendBtn.html(countDownTime);
      countDownTime --;
      if (countDownTime == 0) {
        clearInterval(countDown.timer);
        countDownTime = 59;
		var num = parseInt(Math.random() * 1000);
        data = result(num);
        submit(data.result, data.level);
      }
    },
  };
  // 测试数据
	// var countA = 0;
	// var countB = 0;
	// var countC = 0;
	// var countD = 0;

  function result(num) {
		// 奖品的等级数量
		var levelCount = 4;
		// 奖品参数
		var presentArray = {
			0: {'chance': 55, 'bonus': 100},
			1: {'chance': 110, 'bonus': 50},
			2: {'chance': 275, 'bonus': 20},
			3: {'chance': 560, 'bonus': 10}
		}
  	var data;
		for (var i = levelCount - 1; i >= 0; i--) {
			if (0 <= num && num < presentArray[i].chance) {
				present = 100;
				lotteryDrawBtn.html('粉底液 碎片(1/4)');
				// countA ++;
				// alert(present);
				data = {result:'粉底液 碎片(1/4)',level:1};
			}
		}
		if (0 <= num && num < 55) {
			present = 100;
			lotteryDrawBtn.html('粉底液 碎片(1/4)');
			// countA ++;
			// alert(present);
			data = {result:'粉底液 碎片(1/4)',level:1};
		}
		if (55 <= num && num < 165) {
			present = 50;
			lotteryDrawBtn.html('普通面膜');
			// countB ++;
			// alert(present);
			data = {result:'普通面膜',level:2};
		}
		if (165 <= num && num < 440) {
			present = 20;
			lotteryDrawBtn.html('眼影 碎片(1/4)');
			// countC ++;
			// alert(present);
			data = {result:'眼影 碎片(1/4)',level:3};
		}
		if (440 <= num && num < 1000) {
			present = 10;
			lotteryDrawBtn.html('化妆棉');
			// countD ++;
			// alert(present);
			data = {result:'化妆棉',level:4};
		}
		return data;
	}
	function submit(result, level) {
		$('input[name=result]').val(result);
		$('input[name=level]').val(level);
		$('form').submit();
	}
	lotteryDrawBtn.click((e) => {
		console.log('点击');
		// 正式
		countDown.timer = setInterval(countDown.countDownFunction, 100);

		// 测试
		// for (var i = 1000; i >= 0; i--) {
		// 	result();
		// 	console.log(i);
		// 	if(i == 0) {
		// 		alert('一等奖：'+countA+';二等奖：'+countB+';三等奖：'+countC+';四等奖：'+countD);
		// 	}
		// }
		
	});
});