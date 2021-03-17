$(".permission input").on('click',function(){
    var _parent=$(this);
    var nextli=$(this).parent().next().children().children();

    if(_parent.prop('checked')){
        nextli.each(function(){
            $(this).children().prop('checked',true);
        });

    }
    else{
        nextli.each(function(){
            $(this).children().prop('checked',false);
        });

    }
});

$(".permission-item input").on('click',function(){

    var ths=$(this);
    var parentinput=ths.closest('div').prev().children();
    var sibblingsli=ths.closest('ul').find('li');

    if(ths.prop('checked')){
        parentinput.prop('checked',true);
    }
    else{
        var status=true;
        sibblingsli.each(function(){
            if($(this).children().prop('checked')) status=false;
        });
        if(status) parentinput.prop('checked',false);
    }
});
