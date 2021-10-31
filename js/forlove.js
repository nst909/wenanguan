function cls() {
	$(".ncmask").fadeOut(200);
}

function closes() {
	$(".hidemask").fadeOut();
	$(".hidemask2").fadeOut();
}
$(function() {
	$(".jzan").live('click', function() {
		var zann = $(this).children("span");
		$.post(URL + '/zan.php', { gid: zann.attr("id") },
			function(data) {
				if (data != 1) {
					$(".notic").html("点赞失败你已经点赞过");
					$(".notic").fadeIn().delay(1000).fadeOut();
				} else {
					$(".notic").html("点赞成功");
					$(".notic").fadeIn().delay(1000).fadeOut();
					zann.html(parseInt(zann.html()) + 1);
				}
			});
	});
	$(".pjiao").live('click', function() {
		var id = $(this).attr("id");
		var content = $(this).prev().val();
		var objcontent = $(this).prev();
		var adds = $(this).parent().parent().parent().find("ul");
		if (content == "") {
			$(".notic").html("请填写内容");
			$(".notic").fadeIn().delay(1000).fadeOut();
		} else if (content.length > 100) {
			$(".notic").html("内容填写过多，请删减后再提交");
			$(".notic").fadeIn().delay(1000).fadeOut();
		} else {
			$.post(URL + '/reply.php', { reply: content, id: id },
				function(data) {
					if (data == -1) {
						$("#hiid").attr("value", id);
						$("#hireply").attr("value", content);
						objcontent.attr("value", "");
						$(".hidemask2").fadeIn();
					} else {
						objcontent.attr("value", "");
						var addhtml = '<li class="replys"><span class="replyname">我的评论</span>：' + content + '</li>';
						adds.prepend(addhtml);
						$(".notic").html("评论提交成功");
						$(".notic").fadeIn().delay(1000).fadeOut();
					}
				})
		}
	});
	$(".hisu").live('click', function() {
		var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
        var qq_str = /^\d{5,12}$/;
		if ($("#email").val() == "" || $("#realname").val() == "") {
			$(".notic").html("请填写完成所有信息后提交");
			$(".notic").fadeIn().delay(1000).fadeOut();
		} else if (!qq_str.test($("#qq").val()) && !search_str.test($("#qq").val())) {
			$(".notic").html("QQ号码格式错误");
			$(".notic").fadeIn().delay(1000).fadeOut();
		} else {
			$(".hisu").attr("disabled", "disabled");
			$(".hisu").attr("value", "正在发布评论...");
			var pos = "#reply-" + $("#hiid").attr("value");
			var content = $("#hireply").attr("value");
			var addhtml = '<li class="replys"><span class="replyname">我的评论</span>：' + content + '</li>';
			$(pos).prepend(addhtml);
			$.post(URL + '/reply.php', $("#reply2").serialize(),
				function(data) {
					if (data == 1) {
						$(".hidemask2").fadeOut();
						$(".hisu").removeAttr("disabled");
						$(".notic").html("评论提交成功");
						$(".notic").fadeIn().delay(1000).fadeOut();
					} else {
						$(".hidemask2").fadeOut();
						$(".hisu").removeAttr("disabled");
						$(".notic").html("评论失败，数据库错误，请联系管理员");
						$(".notic").fadeIn().delay(1000).fadeOut();
					}
				}
			)
		}
	});
	$(".butt").live('click', function() {
		$(".hidemask").fadeIn();
	});
	$(".hidegaobaisubmit").live('click', function() {
		var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
	    if ($("#gcontent").val().length > 1400) {
			$(".notic").html("告白内容过多，请保持内容在1000个字以内。");
			$(".notic").fadeIn().delay(1000).fadeOut();
		} else {
			$(".hidegaobaisubmit").attr("disabled", "disabled");
			$(".hidegaobaisubmit").attr("value", "正在提交数据...");
			$.post(URL + '/gaobai.php', $("#gaobai").serialize(),
				function(data) {
					if (data == 0) {
						$(".notic").html("请填写所有内容后提交");
						$(".notic").fadeIn().delay(1000).fadeOut();
						$(".hidegaobaisubmit").removeAttr("disabled");
						$(".hidegaobaisubmit").attr("value", "发布");
					} else if (data == -2) {
						$(".notic").html("IP地址被临时锁定，请稍后发布消息");
						$(".notic").fadeIn().delay(1000).fadeOut();
						$(".hidegaobaisubmit").removeAttr("disabled");
						$(".hidegaobaisubmit").attr("value", "发布");
					} else if (data == -3) {
						$(".notic").html("请填写一个昵称将以这个昵称发布你的表白");
						$(".notic").fadeIn().delay(1000).fadeOut();
						$(".hidegaobaisubmit").removeAttr("disabled");
						$(".hidegaobaisubmit").attr("value", "发布");
					} else if (data == -4) {
						$(".notic").html("QQ号码填写错误");
						$(".notic").fadeIn().delay(1000).fadeOut();
						$(".hidegaobaisubmit").removeAttr("disabled");
						$(".hidegaobaisubmit").attr("value", "发布");
					}  else if (data == 1) {
						$.ajax({
							url: "./",
							cache: false,
							success: function(html) {
								$(".wrap").delay(2000).empty();
								$(".wrap").append($(html).filter('.wrap').html());
								$(".notic").html("发布成功");
								$(".notic").fadeIn().delay(1000).fadeOut();
								$(".hidegaobaisubmit").removeAttr("disabled");
								$(".hidegaobaisubmit").attr("value", "发布");
							}
						});
					} else {
						$(".notic").html(data);
						$(".notic").fadeIn().delay(1000).fadeOut();
						$(".hidegaobaisubmit").removeAttr("disabled");
						$(".hidegaobaisubmit").attr("value", "发布");
					}
				}
			)
		}
	})

	$(".num,.current,.next,.end,.prev,.first").live('click', function() {
		var tt = $(this);
		$(".load").show();
		jumpthis(tt);
		return false;
	});

	$("#slink").live('click', function() {
		$(".search").fadeToggle(500);
	});

	$("#ilink").live('click', function() {
		$(".load").show();
		$.ajax({
			url: "./",
			cache: false,
			success: function(html) {
				$(".wrap").empty();
				$(".wrap").append($(html).filter('.wrap').html());
				$(".notic").html("回到主页");
				$(".notic").fadeIn().delay(1000).fadeOut();
			}
		})
	});
	$("#alink").live('click', function() {
		$(".load").show();
		$.ajax({
			url: URL + "/about.php",
			cache: false,
			success: function(html) {
				$(".wrap").empty();
				$(".wrap").append($(html).filter('.wrap').html());
				$(".notic").html("关于");
				$(".notic").fadeIn().delay(1000).fadeOut();
			}
		})
	});
	$(".sjiao").live('click', function() {
		$.post(URL + '/search.php', $(".sform").serialize(),
			function(data) {
				if (data == 0) {
					$(".notic").html("没有搜索到该结果");
					$(".notic").fadeIn().delay(1000).fadeOut();
				} else {
					var se = URL + "/search.php?k=" + $('.sin').val();
					$.ajax({
						url: se,
						cache: false,
						success: function(html) {
							$(".wrap").delay(2000).empty();
							$(".wrap").append($(html).filter('.wrap').html());
							$(".notic").html("搜索结果如下");
							$(".notic").fadeIn().delay(1000).fadeOut();
						}
					});
				}
			})
	});

	$(".more").live('click', function() {
		$(this).prev().css("height", "auto");
		$(this).css("display", "none");
	});
})


function jumpthis(tt) {
	var url = tt.attr('href');
	url.charAt('/index.php');
	$.ajax({
		url: url,
		cache: false,
		success: function(html) {
			// alert($(html).filter('.main').html());
			$(".wrap").delay(2000).empty();
			$(".wrap").append($(html).filter('.wrap').html());
			$("html,body").animate({ scrollTop: "0px" }, 400);
		}
	});
}
