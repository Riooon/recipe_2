// レシピ工程の順番　（create.blade.php）

let block_0 = $("#block_0");
let block_1 = $("#block_1");
let block_2 = $("#block_2");
let block_3 = $("#block_3");
let block_4 = $("#block_4");

var MAX_NUM = 5;
var blocks = [];

for (i = 0; i < MAX_NUM; i++) {
   blocks[i] = $("#block_" + i);
}

// up ボタンのクリックイベント
function block_up(up){
    return function(){
      blocks[up].prev().before(blocks[up]);
    }; 
}
for ( var i = 0; i < MAX_NUM; i ++ ){
  var u = block_up(i);
  $('#block'+i+'_up').click(u);
}
 
// down ボタンのクリックイベント
 function block_down(down){
     return function(){
       blocks[down].next().after(blocks[down]);
     };
 }
 for ( var i = 0; i < MAX_NUM; i ++ ){
  var d = block_down(i);
  $('#block'+i+'_down').click(d);
 }

// フォームの送信　（create.php）

$("#recipe_submit").on("click", function(){
    $.when(
        // 先に実行したい処理をここ
        $("#sort_0").val(block_0.index()),
        $("#sort_1").val(block_1.index()),
        $("#sort_2").val(block_2.index()),
        $("#sort_3").val(block_3.index()),
        $("#sort_4").val(block_4.index())

    ).done(function(){ 
    
        // その後実行したい処理をここ
        document.recipe_form.submit();
    });
});

// 画像プレビューの表示 create.blade.php / recipeedit.blade.php

$('#hd_img').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});

// 画像プレビューの表示（レシピ工程用） create.blade.php / recipeedit.blade.php

var previews = [];
for (i = 0; i < MAX_NUM; i++) {
  previews[i] = $("#preview_" + i);
}

function recipe_preview(view){
  return function(e){
    var reader = new FileReader();
    reader.onload = function (e) {
      previews[view].attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
  }; 
}
for ( var i = 0; i < MAX_NUM; i ++ ){
  var u = recipe_preview(i);
  $('#image_'+i).change(u);
}

// 画像プレビューの表示 useredit.blade.php

$('#icon').on('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (e) {
      $("#preview").attr('src', e.target.result);
  }
  reader.readAsDataURL(e.target.files[0]);
});

// 削除時のアラート recipeedit.blade.php / useredit.blade.php
$("#delete").on("click", function(){
    if(!confirm("削除してよろしいですか？")){
      return false;
    }
});