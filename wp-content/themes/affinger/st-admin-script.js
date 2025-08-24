(function (window, document, $, undefined) {
	'use strict';
	$(function () {

	function simple_tooltip(target_items, name){
 	$(target_items).each(function(i){
        $('body').append('<div class="'+name+'" id="'+name+i+'"><p>'+$(this).attr('title')+'</p></div>');
        var my_tooltip = $('#'+name+i);

        if($(this).attr('title') !== '' && $(this).attr('title') !== 'undefined' ){

        $(this).removeAttr('title').on('mouseover', function(){
                    my_tooltip.css({opacity:'0.9', display:'none'}).fadeIn(400);
        }).on('mousemove', function(kmouse){
                var border_top = $(window).scrollTop();
                var border_right = $(window).width();
                var left_pos;
                var top_pos;
                var offset = 15;
                if(border_right - (offset *2) >= my_tooltip.width() + kmouse.pageX){
                    left_pos = kmouse.pageX+offset;
                    } else{
                    left_pos = border_right-my_tooltip.width()-offset;
                    }

                if(border_top + (offset *2)>= kmouse.pageY - my_tooltip.height()){
                    top_pos = border_top +offset;
                    } else{
                    top_pos = kmouse.pageY-my_tooltip.height()-offset;
                    }


                my_tooltip.css({left:left_pos+'px', top:top_pos+'px'});
        }).on('mouseout', function(){
                my_tooltip.css({left:'-9999px'});
        });
        }
    	});
	}

	$(document).ready(function(){
		simple_tooltip('.st-guide a','tooltip');
	});


	});
}(window, window.document, jQuery));

/* 連動するチェックリストの制御 */
// ドキュメントが読み込まれた後に実行する
document.addEventListener('DOMContentLoaded', function () {
    handleLinkedCheckboxes('.linked', 1);
    handleLinkedCheckboxes('.linked-two', 2);
  });
  
  function handleLinkedCheckboxes(selector, linkedCheckboxesCount) {
    // すべての指定されたクラスの div 要素を取得
    var linkedDivs = document.querySelectorAll(selector);
  
    // 各指定されたクラスの div 要素に対して処理を実行
    linkedDivs.forEach(function (linkedDiv) {
      // div 内のすべてのチェックボックス要素を取得
      var checkboxes = linkedDiv.querySelectorAll('input[type="checkbox"]');
  
      // 最初のチェックボックスを対象とする
      var checkbox1 = checkboxes[0];
  
      // 最初のチェックボックス以降の指定された数までのチェックボックスに対して処理を実行
      for (let i = 1; i <= linkedCheckboxesCount; i++) {
        let currentCheckbox = checkboxes[i];
  
        // 連動するチェックボックスの状態が変更されたときのイベントリスナー
        currentCheckbox.addEventListener('change', function () {
          if (currentCheckbox.checked) {
            checkbox1.checked = true;
          }
        });
  
        // 最初のチェックボックスの状態が変更されたときのイベントリスナー
        checkbox1.addEventListener('change', function () {
          if (!checkbox1.checked && currentCheckbox.checked) {
            currentCheckbox.checked = false;
          }
        });
      }
    });
  }
